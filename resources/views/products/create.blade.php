<x-app-layout>
<x-slot name="header">
    <div>
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
        </div>
        <div class="text-right"><a href="{{route('products.index')}}" class="text-white bg-green-600 p-3 rounded-lg ">Back</a></div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="qty" :value="__('Qty')"/>
                            <x-text-input id="qty" class="block mt-1 w-full" type="text" name="qty"
                                :value="old('qty')" />
                            <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="price" :value="__('Price')"/> 
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                :value="old('price')" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>


                    

                        <div class="mt-4">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">
                                <option value="Select Role">Select Category</option>
                                @foreach  ($categories as $id=> $name)
                                <option value="{{$id}}"> {{$name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                         </br>
                         <x-primary-button type="submit">Save</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>