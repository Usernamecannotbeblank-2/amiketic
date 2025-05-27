<x-app-layout>



<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new') }}
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
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Naziv</label>
                        <input type="text" class="form-control" name="naziv">
                    </div>
                    <div class="mb-3">
                        <label for="">Vrsta drveta</label>
                        <input name="vrsta_drveta" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Boja</label>
                        <input name="boja" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Izgled daske</label>
                        <input name="izgled_daske" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Opis</label>
                        <input name="opis" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Cena</label>
                        <input name="cena" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Prodaja u kolicini od: </label>
                        <input name="komad" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Zalihe: </label>
                        <input name="kolicinam2" class="form-control" type="text"></input>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input name="image" class="form-control" type="file"></input>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

{{-- 
$parket = new Parquet();
       $parket->naziv = "Tarkett parket Tango Classic Hrast Copper";
       $parket->vrsta_drveta = "hrast";
       $parket->boja = "bakarno braon";
       $parket->izgled_daske = "2-lamelni";
       $parket->opis = "Tango Classic parket - Premium kolekcija je višeslojni hrastov parket koji je spreman za upotrebu odmah nakon ugradnje, bez potrebe za dodatnim hoblovanjem ili lakiranjem. Parket je četkan, što dodatno ističe prirodnu teksturu drveta, čineći ga otpornijim na ogrebotine i svakodnevna oštećenja.

                        Zahvaljujući višeslojnoj konstrukciji, parket je izuzetno stabilan i nema opasnosti od rasušivanja, što ga čini pogodnim za postavljanje na podno grejanje. Može se postavljati lepljenjem ili plivajućom metodom, omogućavajući jednostavnu i brzu ugradnju.

                        Parket Tango Classic karakteriše široka daska sa sve četiri oborene ivice, što prostor čini impresivnim i luksuznim.

                        Održavanje: Usisavanje papučicom sa četkom. Brisanje vlažnom dobro oceđenom krpom, korišćenje sredstava namenjenih za parket.

                        Za čišćenje parketa preporučuje se Tarkett Cleaner.";
       $parket->cena = 9737.00;
       $parket->save(); --}}