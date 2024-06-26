<x-layout>
    <x-setting heading="Manage Products">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                                            <form method="GET" action="/admin/categories">

                                                <input type="text" name="search" placeholder="Find something"
                                                       class="bg-transparent placeholder-black font-semibold text-sm"
                                                       value = "{{ request('search') }}">
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @if (count($categories) == 0)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                Oops, No Categories Here...
                                            </div>
                                        </div>
                                    </td>
                                @endif

                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/categories/{{ $category->slug }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/categories/{{ $category->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/categories/{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>