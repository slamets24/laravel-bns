<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use App\Models\Color;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['colors', 'images'])->latest()->get();
        return view('pages.dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create Product
            $product = $this->createProduct($request);

            // Store Colors
            $this->storeColors($request, $product);

            // Store Images
            $this->storeImages($request, $product);


            DB::commit();

            Alert::toast('Sukses Menambahkan Produk', 'success');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Produk: ' . $e->getMessage()]);
        }
    }

    public function createProduct($request)
    {
        return Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'url_shopee' => $request->url_shopee,
            'url_tokped' => $request->url_tokped,
            'url_wa' => $request->url_wa,
            'slug' => Str::slug($request->name . '-' . Str::ulid()),
            'user_id' => Auth::user()->id
        ]);
    }

    public function storeColors($request, $product)
    {
        foreach ($request->colors as $color) {
            Color::create([
                'product_id' => $product->id,
                'name' => $color
            ]);
        }
    }

    public function storeImages($request, $product)
    {
        $images = $request->file("images");
        foreach ($images as $image) {
            $path = $image->storePublicly("imagae", "public");
            Image::create([
                'product_id' => $product->id,
                'name' => $path
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::with(['colors', 'images'])->findOrFail($id);

        return view('pages.dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        try {
            DB::beginTransaction();

            $product = product::findOrFail($product);
            $oldName = $product->name;

            $request->validate([
                'name' => 'required|string|min:5|max:50',
                'description' => 'required|string',
                'price' => 'required|numeric|regex:/^[0-9]+$/',
                'category' => 'required|string|in:hijab,mukena,gamis,abaya',
                'url_shopee' => 'string|url:http,https|nullable',
                'url_tokped' => 'string|url:http,https|nullable',
                'url_wa' => 'required|numeric|regex:/^[0-9]+$/'
            ]);

            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category' => $request->category,
                'url_shopee' => $request->url_shopee,
                'url_tokped' => $request->url_tokped,
                'url_wa' => $request->url_wa,
                'slug' => $request->name != $oldName ?  Str::slug($request->name . '-' . Str::ulid()) : $product->slug,
                'user_id' => Auth::user()->id
            ]);


            DB::commit();

            Alert::toast('Sukses Mengedit Produk', 'success');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Mengedit Produk: ' . $e->getMessage()]);
        }
    }

    public function addImages(Request $request, string $product)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'images.*' => 'required|image|mimes:jpeg,png,jpg|max:1048|'
            ]);

            $product = product::with('images')->findOrFail($product);

            $this->storeImages($request, $product);

            DB::commit();

            Alert::toast('Sukses Menambahkan Gambar Produk', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Gambar Produk: '
                . $e->getMessage()]);
        }
    }

    public function addColor(Request $request, string $product)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'color' => 'required|string|min:3|max:50'
            ]);

            $product = product::with('colors')->findOrFail($product);

            $product->colors()->create([
                'name' => $request->color
            ]);

            DB::commit();

            Alert::toast('Sukses Menambahkan Warna Produk', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal Menambahkan Warna Produk: '
                . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->colors()->delete();
        $product->images()->delete();
        $product->delete();

        Alert::toast('Berhasil menghapus data Produk', 'success');
        return redirect()->route('products.index');
    }

    public function destroyColor(string $product, string $color)
    {
        $product = product::with('colors')->findOrFail($product);
        $product->colors()->findOrFail($color)->delete();

        Alert::toast('Berhasil menghapus data Warna', 'success');
        return redirect()->back();
    }

    public function destroyImage(string $product, string $image)
    {
        $product = product::with('images')->findOrFail($product);
        $product->images()->findOrFail($image)->delete();

        Alert::toast('Berhasil menghapus data Gambar', 'success');
        return redirect()->route('products.edit', $product);
    }
}
