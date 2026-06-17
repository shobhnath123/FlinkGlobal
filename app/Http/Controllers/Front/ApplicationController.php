<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessCreditApplication;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ApplicationController extends Controller
{
    /**
     * Show the form for editing the specified application.
     */
    public function edit($id)
    {
        $user = auth('front')->user();
        
        // Find application belonging to this user
        $application = BusinessCreditApplication::with(['directors', 'guarantors', 'references'])
            ->where('id', $id)
            ->where('email', $user->email)
            ->firstOrFail();

        // Check permission
        if (!$application->client_can_edit) {
            abort(403, 'You do not have permission to edit this application.');
        }

        // Pass application to the view to pre-fill
        if ($application->application_type === 'Credit') {
            return view('business-credit-account', ['applicationRecord' => $application]);
        } else {
            return view('business-cash-account', ['applicationRecord' => $application]);
        }
    }

    /**
     * Update the specified application in storage.
     */
    public function update(Request $request, $id)
    {
        $user = auth('front')->user();
        
        $application = BusinessCreditApplication::where('id', $id)
            ->where('email', $user->email)
            ->firstOrFail();

        if (!$application->client_can_edit) {
            abort(403, 'You do not have permission to edit this application.');
        }

        // Common Rules
        $rules = [
            'contact_person' => 'required|string|max:255',
            'physical_address' => 'required|string|max:500',
            'postcode_phy' => 'required|string|max:10',
            'billing_address' => 'required|string|max:500',
            'postcode_bill' => 'required|string|max:10',
            'drivers_licence' => 'required|string|max:50',
            'dob' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18)->toDateString(),
            'mobile' => 'required|digits_between:7,10',
            'legal_name' => 'required|string|max:255',
            'trading_name' => 'required|string|max:255',
            'nature_business' => 'required|string|max:255',
            'date_incorp' => 'required|date',
            'signed_client_name' => 'required|string|max:255',
            'signed_position' => 'required|string|max:255',
            'signed_date' => 'required|date',
        ];

        // Specific Rules
        if ($application->application_type === 'Credit') {
            $rules += [
                'gst_no' => 'required|string|max:50',
                'company_no' => 'required|string|max:50',
                'nzbn' => 'required|string|max:50',
                'paid_capital' => 'required|numeric|min:0',
                'monthly_purchases' => 'required|numeric|min:0',
                'credit_limit' => 'required|numeric|min:0',
                'principal_place_of_business' => 'required|string|max:255',
                'to_whom' => 'required|string|max:255',
                'po_required' => 'required|in:Yes,No',
                'accounts_email_opt' => 'required|in:Yes,No',
                'accounts_email' => 'required|email|max:255',
                'accounts_contact' => 'required|string|max:255',
                'accounts_mobile' => 'required|digits_between:7,10',
                'bank_branch' => 'required|string|max:255',
                'bank_account_no' => 'required|string|max:50',
                'num_directors' => 'required|integer|min:1|max:10',
            ];
            
            for ($i = 1; $i <= $request->num_directors; $i++) {
                $rules["dir{$i}_name"] = 'required|string|max:255';
            }
        } else {
            // Cash rules
            $rules += [
                'bank_account_name' => 'required|string|max:255',
                'bank_account_no' => 'required|string|max:50',
            ];
        }

        $request->validate($rules);

        DB::beginTransaction();
        try {
            // Update Main Application
            $appData = [
                'contact_person' => $request->contact_person,
                'physical_address' => $request->physical_address,
                'physical_address_dpid' => $request->physical_address_dpid,
                'postcode_phy' => $request->postcode_phy,
                'billing_address' => $request->billing_address,
                'billing_address_dpid' => $request->billing_address_dpid,
                'postcode_bill' => $request->postcode_bill,
                'drivers_licence' => $request->drivers_licence,
                'dob' => $request->dob,
                'mobile' => (strpos($request->mobile, '+64') === 0) ? $request->mobile : '+64' . ltrim($request->mobile, '0'),
                'legal_name' => $request->legal_name,
                'trading_name' => $request->trading_name,
                'nature_business' => $request->nature_business,
                'date_incorp' => $request->date_incorp,
                'signed_client_name' => $request->signed_client_name,
                'signed_position' => $request->signed_position,
                'signed_date' => $request->signed_date,
            ];

            if ($application->application_type === 'Credit') {
                $appData = array_merge($appData, [
                    'gst_no' => $request->gst_no,
                    'company_no' => $request->company_no,
                    'nzbn' => $request->nzbn,
                    'paid_capital' => $request->paid_capital,
                    'monthly_purchases' => $request->monthly_purchases,
                    'credit_limit' => $request->credit_limit,
                    'principal_place_of_business' => $request->principal_place_of_business,
                    'to_whom' => $request->to_whom,
                    'po_required' => $request->po_required,
                    'accounts_email_opt' => $request->accounts_email_opt,
                    'accounts_email' => $request->accounts_email,
                    'accounts_contact' => $request->accounts_contact,
                    'accounts_mobile' => $request->accounts_mobile,
                    'bank_branch' => $request->bank_branch,
                    'bank_account_no' => $request->bank_account_no,
                ]);
            } else {
                $appData = array_merge($appData, [
                    'bank_account_name' => $request->bank_account_name,
                    'bank_account_no' => $request->bank_account_no,
                ]);
            }

            $application->update($appData);

            if ($application->application_type === 'Credit') {
                // Directors
                $application->directors()->delete();
                for ($i = 1; $i <= $request->num_directors; $i++) {
                    $application->directors()->create([
                        'full_name' => $request["dir{$i}_name"],
                        'dob' => $request["dir{$i}_dob"],
                        'mobile' => $request["dir{$i}_mobile"],
                        'address' => $request["dir{$i}_address"],
                        'drivers_licence' => $request["dir{$i}_dl"],
                        'postcode' => $request["dir{$i}_pc"],
                    ]);
                }

                // References
                $application->references()->delete();
                for ($i = 1; $i <= 3; $i++) {
                    if ($request->filled("ref{$i}_name")) {
                        $application->references()->create([
                            'name' => $request["ref{$i}_name"],
                            'company' => $request["ref{$i}_company"],
                            'contact' => $request["ref{$i}_contact"],
                        ]);
                    }
                }

                // Guarantors
                $application->guarantors()->delete();
                foreach ([1, 2] as $g) {
                    if ($request->filled("g{$g}_name")) {
                        $application->guarantors()->create([
                            'signed' => $request["g{$g}_signed"],
                            'full_name' => $request["g{$g}_name"],
                            'address' => $request["g{$g}_address"],
                            'address_dpid' => $request["g{$g}_address_dpid"],
                            'dob' => $request["g{$g}_dob"],
                            'witness_name' => $request["g{$g}_witness_name"],
                            'witness_occupation' => $request["g{$g}_witness_occ"],
                            'witness_address' => $request["g{$g}_witness_addr"],
                            'witness_address_dpid' => $request["g{$g}_witness_addr_dpid"],
                            'witness_signature_date' => $request["g{$g}_signature_of_witness"],
                        ]);
                    }
                }
            }

            // Regenerate PDF
            if ($application->application_type === 'Credit') {
                \App\Jobs\ProcessCreditApplication::dispatch($application, $request->ip(), $request->userAgent());
            } else {
                \App\Jobs\ProcessCashApplication::dispatch($application, $request->ip(), $request->userAgent());
            }

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Application updated successfully. PDF is being regenerated.');

        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            return back()->withErrors('Something went wrong. Please try again.');
        }
    }
}
