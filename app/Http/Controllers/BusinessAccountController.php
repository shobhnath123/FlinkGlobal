<?php
namespace App\Http\Controllers;

use App\Models\BusinessApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessAccountController extends Controller
{
    public function store(Request $request)
    {
        // Basic validation for required fields
        $request->validate([
            'account_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // Determine application type
        $applicationType = $request->has('credit_limit') ? 'credit' : 'cash';

        // Prepare data
        $data = $request->except(['_token']);
        $data['application_type'] = $applicationType;

        // Handle directors for cash account
        if ($applicationType === 'cash' && $request->has('directors')) {
            $data['directors'] = json_encode($request->directors);
        }

        BusinessApplication::create($data);

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }
}