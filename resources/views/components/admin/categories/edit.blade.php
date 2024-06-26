<x-layout>
    <x-setting :heading="'Edit Category: ' . $category->title">
        <form method="POST" action="/admin/categories/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="slug" :value="old('slug', $category->slug)" required />
            <x-form.button>Update</x-form.button>
            
        </form>
    </x-setting>
</x-layout>