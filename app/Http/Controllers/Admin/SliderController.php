<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sliders = Slider::latest()->get();

            return view('admin.sliders.index', compact('sliders'));

        } catch (\Exception $e) {
            return back()->with('error', 'Unable to load sliders.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'title' => 'required',
                'line1' => 'nullable|string',
                'line2' => 'nullable|string',
                'status' => 'nullable|boolean',
                'position' => 'nullable|integer',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            // ✅ Fix checkbox
            $validated['status'] = $request->has('status') ? 1 : 0;

            // ✅ Upload image
            if ($request->hasFile('image')) {

                $file = $request->file('image');

                $imageName = time().'-'.Str::slug($request->title).'.'.$file->getClientOriginalExtension();

                $file->storeAs('sliders', $imageName, 'public');

                // ✅ IMPORTANT
                $validated['image'] = 'sliders/'.$imageName;
            }

            // ✅ Save in DB
            Slider::create($validated);

            return redirect()->route('slides.index')
                ->with('success', 'Slider created successfully');

        } catch (\Exception $e) {

            Log::error('Slider Store Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Slider creation failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $slider = Slider::findOrFail($id);

            return view('admin.sliders.edit', compact('slider'));
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to load slider.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $slider = Slider::findOrFail($id);

            return view('admin.sliders.edit', compact('slider'));
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to load slider.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'line1' => 'nullable|string|max:255',
            'line2' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'position' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        // Handle image
        if ($request->hasFile('image')) {

            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $file = $request->file('image');
            $imageName = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('sliders', $imageName, 'public');
            $validated['image'] = 'sliders/' . $imageName;
        }
        $slider->update($validated);
        return redirect()->route('slides.index')
            ->with('success', 'Slider updated successfully');

    } catch (\Exception $e) {

        Log::error('Slider Update Error', [
            'message' => $e->getMessage(),
        ]);

        return back()->with('error', 'Slider update failed.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete();

            return redirect()->route('slides.index')->with('success', 'Slider deleted successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Slider deletion failed.');
        }
    }
}
