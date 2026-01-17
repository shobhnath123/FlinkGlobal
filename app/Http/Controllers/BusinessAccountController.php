<?php
namespace App\Http\Controllers;

use App\Models\BusinessApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessCreditApplication;
class BusinessAccountController extends Controller
{
    public function store(Request $request)
     {
        // ✅ VALIDATION
        $request->validate([
            // CLIENT DETAILS
            'contact_person' => 'required|string|max:255',
            'physical_address' => 'required|string|max:500',
            'postcode_phy' => 'required|string|max:10',
            'billing_address' => 'required|string|max:500',
            'postcode_bill' => 'required|string|max:10',
            'drivers_licence' => 'required|string|max:50',
            // 'dob' => 'required|date_format:d/m/Y',
            'email' => 'required|email|max:255',
            'mobile' => 'required|digits_between:7,10',

            // BUSINESS DETAILS
            'legal_name' => 'required|string|max:255',
            'trading_name' => 'required|string|max:255',
            'gst_no' => 'required|string|max:50',
            'company_no' => 'required|string|max:50',
            'nzbn' => 'required|string|max:50',
            'nature_business' => 'required|string|max:255',
            // 'date_incorp' => 'required|date',
            'paid_capital' => 'required|numeric|min:0',
            'monthly_purchases' => 'required|numeric|min:0',
            'credit_limit' => 'required|numeric|min:0',
            'principal_place_of_business_is' => 'required|string|max:255',
            'to_whom' => 'required|string|max:255',

            'num_directors' => 'required|integer|min:1|max:10',

            // PAYMENT TERMS
            // 'po_required' => 'required|in:Yes,No',
            // 'accounts_email_opt' => 'required|in:Yes,No',
            'accounts_email' => 'required|email|max:255',
            'accounts_contact' => 'required|string|max:255',
            'accounts_mobile' => 'required|digits_between:7,10',
            'bank_branch' => 'required|string|max:255',
            'bank_account_no' => 'required|string|max:50',

            // SIGNATURES
            'sing_client_name' => 'required|string|max:255',
            'signed_position' => 'required|string|max:255',
            // 'signed_date' => 'required|date',

            //GUARANTOR
            'g1_signed' => 'required| string|max:225',
            'g1_name' => 'required|string|max:255',
            'g1_address' => 'required|string|max:500',
            // 'g1_dob' => 'required|date',
            'g1_witness_name' => 'required|string|max:255',
            'g1_witness_occ' => 'required|string|max:255',
            'g1_witness_addr' => 'required|string|max:500',
            // 'g1_signature_of_witness' => 'required|date',

            'g2_signed' => 'required|string|max:225',
            'g2_name' => 'required|string|max:255',
            'g2_address' => 'required|string|max:500',
            // 'g2_dob' => 'required|date',
            'g2_witness_name' => 'required|string|max:255',
            'g2_witness_occ' => 'required|string|max:255',
            'g2_witness_addr' => 'required|string|max:500',
            // 'g2_signature_of_witness' => 'required|date',
            
            // TERMS ACCEPTANCE
            'accept_terms' => 'accepted',
        ],[
        // Custom messages here:
        'g1_signed.required' => 'Please specify if Guarantor 1 has signed',
        'g1_signed.string' => 'Guarantor 1 signed must be text.',
        'g1_signed.max' => 'Guarantor 1 signed cannot exceed 225 characters.',

        'g1_name.required' => 'Guarantor 1 full name is required.',
        'g1_name.string' => 'Guarantor 1 name must be text.',
        'g1_name.max' => 'Guarantor 1 name cannot exceed 255 characters.',

        'g1_address.required' => 'Guarantor 1 address is required.',
        'g1_address.max' => 'Guarantor 1 address cannot exceed 500 characters.',
        'g1_dob.required' => 'Guarantor 1 date of birth is required.',
        'g1_dob.date_format' => 'Guarantor 1 date of birth must be in the format dd/mm/YYYY.',

        'g1_witness_name.required' => 'Witness name for Guarantor 1 is required.',
        'g1_witness_name.max' => 'Witness name cannot exceed 255 characters.',

        'g1_witness_occ.required' => 'Witness occupation for Guarantor 1 is required.',
        'g1_witness_occ.max' => 'Witness occupation cannot exceed 255 characters.',

        'g1_witness_addr.required' => 'Witness address for Guarantor 1 is required.',
        'g1_witness_addr.max' => 'Witness address cannot exceed 500 characters.',

        'g1_signature_of_witness.required' => 'Witness signature date for Guarantor 1 is required.',
        'g1_signature_of_witness.date_format' => 'Witness signature date must be in the format dd/mm/YYYY.',
        // Guarantor 2

        'g2_signed.required' => 'Please specify if Guarantor 2 has signed .',
        'g2_signed.in' => 'Guarantor 2 signed must be either Yes or No.',

        'g2_name.required' => 'Guarantor 2 full name is required.',
        'g2_name.string' => 'Guarantor 2 name must be text.',
        'g2_name.max' => 'Guarantor 2 name cannot exceed 255 characters.',

        'g2_address.required' => 'Guarantor 2 address is required.',
        'g2_address.max' => 'Guarantor 2 address cannot exceed 500 characters.',

        'g2_dob.required' => 'Guarantor 2 date of birth is required.',
        'g2_dob.date_format' => 'Guarantor 2 date of birth must be in the format dd/mm/YYYY.',

        'g2_witness_name.required' => 'Witness name for Guarantor 2 is required.',
        'g2_witness_name.max' => 'Witness name cannot exceed 255 characters.',

        'g2_witness_occ.required' => 'Witness occupation for Guarantor 2 is required.',
        'g2_witness_occ.max' => 'Witness occupation cannot exceed 255 characters.',

        'g2_witness_addr.required' => 'Witness address for Guarantor 2 is required.',
        'g2_witness_addr.max' => 'Witness address cannot exceed 500 characters.',

        'g2_signature_of_witness.required' => 'Witness signature date for Guarantor 2 is required.',
        'g2_signature_of_witness.date_format' => 'Witness signature date must be in the format dd/mm/YYYY.',
    ]);

        // ✅ SAVE APPLICATION
        $app = BusinessCreditApplication::create([
            ...$request->except(['_token','accept_terms','dob']),
            'mobile' => '+64'.ltrim($request->mobile,'0'),
        ]);

        // DIRECTORS
        for ($i = 1; $i <= $request->num_directors; $i++) {
            $app->directors()->create([
                'full_name' => $request["dir{$i}_name"],
                // 'dob' => $request["dir{$i}_dob"] ?? null,
                'mobile' => $request["dir{$i}_mobile"] ?? null,
                'address' => $request["dir{$i}_address"] ?? null,
                'drivers_licence' => $request["dir{$i}_dl"] ?? null,
                'postcode' => $request["dir{$i}_pc"] ?? null,
            ]);
        }

        // REFERENCES
        for ($i = 1; $i <= 3; $i++) {
            if ($request["ref{$i}_name"]) {
                $app->references()->create([
                    'name' => $request["ref{$i}_name"],
                    'company' => $request["ref{$i}_company"],
                    'contact' => $request["ref{$i}_contact"],
                ]);
            }
        }

        // GUARANTORS
        foreach ([1,2] as $g) {
            if ($request["g{$g}_name"]) {
                $app->guarantors()->create([
                    'signed' => $request["g{$g}_signed"],
                    'full_name' => $request["g{$g}_name"],
                    'address' => $request["g{$g}_address"],
                    'dob' => $request["g{$g}_dob"],
                    'witness_name' => $request["g{$g}_witness_name"],
                    'witness_occupation' => $request["g{$g}_witness_occ"],
                    'witness_address' => $request["g{$g}_witness_addr"],
                    'witness_signature_date' => $request["g{$g}_signature_of_witness"],
                ]);
            }
        }

        // TERMS
        $app->terms()->create([
            'accepted' => true,
            'accepted_at' => now(),
            'ip_address' => request()->ip(),
        ]);

        return redirect()->route('business.account.pdf', $app->id);
    }

    //  public function pdf($id)
    // {
    //     $app = BusinessCreditApplication::with(['directors','guarantors','references'])->findOrFail($id);

    //     $pdf = Pdf::loadView('pdf.business-credit', compact('app'))
    //               ->setPaper('a4','portrait');

    //     return $pdf->stream('business-credit-application.pdf');
    // }
}