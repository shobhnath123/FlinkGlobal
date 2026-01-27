<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;

use App\Models\BusinessCreditApplication;
use App\Mail\BusinessCreditPdfMail;
class CashAccountApplicationController extends Controller
{
    public function store(Request $request)
    {
        /* =========================================================
         | 1. VALIDATION (ALL AT TOP — VERY IMPORTANT)
         ========================================================= */

        $rules = [

            /* CLIENT DETAILS */
            'contact_person' => 'required|string|max:255',

            'physical_address' => 'required|string|max:500',
            'physical_address_dpid' => 'nullable|string|max:50',
            'postcode_phy' => 'required|digits_between:4,8',

            'billing_address' => 'required|string|max:500',
            'billing_address_dpid' => 'nullable|string|max:50',
            'postcode_bill' => 'required|digits_between:4,8',

            'drivers_licence' => 'required|string|max:50',
            'dob' => 'required|date',
            'email' => 'required|email|max:255',
            'mobile' => 'required|digits_between:7,10',

            /* BUSINESS DETAILS */
            'legal_name' => 'required|string|max:255',
            'trading_name' => 'required|string|max:255',
            'gst_no' => 'required|string|max:50',
            'company_no' => 'required|string|max:50',
            'nzbn' => 'required|string|max:50',
            'nature_business' => 'required|string|max:255',
            // 'date_incorp' => 'required|date',
            // 'paid_capital' => 'required|numeric|min:0',
            // 'monthly_purchases' => 'required|numeric|min:0',

            /* SIGNATURE */
            'sing_client_name' => 'required|string|max:255',
            'signed_position' => 'required|string|max:255',
            'signed_date' => 'required|date',

            /* TERMS */
            'accept_terms' => 'accepted',

            /* DIRECTORS */
            'num_directors' => 'required|integer|min:1|max:10',


        ];

        /* DIRECTOR DYNAMIC RULES */
        for ($i = 1; $i <= $request->num_directors; $i++) {
            $rules["dir{$i}_name"] = 'required|string|max:255';
            $rules["dir{$i}_dob"] = 'required|date';
            $rules["dir{$i}_mobile"] = 'required|string|max:20';
            $rules["dir{$i}_address"] = 'required|string|max:500';
            $rules["dir{$i}_dl"] = 'required|string|max:50';
            $rules["dir{$i}_pc"] = 'required|string|max:10';
        }

        $validated = $request->validate($rules);

        /* =========================================================
         | 2. SAVE EVERYTHING INSIDE TRANSACTION
         ========================================================= */

        DB::beginTransaction();

        try {

            /* MAIN APPLICATION */
            $app = BusinessCreditApplication::create([
                'contact_person' => $request->contact_person,

                'physical_address' => $request->physical_address,
                'physical_address_dpid' => $request->physical_address_dpid,
                'postcode_phy' => $request->postcode_phy,

                'billing_address' => $request->billing_address,
                'billing_address_dpid' => $request->billing_address_dpid,
                'postcode_bill' => $request->postcode_bill,

                'drivers_licence' => $request->drivers_licence,
                'dob' => $request->dob,
                'email' => $request->email,
                'mobile' => '+64' . ltrim($request->mobile, '0'),

                'legal_name' => $request->legal_name,
                'trading_name' => $request->trading_name,
                'gst_no' => $request->gst_no,
                'company_no' => $request->company_no,
                'nzbn' => $request->nzbn,
                'nature_business' => $request->nature_business,
                // 'date_incorp' => $request->date_incorp,
                // 'paid_capital' => $request->paid_capital,
                // 'monthly_purchases' => $request->monthly_purchases,
                'application_type'=>'cash',
                'sing_client_name' => $request->sing_client_name,
                'signed_position' => $request->signed_position,
                'signed_date' => $request->signed_date,
            ]);

            /* DIRECTORS */
            for ($i = 1; $i <= $request->num_directors; $i++) {
                $app->directors()->create([
                    'full_name' => $request["dir{$i}_name"],
                    'dob' => $request["dir{$i}_dob"],
                    'mobile' => $request["dir{$i}_mobile"],
                    'address' => $request["dir{$i}_address"],
                    'drivers_licence' => $request["dir{$i}_dl"],
                    'postcode' => $request["dir{$i}_pc"],
                ]);
            }

            /* TERMS */
            $app->terms()->create([
                'accepted' => true,
                'accepted_at' => now(),
                'ip_address' => $request->ip(),
            ]);

            /* =========================================================
             | 3. GENERATE PDF
             ========================================================= */

            $app->load(['directors', 'guarantors', 'references', 'terms']);

            $html = view('pdf.business-cash-pdf', compact('app'))->render();

            $pdfBinary = Browsershot::html($html)
                ->format('A4')
                ->margins(15, 10, 15, 10)
                ->showBackground()
                ->waitForNavigation()
                ->pdf();

            /* =========================================================
             | 4. SEND EMAIL
             ========================================================= */

            Mail::to($app->email)
                ->cc($app->accounts_email)
                ->send(new BusinessCreditPdfMail($app, $pdfBinary));

            DB::commit();

            return back()->with('success', 'Form submitted successfully.');

        } catch (\Throwable $e) {

            DB::rollBack();
            report($e);

            dd(
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            return back()->withErrors('Something went wrong. Please try again.');
        }
    }
    public function pdfPreview($id)
    {

        $app = BusinessCreditApplication::with([
            'directors','guarantors','references','terms'
        ])->findOrFail($id);

        return response(
            Browsershot::html(
                view('pdf.business-cash-pdf', compact('app'))->render()
            )
            ->format('A4')
            ->margins(15, 10, 15, 10)
            ->showBackground()
            ->pdf(),
            200,
            ['Content-Type' => 'application/pdf']
        );
    }
}
