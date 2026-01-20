<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;

use App\Models\BusinessCreditApplication;
use App\Mail\BusinessCreditPdfMail;

class BusinessAccountController extends Controller
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
            'postcode_phy' => 'required|string|max:10',

            'billing_address' => 'required|string|max:500',
            'billing_address_dpid' => 'nullable|string|max:50',
            'postcode_bill' => 'required|string|max:10',

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
            'date_incorp' => 'required|date',
            'paid_capital' => 'required|numeric|min:0',
            'monthly_purchases' => 'required|numeric|min:0',
            'credit_limit' => 'required|numeric|min:0',
            'principal_place_of_business' => 'required|string|max:255',
            'to_whom' => 'required|string|max:255',

            /* PAYMENT TERMS */
            'po_required' => 'required|in:Yes,No',
            'accounts_email_opt' => 'required|in:Yes,No',
            'accounts_email' => 'required|email|max:255',
            'accounts_contact' => 'required|string|max:255',
            'accounts_mobile' => 'required|digits_between:7,10',
            'bank_branch' => 'required|string|max:255',
            'bank_account_no' => 'required|string|max:50',

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

        /* GUARANTORS */
        $rules += [
            'g1_signed' => 'required|string|max:225',
            'g1_name' => 'required|string|max:255',
            'g1_address' => 'required|string|max:500',
            'g1_address_dpid' => 'nullable|string|max:50',
            'g1_dob' => 'required|date',
            'g1_signature_of_witness' => 'required|date',
            'g1_witness_name' => 'required|string|max:255',
            'g1_witness_occ' => 'required|string|max:255',
            'g1_witness_addr' => 'required|string|max:500',
            'g1_witness_addr_dpid' => 'nullable|string|max:50',

            'g2_signed' => 'required|string|max:225',
            'g2_name' => 'required|string|max:255',
            'g2_address' => 'required|string|max:500',
            'g2_address_dpid' => 'nullable|string|max:50',
            'g2_dob' => 'required|date',
            'g2_signature_of_witness' => 'required|date',
            'g2_witness_name' => 'required|string|max:255',
            'g2_witness_occ' => 'required|string|max:255',
            'g2_witness_addr' => 'required|string|max:500',
            'g2_witness_addr_dpid' => 'nullable|string|max:50',
        ];

        /* REFERENCES */
        $rules += [
            'ref1_name' => 'required|string|max:255',
            'ref1_company' => 'required|string|max:255',
            'ref1_contact' => 'required|string|max:255',

            'ref2_name' => 'required|string|max:255',
            'ref2_company' => 'required|string|max:255',
            'ref2_contact' => 'required|string|max:255',

            'ref3_name' => 'nullable|string|max:255',
            'ref3_company' => 'nullable|string|max:255',
            'ref3_contact' => 'nullable|string|max:255',
        ];

        $messages = [
            'ref1_name.required' => 'Reference 1 name is required.',
            'ref1_company.required' => 'Reference 1 company/address is required.',
            'ref1_contact.required' => 'Reference 1 contact (mobile or email) is required.',

            'ref2_name.required' => 'Reference 2 name is required.',
            'ref2_company.required' => 'Reference 2 company/address is required.',
            'ref2_contact.required' => 'Reference 2 contact (mobile or email) is required.'
        ];
        $messages += [
            // GUARANTOR 1
            'g1_signed.required' => 'Guarantor 1 signature is required.',
            'g1_name.required' => 'Guarantor 1 full name is required.',
            'g1_address.required' => 'Guarantor 1 home address is required.',
            'g1_dob.required' => 'Guarantor 1 date of birth is required.',
            'g1_signature_of_witness.required' => 'Witness signature date for Guarantor 1 is required.',
            'g1_witness_name.required' => 'Witness name for Guarantor 1 is required.',
            'g1_witness_occ.required' => 'Witness occupation for Guarantor 1 is required.',
            'g1_witness_addr.required' => 'Witness address for Guarantor 1 is required.',

            // GUARANTOR 2
            'g2_signed.required' => 'Guarantor 2 signature is required.',
            'g2_name.required' => 'Guarantor 2 full name is required.',
            'g2_address.required' => 'Guarantor 2 home address is required.',
            'g2_dob.required' => 'Guarantor 2 date of birth is required.',
            'g2_signature_of_witness.required' => 'Witness signature date for Guarantor 2 is required.',
            'g2_witness_name.required' => 'Witness name for Guarantor 2 is required.',
            'g2_witness_occ.required' => 'Witness occupation for Guarantor 2 is required.',
            'g2_witness_addr.required' => 'Witness address for Guarantor 2 is required.',
        ];

        $validated = $request->validate($rules, $messages);

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
                'date_incorp' => $request->date_incorp,
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

            /* REFERENCES */
            for ($i = 1; $i <= 3; $i++) {
                if ($request->filled("ref{$i}_name")) {
                    $app->references()->create([
                        'name' => $request["ref{$i}_name"],
                        'company' => $request["ref{$i}_company"],
                        'contact' => $request["ref{$i}_contact"],
                    ]);
                }
            }

            /* GUARANTORS */
            foreach ([1, 2] as $g) {
                $app->guarantors()->create([
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

            /* TERMS */
            $app->terms()->create([
                'accepted' => true,
                'accepted_at' => now(),
                'ip_address' => $request->ip(),
            ]);

            /* =========================================================
             | 3. GENERATE PDF
             ========================================================= */

            $html = view('pdf.business-credit', compact('app'))->render();

            $pdfBinary = Browsershot::html($html)
                ->format('A4')
                ->margins(10, 10, 10, 10)
                ->showBackground()
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

            return back()->withErrors('Something went wrong. Please try again.');
        }
    }


    /*
    * VIEW PDF (OPTIONAL)
     */
    public function pdf($id)
    {
        $app = BusinessCreditApplication::with([
            'directors','guarantors','references','terms'
        ])->findOrFail($id);

        return response(
            Browsershot::html(
                view('pdf.business-credit', compact('app'))->render()
            )
            ->format('A4')
            ->pdf(),
            200,
            ['Content-Type' => 'application/pdf']
        );
    }
    
}