<x-app-layout>



<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new user') }}
        </h2>
    </x-slot>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('editu', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">User name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input name="email" class="form-control" type="email" value="{{ $user->email }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input name="password" class="form-control" type="password"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Role id</label>
                        <select name="role_id" >
                            @switch($user->role_id)
                                @case(1)
                                    <option selected value="1">Admin</option>
                                    <option value="2">Editor</option>
                                    <option value="3">User</option>
                                    @break
                                @case(2)
                                    <option value="1">Admin</option>
                                    <option selected value="2">Editor</option>
                                    <option value="3">User</option>
                                    @break
                                @case(3)
                                    <option value="1">Admin</option>
                                    <option  value="2">Editor</option>
                                    <option selected value="3">User</option>       
                            @endswitch
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
                    <a class="btn btn-secondary" href="{{ route('users') }}">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

