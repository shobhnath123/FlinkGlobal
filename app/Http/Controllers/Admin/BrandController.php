<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        try {

            $brands = Brand::latest()->paginate(10);

            return view('admin.brands.index', compact('brands'));

        } catch (\Exception $e) {

            Log::error('Brand Index Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to load brands.');
        }
    }

    public function create()
    {
        try {

            return view('admin.brands.create');

        } catch (\Exception $e) {

            Log::error('Brand Create Page Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to open brand form.');
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:brands',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $image = null;

            if ($request->hasFile('image')) {

                $image = $request->file('image')->store('brands', 'public');
            }

            Brand::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'image' => $image,
            ]);

            return redirect()->route('brands.index')
                ->with('success', 'Brand created successfully');

        } catch (\Exception $e) {

            Log::error('Brand Store Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Brand creation failed.');
        }
    }

    public function edit($id)
    {
        try {

            $brand = Brand::findOrFail($id);

            return view('admin.brands.edit', compact('brand'));

        } catch (\Exception $e) {

            Log::error('Brand Edit Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to edit brand.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:brands,slug,'.$id,
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $brand = Brand::findOrFail($id);

            $brand->name = $request->name;
            $brand->slug = $request->slug;

            if ($request->hasFile('image')) {

                // Delete old image
                if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                    Storage::disk('public')->delete($brand->image);
                }

                // Upload new image
                $image = $request->file('image')->store('brands', 'public');

                $brand->image = $image;
            }

            $brand->save();

            return redirect()->route('brands.index')->with('success', 'Brand Updated Successfully');
        } catch (\Exception $e) {

            Log::error('Brand Update Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Brand update failed.');

        }
    }

    public function destroy($id)
    {
        try {

            $brand = Brand::findOrFail($id);

            if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }

            $brand->delete();

            return redirect()->route('brands.index')
                ->with('success', 'Brand deleted successfully');

        } catch (\Exception $e) {

            Log::error('Brand Delete Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Brand deletion failed.');
        }
    }
}
