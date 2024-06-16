<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <table>
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <!-- $roles = $user->getRoleNames(); -->
                     <tbody>
                        @foreach($users as $user)
                        <tr>
                    <th>{{ $user->name}}</th>
                    <th>{{ $user->email}}</th>
                    <th>{{ $user->getRoleNames()}}</th>
                    <th></th>
                        </tr>
                        @endforeach
                 
                     </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>