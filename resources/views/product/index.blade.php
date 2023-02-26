<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex items-center justify-between text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Products') }}
            <a href="{{ route('product.create') }}" class="hover:underline">{{ __('Add Product') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Our products
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Culpa pariatur ipsum corrupti obcaecati delectus quas ratione
                            sed ducimus tempore sequi, ab reiciendis sit accusantium minima ex saepe eos eveniet quis.
                        </p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->color }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->category }}
                                </td>
                                <td class="px-6 py-4">
                                    ${{ $product->price }}
                                </td>
                                <td class="flex gap-2 px-6 py-4 text-right">
                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="font-medium text-green-600 dark:text-green-500 hover:underline">Show</a>
                                    |
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    |
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                    colspan="5">
                                    No Data yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
