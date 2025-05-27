@extends("layout.template")
@section("login")
@if(auth()->check()) 
   <form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="btn btn-outline-dark">Logout</button>
   </form>
@else
<a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
<a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a>
@endif



@endsection

@section("heder")
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Parket koji traje.</h1>
            <p class="lead fw-normal text-white-50 mb-0">Pogledajte neke od naših najnovijih ponuda.</p>
        </div>
    </div>
</header>
@endsection

@section("products")
@foreach ($proizvodi as $proizvod)
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="{{ asset('storage/' . $proizvod->image) }}"  alt="">
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">{{ $proizvod->naziv }}</h5>
                    <!-- Product price-->
                    {{ $proizvod->cena }} RSD/m²
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('store.single', $proizvod->id) }}">Vise</a></div>
            </div>
        </div>
    </div>
    
@endforeach
@endsection