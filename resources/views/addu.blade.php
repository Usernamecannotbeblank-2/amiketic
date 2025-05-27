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
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">User name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input name="email" class="form-control" type="email"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input name="password" class="form-control" type="password"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Role id</label>
                        <select name="role_id" >
                            <option value="1">Admin</option>
                            <option value="2">Editor</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

