<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoritProducts = Product::with('images')->where('is_favorit', true)->limit(4)->get();

        $products = Product::with('images')->paginate(8);

        return view('pages.visitor.index', compact('products', 'favoritProducts'));
    }

    public function detailProduct($slug)
    {
        $detailProduct = Product::with(['colors', 'images'])->where('slug', $slug)->first();

        if (!$detailProduct) {
            abort(404, 'Produk tidak ditemukan');
        }
        $colors = $detailProduct->colors;
        $images = $detailProduct->images;
        $newsProducts = Product::with('images')->latest()->limit(4)->get();

        return view('pages.visitor.detail-product', compact('detailProduct', 'images', 'colors', 'newsProducts'));
    }

    public function product()
    {
        // Ambil semua produk untuk ditampilkan
        $products = Product::paginate(16); // 4x4 grid = 16 produk per halaman

        return view('pages.visitor.product', compact('products'));
    }
}
