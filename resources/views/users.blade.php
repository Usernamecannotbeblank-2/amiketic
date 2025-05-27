<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div>{{ __('Prikaz svih korisnika') }} </div>
            <div class="mt-4">
                <a href="{{ route('addu') }}" class="btn btn-primary">Add new user</a>
            </div>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>created at</th>
                            <th>updated at</th>
                            <th colspan="2">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @switch($user->role_id)
                                    @case(1)
                                        <td>Admin</td>
                                        @break
                                    @case(2)
                                        <td>Editor</td>
                                        @break
                                    @case(3)
                                        <td>User</td>
                                        @break        
                                @endswitch
                                
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                @if (auth()->check() && auth()->user()->name == $user->name) 
                                    
                                @else
                                    <td><a href="{{ route("deleteu", ['id' => $user->id]) }}" class="btn btn-danger">Delete</a></td>
                                    <td><a href="{{ route("editu", ['id' => $user->id]) }}" class="btn btn-primary">Edit</a></td>
                                @endif
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constrained('roles');
            $table->rememberToken();
            $table->timestamps();
        }); --}}