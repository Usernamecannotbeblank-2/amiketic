<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div>{{ __('Prikaz svih proizvoda') }} </div>
            <div class="mt-4">
                <a href="{{ route("addp") }}" class="btn btn-primary">Add product</a>
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
                            <th>Price</th>
                            <th>Prodaja u kolicini od</th>
                            <th>Zalihe</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th colspan="2">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->naziv }}</td>
                                <td>{{ $product->cena }}</td>
                                <td>{{ $product->supply->komad }}m²</td>
                                <td>{{ $product->supply->kolicinam2 }}m²</td>
                                <td>
                                    <img src="{{ asset('storage/' . $product->image) }}" style="width: 100px;" alt="">
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td><a href="{{ route('deletep', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a></td>
                                <td><a href="{{ route('editp', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>