<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = User::find(request()->user()->id)->categories;

        if (count($categories) == 0) {
            return view('components.admin.categories.index', [
                'categories' => []
            ]);
        } else {

            $categories = $categories->toQuery()->latest();

            if (request('search')) {
                $categories->where('name', 'like', '%' . request('search') . '%');
            }
            return view('components.admin.categories.index', [
                'categories' => $categories->paginate(50)

            ]);
        }
    }

    public function create()
    {
        return view('components.admin.categories.create');
    }

    public function store()
    {
        Category::create(array_merge($this->validateCategory(), [
            'user_id' => request()->user()->id,
        ]));

        return redirect('/');
    }

    public function edit(Category $category)
    {
        $this->authUser($category);

        return view('components.admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        $this->authUser($category);

        $attributes = $this->validateCategory($category);

        $category->update($attributes);

        return back()->with('success', 'Category Updated!');
    }

    public function destroy(Category $category)
    {
        $this->authUser($category);

        // Delete only if category has no associated products
        if ($category->products()->count() == 0) {
            $category->delete();

            return back()->with('success', 'Category Deleted!');
        }
        return back()->with('success', 'Category cannot be deleted because it has associated products!');
    }

    protected function validateCategory(?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category)],
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
        ]);
    }

    protected function authUser($product)
    {
        if (request()->user()->cannot('viewAny', $product)) {
            abort(403);
        }
    }
}
