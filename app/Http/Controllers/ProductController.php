<?php
namespace App\Http\Controllers;

use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function index() {
        $products = Product::query()
            ->select([
                'id',
                'product_name',
                'link_id_1',
                'link_name_1',
                'link_id_2',
                'link_name_2',
                'link_id_2',
                'link_name_2',
            ])
            ->get();

        return view('index', compact('products'));
    }
}
