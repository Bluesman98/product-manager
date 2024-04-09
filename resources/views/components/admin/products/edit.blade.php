<x-layout>
    <x-setting :heading="'Edit Product: ' . $product->title">
        <form method="POST" action="/admin/products/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $product->title)" required />
            <x-form.input name="slug" :value="old('slug', $product->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $product->thumbnail)" />
                </div>

                <img src="{{ $product->thumbnail  ? asset('storage/' . $product->thumbnail) : '/images/illustration-1.png' }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="description" required>{{ old('description', $product->description) }}</x-form.textarea>

            <x-form.input name="price" :value="old('price', $product->price)" type="number" required />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\User::find(request()->user()->id)->categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>