<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:products',
                'regular_price' => 'required',
                'sku' => 'required|unique:products',
                'quantity' => 'required',
            ]);

            $data = $request->all();

            // Upload main image
            if ($request->hasFile('image')) {
                $data['image'] = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/products'), $data['image']);
            }

            // Upload gallery images
            if ($request->hasFile('gallery_images')) {
                $gallery = [];
                foreach ($request->file('gallery_images') as $file) {
                    $name = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads/products'), $name);
                    $gallery[] = $name;
                }
                $data['gallery_images'] = $gallery;
            }

            $data['featured'] = $request->featured == 'yes' ? 1 : 0;

            Product::create($data);

            return redirect()->route('products.index')->with('success', 'Product Created');

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

            return view('admin.products.edit', compact('product'));
        } catch (\Exception $e) {
            Log::error('Product Edit Error', [
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Unable to edit product.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $product = Product::findOrFail($id);

            $data = $request->all();

            if ($request->hasFile('image')) {
                $data['image'] = time().'_'.$request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/products'), $data['image']);
            }

            if ($request->hasFile('gallery_images')) {
                $gallery = [];
                foreach ($request->file('gallery_images') as $file) {
                    $name = time().'_'.$file->getClientOriginalName();
                    $file->move(public_path('uploads/products'), $name);
                    $gallery[] = $name;
                }
                $data['gallery_images'] = $gallery;
            }

            $data['featured'] = $request->featured == 'yes' ? 1 : 0;

            $product->update($data);

            return redirect()->route('products.index')->with('success', 'Product Updated');

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
