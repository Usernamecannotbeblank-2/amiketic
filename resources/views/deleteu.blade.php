<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete?') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="mb-4 mt-2">Are you sure you want to delete this item?</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <h3>ID: {{ $user->id }}</h3>
                    <h3>User Name: {{ $user->name }}</h3>
                    <h5>Email: {{ $user->email }}</h5>
                    <h5 >Role id: {{ $user->role_id }}</h5>
                    <h5 class="mb-5">Role: @switch($user->role_id)
                        @case(1)
                            Admin
                            @break
                        @case(2)
                            Editor
                            @break
                        @case(3)
                            User
                            @break
                        @default
                            
                    @endswitch</h5>
                    <hr class="mb-4">
                    <div class="container my-4">
                        <a href="{{ route('deleteuc', ['id' => $user->id]) }}" class="btn btn-danger me-3">Delete</a>
                        <a href="{{ route('users') }}" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

 {{-- $user = new User();
        $user->name = "admin";
        $user->email = "admin@pwa.rs";
        $user->role_id = 1;
        $user->password = Hash::make('admin@pwa.rs');
        $user->save(); --}}




