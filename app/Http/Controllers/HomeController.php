<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Query\Builder;


class HomeController extends Controller
{
    public function index()
    {
        $query = User::find(request()->user()->id)->products;
        if(count($query) == 0 ) {
            return view('products.index',  ['products' => null]);
        }
        return view('products.index', [
                    'products' => User::find(request()->user()->id)->products->toQuery()->latest()->filter(
                        request(['search', 'category'])
                    )->paginate(18)->withQueryString()
        ]); 
    }

    public function show(Product $product)
    {
        if (request()->user()->cannot('viewAny', $product)) {
            abort(403);
        } 
        
        return view('products.show', [
            'product' => $product
        ]);
    }
}
