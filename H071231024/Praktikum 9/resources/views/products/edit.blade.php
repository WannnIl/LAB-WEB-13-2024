@extends('layouts/home')

@section('content')
    <div class="max-w-md mx-auto bg-blue-600 rounded-lg overflow-hidden shadow-md mb-16">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold mb-2 text-black   ">Edit Produk</h2>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-black text-sm font-bold mb-2">Nama:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        value="{{ $product->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-black text-sm font-bold mb-2">Deskripsi:</label>
                    <input type="text" name="description" id="description"
                        class="w-full px-3 py-2 border bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        value="{{ $product->description }}" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-black text-sm font-bold mb-2">Harga:</label>
                    <input type="number" name="price" id="price"
                        class="w-full px-3 py-2 border bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        value="{{ $product->price }}" required
                        onkeydown="if(event.key === 'ArrowUp') this.stepUp(); else if(event.key === 'ArrowDown') this.stepDown();"
                        min="0">
                </div>

                <div class="mb-4">
                    <label for="category_name" class="block text-black text-sm font-bold mb-2">Kategori:</label>
                    <div class="relative">
                        <select name="category_id" id="category_id"
                            class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 bg-blue-200 text-black"
                            required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06 0L10 10.88l3.71-3.67a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-black text-sm font-bold mb-2">Stok:</label>
                    <input type="number" name="stock" id="stock"
                        class="w-full px-3 py-2 border bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        value="{{ $product->stock }}" required
                        min="0">
                </div>
                
                <div class="flex justify-end">
                    <a href="{{ route('products.index') }}"
                        class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-900 mr-2">Kembali</a>
                    <button type="submit"
                        class="px-4 py-2 bg-green-700 text-white rounded-md hover:bg-green-900">Simpan</button>
                </div>
            </form>

        </div>  
    </div>
@endsection