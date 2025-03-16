<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    public function index ()
    {
        $product = Product::all();
        return view(
            'pages.Home',      
            get_defined_vars()
        );
    }

    public function product_detail($id)
    {
        // Cari pesan berdasarkan ID
        $product = Product::find($id);

        // Jika pesan tidak ditemukan, kembalikan response 404
        if (!$product) {
            abort(404, 'Products not found!');
        }
        return view(
            'pages.Product.detail',
            get_defined_vars()
            );
    }

    
}
