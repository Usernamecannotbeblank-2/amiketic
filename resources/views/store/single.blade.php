@extends("layout/template")
@section("login")
@if (auth()->check())
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="btn btn-outline-dark">Logout</button>
    </form>
@else
<a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
<a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a>
@endif
{{-- <a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
<a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a> --}}
@endsection
@section("content")
<div class="container d-flex">
    <div class="image-container"  >
        <img src="{{ asset('storage/' . $proizvod->image) }}" alt="" style="width: 300px">
        {{-- <img src="{{ asset('storage/test.jpg') }}" alt="nema" > --}}
    </div>
    <div class="container flex-column">
        <h3>{{ $proizvod->naziv }}</h3>
        <h5>Vrsta drveta: {{ $proizvod->vrsta_drveta }}</h5>
        <h5>Boja: {{ $proizvod->boja }}</h5>
        <h5>Izgled daske: {{ $proizvod->izgled_daske }}</h5>
        <h4>Cena: {{ $proizvod->cena }} RSD/m² </h4>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <h1>Opis</h1>
</div>
<hr>
<div class="container">{{ $proizvod->opis }}</div>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <form id="calculationForm" method="POST" action="{{ route('addtocart', $proizvod->id) }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="kolicinam2">Količina u m²:</label>
                         <input type="number" class="form-control" id="kolicinam2" name="kolicinam2" value="{{ $proizvod->supply->komad }}" readonly> 
                    </div>
                    <div class="col-md-4">
                        <label for="komad">Paket: {{ $proizvod->supply->komad }}m²</label>
                        <input type="number" class="form-control" id="komad" name="komad" step="1" value="1" onchange="calculateFromPackages()">
                    </div>
                    <div class="col-md-4">
                        <label for="cena">Cena (RSD):</label>
                        <input type="number" class="form-control" id="cena" name="cena" step="0.01" value="{{ $proizvod->cena }}" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Dodaj u korpu</button>
            </form>
        </div>
    </div>
</div>

<script>
    const basePrice = {{ $proizvod->cena }};
    const packageSize = {{ $proizvod->supply->komad }};

    function calculateFromPackages() {
        const quantity = document.getElementById('komad').value;
        const totalPrice = basePrice * quantity;
        const totalquantitym2 = packageSize * quantity;
        
        document.getElementById('cena').value = totalPrice.toFixed(2);
        document.getElementById('kolicinam2').value = totalquantitym2.toFixed(3);
    }
</script>

@endsection