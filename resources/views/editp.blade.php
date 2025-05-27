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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('editp', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Naziv</label>
                        <input type="text" class="form-control" name="naziv" value="{{ $product->naziv }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Vrsta drveta</label>
                        <input name="vrsta_drveta" class="form-control" type="text" value="{{ $product->vrsta_drveta }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Boja</label>
                        <input name="boja" class="form-control" type="text" value="{{ $product->boja }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Izgled daske</label>
                        <input name="izgled_daske" class="form-control" type="text" value="{{ $product->izgled_daske }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Opis</label>
                        <input name="opis" class="form-control" type="text" value="{{ $product->opis }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Cena</label>
                        <input name="cena" class="form-control" type="text" value="{{ $product->cena }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Prodaja u kolicini od: </label>
                        <input name="komad" class="form-control" type="text" value="{{ $product->supply->komad }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Zalihe: </label>
                        <input name="kolicinam2" class="form-control" type="text" value="{{ $product->supply->kolicinam2 }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input name="image" class="form-control" type="file" value="{{ asset('storage/' . $product->image) }}"></input>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
                    <a class="btn btn-secondary" href="{{ route('products') }}">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

