<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // use Illuminate\Support\Str;
    public function index()
    {
        try {
            $products = Product::with(['category', 'brand'])
                ->latest()
                ->paginate(10);

            return view('admin.products.index', compact('products'));

        } catch (\Exception $e) {
            Log::error('Product Index Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()->with('error', 'Unable to load products.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categories = Category::all();
            $brands = Brand::all();

            return view('admin.products.create', compact('categories', 'brands'));
        } catch (\Exception $e) {
            Log::error('Product Create Page Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to open product form.');
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products',
                'regular_price' => 'required',
                'sku' => 'required|unique:products',
                'quantity' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'gallery_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $data = $request->except(['image', 'gallery_images']);

            //  Main Image (Storage)
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('products', 'public');
            }

            //  Gallery Images (Storage)
            if ($request->hasFile('gallery_images')) {
                $gallery = [];

                foreach ($request->file('gallery_images') as $file) {
                    $path = $file->store('products/gallery', 'public');
                    $gallery[] = $path;
                }

                $data['gallery_images'] = json_encode($gallery);
            }

            //  Featured
            $data['featured'] = $request->featured;

            //  Optional slug fix
            $data['slug'] = Str::slug($request->slug);

            Product::create($data);

            return redirect()->route('products.index')
                ->with('success', 'Product Created');

        } catch (\Exception $e) {

            Log::error('Product Store Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Product creation failed.');
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
            $product = Product::findOrFail($id);
            $categories = Category::all();
            $brands = Brand::all();

            return view('admin.products.edit', compact('product', 'categories', 'brands'));
        } catch (\Exception $e) {
            Log::error('Product Edit Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to edit product.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products,slug,'.$product->id,
                'category_id' => 'required|exists:categories,id',
                'brand_id' => 'nullable|exists:brands,id',
                'short_description' => 'required|string',
                'information' => 'required|string',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'gallery_images' => 'nullable|array',
                'gallery_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
                'regular_price' => 'required|numeric',
                'sale_price' => 'nullable|numeric',
                'sku' => 'required|string|max:100',
                'quantity' => 'required|integer',
                'stock' => 'required|in:in-stock,out-of-stock',
                'featured' => 'required|boolean',
            ]);
            unset($validated['image'], $validated['gallery_images']);
            $product->update($validated);
            if ($request->hasFile('image')) {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $product->image = $request->file('image')->store('products', 'public');
                $product->save();
            }
            $existingGallery = json_decode($product->gallery_images ?? '[]', true) ?? [];
            if ($request->filled('removed_gallery')) {
                $removedImages = json_decode($request->removed_gallery, true) ?? [];
                foreach ($removedImages as $img) {
                    if (Storage::disk('public')->exists($img)) {
                        Storage::disk('public')->delete($img);
                    }
                }
                $existingGallery = array_diff($existingGallery, $removedImages);
            }
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $file) {
                    $existingGallery[] = $file->store('products/gallery', 'public');
                }
            }
            $product->gallery_images = json_encode(array_values($existingGallery));
            $product->save();
            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            Log::error('Product Update Error', [
                'message' => $e->getMessage(),
            ]);
            return back()->with('error', 'Product update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Product::findOrFail($id)->delete();

            return back()->with('success', 'Product Deleted');

        } catch (\Exception $e) {
            Log::error('Product Delete Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Product deletion failed.');
        }
    }
}
