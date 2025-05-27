@extends("layout/template")
@section("content")
<div class="container mt-4">
    <h2>Vaša korpa</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($carts) > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Slika</th>
                        <th>Naziv</th>
                        <th>Površina (m²)</th>
                        <th>Cena (RSD)</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $cart->parquet->image) }}" alt="{{ $cart->parquet->naziv }}" style="width: 100px">
                            </td>
                            <td>{{ $cart->parquet->naziv }}</td>
                            <td>{{ $cart->total_m2 }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $cart->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Ukupno:</strong></td>
                        <td colspan="2"><strong>{{ number_format($total, 2) }} RSD</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Vaša korpa je prazna.
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('store.list') }}" class="btn btn-primary">Nastavi kupovinu</a>
    </div>
</div>
@endsection 