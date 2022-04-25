@extends('layouts.frontend')

@section('content')

        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="grid grid-rows-3 gap-6 mt-4 sm:grid-rows-1 lg:grid-cols-2 xl:grid-cols-3">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src='image/{{$product->image}}' alt="" class="w-full h-48">
                <div class="flex items-end justify-end w-full bg-cover">

                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">${{ $product->price }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="range" list="tickmarks" class="w-full" value="{{$product->quantity}}" name="quantity" min="1" max="7">
                        <datalist id="tickmarks">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                          </datalist>
                        <button class="px-4 py-2 text-white bg-blue-400 rounded">Add To Cart</button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

@endsection
