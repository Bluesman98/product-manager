<x-layout>
    <x-setting heading="Publish New Product">
        <form method="POST" action="/admin/products" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required /> 
            <x-form.input name="thumbnail" type="file"  />
            <x-form.textarea name="description" required />
            <x-form.input name="price" required type="number"/>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\User::find(request()->user()->id)->categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
