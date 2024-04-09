<x-layout>

    @include('products-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($products->count())
            <x-products-grid :products="$products"/>
            
            {{ $products->links() }}
        @endif
    </main>
    
</x-layout>