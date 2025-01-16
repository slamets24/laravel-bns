<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;

class CheckRemainingColors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $idproduct = $request->route('product');

        // Ambil jumlah gambar yang tersisa
        $product = Product::with('colors')->findOrFail($idproduct);
        $remainingcolorsCount = $product->colors->count();

        // Periksa apakah gambar yang tersisa hanya satu atau kurang
        if ($remainingcolorsCount <= 1) {
            return back()->withErrors(['error' => 'Setidaknya sisakan 1 gambar']);
        }
        return $next($request);
    }
}
