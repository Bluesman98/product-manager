@props(['product'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="{{ $product->thumbnail  ? asset('storage/' . $product->thumbnail) : '/images/illustration-1.png' }}" alt="Blog Product illustration" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                   <x-category-button :category="$product->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/products/{{ $product->slug }}">
                            {{ $product->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $product->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $product->price !!} $
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="#">{{ $product->creator->name }}</a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/products/{{ $product->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Details</a>
                </div>
            </footer>
        </div>
    </div>
</article>
