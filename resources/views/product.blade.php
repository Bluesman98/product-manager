<x-layout>
{{--     <article>
        <h1><?= $product->title; ?></h1>

        <p>
            By <a href="/authors/{{$product->creator->username}}">{{$product->creator->name}}</a> in <a href="/category/{{$product->category->slug}}"><?= $product->category->name; ?></a>
        </p>


        <div>
            {!! $product->body !!}
        </div>
    </article>

    <a href="/">Go Back</a> --}}
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ $product->thumbnail  ? asset('storage/' . $product->thumbnail) : '/images/illustration-1.png' }}" alt="Blog Product illustration" class="rounded-xl">
                        Published
                        <time>{{ $product->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?creator={{ $product->creator->username }}">{{ $product->creator->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Products
                        </a>

                        <div class="space-x-2">
                            <a href="/categories/{{ $product->category->slug }}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $product->category->name }}</a>
                            <a href="#"
                                class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">Updates</a>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $product->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{ $product->price }} $
                    </div>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{ $product->description }}
                    </div>
                </div>
            </article>
        </main>
    </section>

</x-layout>
