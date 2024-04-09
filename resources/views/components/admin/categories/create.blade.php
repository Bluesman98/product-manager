<x-layout>
    <x-setting heading="Publish New Category">
        <form method="POST" action="/admin/categories" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="slug" required />

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>