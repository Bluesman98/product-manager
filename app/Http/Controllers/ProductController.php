<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    public function index()
    {
        $products = User::find(request()->user()->id)->products;

        if (count($products) == 0) {
            return view('components.admin.products.index', [
                'products' => []

            ]);
        } else {

            $products = $products->toQuery();

            if (request('search')) {
                $products->where('title', 'like', '%' . request('search') . '%');
            }
            return view('components.admin.products.index', [
                'products' => $products->latest()->paginate(50)
            ]);
        }
    }

    public function create()
    {
        return view('components.admin.products.create');
    }

    public function store()
    {
        Product::create(array_merge($this->validateProduct(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Product $product)
    {
        $this->authUser($product);

        return view('components.admin.products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        $this->authUser($product);

        $attributes = $this->validateProduct($product);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $product->update($attributes);

        return back()->with('success', 'Product Updated!');
    }

    public function destroy(Product $product)
    {
        $this->authUser($product);

        $product->delete();

        return back()->with('success', 'Product Deleted!');
    }

    protected function validateProduct(?Product $product = null): array
    {
        $product ??= new Product();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $product->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product)],
            'description' => 'required',
            'price' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

    protected function authUser($product)
    {
        if (request()->user()->cannot('viewAny', $product)) {
            abort(403);
        }
    }
}
