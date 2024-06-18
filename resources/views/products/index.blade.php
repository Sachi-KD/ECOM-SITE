<x-app-layout>
    <x-slot name="header">
    <div>
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
        </div>
        <div class="text-right"><a href="{{route('users.create')}}" class="text-white bg-blue-700 p-3 rounded-lg ">Add New</a></div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <table>
                  <thead>
                  <tr>
                    <th>Name</th>
                   
                    <th>Action</th>
                  </tr>
                  </thead>
                  <!-- $roles = $user->getRoleNames(); -->
                     <tbody>
                        @foreach($products as $product)
                        <tr>
                    <th>{{ $product->name}}</th>
                  
                    <th><a href="{{route('products.edit', [$product->id])}}" >Edit</a>
                        
                </th>
                        </tr>
                        @endforeach
                 
                     </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>