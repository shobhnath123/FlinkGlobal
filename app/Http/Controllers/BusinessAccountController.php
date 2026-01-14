<?php
namespace App\Http\Controllers;

use App\Models\BusinessAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessAccountController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        BusinessAccount::create([
            'account_name' => $request->account_name,
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with('success', 'Account created successfully.');
    }
}