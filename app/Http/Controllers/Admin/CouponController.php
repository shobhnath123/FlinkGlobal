<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $coupons = Coupon::latest()->get();

            return view('admin.coupons.index', compact('coupons'));
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to load coupons.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name', 'email')->get();

        return view('admin.coupons.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'code' => 'required|unique:coupons,code',
                'type' => 'required|in:fixed,percent',
                'value' => 'required|numeric',
                'cart_value' => 'nullable|numeric',
                'expiry_date' => 'required|date',
                'user_type' => 'required|in:all,new,existing,specific',
                'status' => 'required|boolean',
                'users' => 'required_if:user_type,specific|array',
            ]);

            $validated['code'] = strtoupper($validated['code']);
            // ✅ Create coupon
            $coupon = Coupon::create($validated);

            // ✅ Attach users if specific
            if ($request->user_type === 'specific') {
                $data = [];

                foreach ($request->users as $userId) {
                    $data[$userId] = [
                        'status' => 1,
                        'added_by' => auth()->id(),
                    ];
                }

                $coupon->users()->sync($data);
            }

            return redirect()->route('coupons.index')
                ->with('success', 'Coupon created successfully');

        } catch (\Exception $e) {
            Log::error('Coupon Store Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Coupon creation failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $coupon = Coupon::with('users')->findOrFail($id);
            $users = User::all();
            $users = User::select('id', 'name', 'email')->get();
            $couponUsers = $coupon->users->pluck('id')->toArray();
            return view('admin.coupons.edit', compact('coupon', 'users', 'couponUsers'));
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to load coupon.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $coupon = Coupon::findOrFail($id);

            $validated = $request->validate([
                'code' => 'required|unique:coupons,code,'.$coupon->id,
                'type' => 'required|in:fixed,percent',
                'value' => 'required|numeric',
                'cart_value' => 'nullable|numeric',
                'expiry_date' => 'required|date',
                'user_type' => 'required|in:all,new,existing,specific',
                'status' => 'required|boolean',
            ]);

            $validated['code'] = strtoupper($validated['code']);
            $coupon->update($validated);

            if ($request->user_type === 'specific') {

                $data = [];

                foreach ($request->users as $userId) {
                    $data[$userId] = [
                        'status' => 1,
                        'added_by' => auth()->id(),
                    ];
                }

                // 🔥 Sync users (add/remove/update)
                $coupon->users()->sync($data);

            } else {
                // 🔥 Remove all specific users if not needed
                $coupon->users()->detach();
            }

            return redirect()->route('coupons.index')
                ->with('success', 'Coupon updated successfully');
        } catch (\Exception $e) {
            Log::error('Coupon Update Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Coupon update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();

            return redirect()->route('coupons.index')
                ->with('success', 'Coupon deleted');
        } catch (\Exception $e) {
            Log::error('Coupon Delete Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Coupon deletion failed.');
        }
    }
}
