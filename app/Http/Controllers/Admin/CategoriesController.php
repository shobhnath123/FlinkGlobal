<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::latest()->paginate(10);
            return view('admin.categories.index', compact('categories'));
        } catch (\Exception $e) {
            Log::error('categories Index Error', [
                'message' => $e->getMessage(),
            ]);
            return back()->with('error', 'Unable to load categories.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.categories.create');
        } catch (\Exception $e) {
            Log::error('Category Create Page Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to open Category form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:categories,slug',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $image = null;

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                // ✅ Clean + sorted image name
                $imageName = time().'-'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();

                // ✅ Store with custom name
                $file->storeAs('categories', $imageName, 'public');

                $image = 'categories/'.$imageName;
            }

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'image' => $image,
            ]);

            return redirect()->route('categories.index')
                ->with('success', 'Category created successfully');

        } catch (\Exception $e) {

            Log::error('Category Store Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Category creation failed.');
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

            $category = Category::findOrFail($id);

            return view('admin.categories.edit', compact('category'));

        } catch (\Exception $e) {

            Log::error('Category Edit Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to edit Category.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:categories,slug,'.$id,
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $category = Category::findOrFail($id);

            $category->name = $request->name;
            $category->slug = Str::slug($request->slug);

            if ($request->hasFile('image')) {

                // ✅ Delete old image
                if ($category->image && Storage::disk('public')->exists($category->image)) {
                    Storage::disk('public')->delete($category->image);
                }

                // ✅ Custom image name (sorted)
                $file = $request->file('image');

                $imageName = time().'-'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();

                // ✅ Store image
                $file->storeAs('categories', $imageName, 'public');

                // ✅ Save path
                $category->image = 'categories/'.$imageName;
            }

            $category->save();

            return redirect()->route('categories.index')
                ->with('success', 'Category Updated Successfully');

        } catch (\Exception $e) {

            Log::error('Category Update Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Category update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $category = Category::findOrFail($id);

            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $category->delete();

            return redirect()->route('categories.index')
                ->with('success', 'Category deleted successfully');

        } catch (\Exception $e) {

            Log::error('Category Delete Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Category deletion failed.');
        }
    }
}
