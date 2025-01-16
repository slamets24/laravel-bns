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
        $newsProducts = Product::with('images')->latest()->limit(4)->get();

        $products = Product::with('images')->paginate(8);

        return view('pages.visitor.index', compact('products', 'newsProducts'));
    }

    public function product($slug)
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
}
