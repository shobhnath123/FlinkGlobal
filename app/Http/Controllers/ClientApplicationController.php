<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientFormRequest;

class ClientApplicationController extends Controller
{
    public function show($token)
    {
        $formRequest = ClientFormRequest::where('token', $token)->firstOrFail();

        if ($formRequest->status === 'submitted') {
            return redirect('/')->with('error', 'This application form has already been submitted.');
        }

        if ($formRequest->form_type === 'credit') {
            return view('business-credit-account', compact('formRequest'));
        }

        return view('business-cash-account', compact('formRequest'));
    }
}
