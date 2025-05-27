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
                    <h3>ID: {{ $product->id }}</h3>
                    <h3>Naziv: {{ $product->naziv }}</h3>
                    <h5>Vrsta drveta: {{ $product->vrsta_drveta }}</h5>
                    <h5>Boja: {{ $product->boja }}</h5>
                    <h5>Izgled daske: {{ $product->izgled_daske }}</h5>
                    <h5>Prodaja u kolicini od: {{ $product->supply->komad }}m²</h5>
                    <h5>Zalihe: {{ $product->supply->kolicinam2 }}m²</h5>
                    <h4 class="mb-4">Cena: {{ $product->cena }} RSD/m² </h4>
                    <hr class="mb-4">
                    <div class="container my-4">
                        <a href="{{ route('deletepc', ['id' => $product->id]) }}" class="btn btn-danger me-3">Delete</a>
                        <a href="{{ route('products') }}" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>






