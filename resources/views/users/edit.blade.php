<x-app-layout>
<x-slot name="header">
    <div>
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
        </div>
        <div class="text-right"><a href="{{route('users.index')}}" class="text-white bg-green-600 p-3 rounded-lg ">Back</a></div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update',[$user->id] ) }}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name',$user?->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email',$user?->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                     

                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select name="role" id="role" class="block mt-1 w-full 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">
                                <option value="Select Role">Select Role</option>
                                <option {{ old('role',$user?->hasRole('admin'))? 'selected' :''}} value="admin">Admin</option>
                                <option {{ old('role',$user?->hasRole('seller'))? 'selected' :''}} value="seller">Seller</option>
                                <option {{ old('role',$user?->hasRole('buyer'))? 'selected' :''}} value="buyer">Buyer</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                         </br>
                         <x-primary-button type="submit">Save</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>