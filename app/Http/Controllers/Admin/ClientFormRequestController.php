<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientFormRequestMail;

class ClientFormRequestController extends Controller
{
    public function __construct()
    {
        // Sales Agents can access index & create via 'ClientForm own-access' OR 'ClientForm create'
        // Admins/Superadmins have 'ClientForm access' which covers everything
        $this->middleware('role_or_permission:ClientForm access|ClientForm own-access', ['only' => ['index']]);
        $this->middleware('role_or_permission:ClientForm access|ClientForm create',      ['only' => ['create', 'store']]);
    }

    /**
     * Display client form requests.
     * - superadmin / admin : see ALL requests
     * - Sales Agent         : see ONLY their own (agent_id = auth user)
     */
    public function index()
    {
        $user  = auth()->user();
        $query = ClientFormRequest::with(['user', 'agent'])->latest();

        // Scope to agent's own records if they don't have full 'ClientForm access'
        if (!$user->can('ClientForm access')) {
            $query->where('agent_id', $user->id);
        }

        $requests = $query->paginate(15);

        return view('admin.client-form-requests.index', compact('requests'));
    }

    public function create()
    {
        return view('admin.client-form-requests.create');
    }

    /**
     * Store a new client form request.
     * Records the agent_id (the logged-in Sales Agent) automatically.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'form_type' => 'required|in:cash,credit',
        ]);

        $token = Str::random(60);

        $formRequest = ClientFormRequest::create([
            'user_id'   => auth()->id(),
            'agent_id'  => auth()->id(),   // tracks which agent created this link
            'email'     => $request->email,
            'form_type' => $request->form_type,
            'token'     => $token,
            'status'    => 'pending',
        ]);

        try {
            Mail::to($formRequest->email)->send(new ClientFormRequestMail($formRequest));
            $formRequest->update(['mail_status' => 'Sent']);
            $msg = 'Form request link sent successfully!';
        } catch (\Exception $e) {
            \Log::error('Failed to send client form request email: ' . $e->getMessage());
            $formRequest->update(['mail_status' => 'Failed']);
            $msg = 'Form request created, but failed to send the email. Please check the email address and try resending.';
        }

        return redirect()->route('admin.client-form-requests.index')->with('success', $msg);
    }

    /**
     * Update the email address and resend the client form request link.
     */
    public function resend(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $formRequest = ClientFormRequest::findOrFail($id);
        
        $user = auth()->user();
        if (!$user->can('ClientForm access') && $formRequest->agent_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $formRequest->update([
            'email' => $request->email,
            'mail_status' => 'Pending'
        ]);

        try {
            Mail::to($formRequest->email)->send(new ClientFormRequestMail($formRequest));
            $formRequest->update(['mail_status' => 'Sent']);
            $msg = 'Email updated and link resent successfully!';
        } catch (\Exception $e) {
            \Log::error('Failed to resend client form request email: ' . $e->getMessage());
            $formRequest->update(['mail_status' => 'Failed']);
            $msg = 'Email updated, but failed to send the email. Please verify the address and try again.';
        }

        return redirect()->route('admin.client-form-requests.index')->with('success', $msg);
    }
}
