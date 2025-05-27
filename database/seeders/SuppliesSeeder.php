<?php

namespace Database\Seeders;

use App\Models\Supply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplies = new Supply();
        $supplies->kolicinam2 = 118.200;
        $supplies->komad = 1.182;
        $supplies->save();
    }
}
// public function run(): void
//     {
//        $parket = new Parquet();
//        $parket->naziv = "Tarkett parket Tango Classic Hrast Copper";
//        $parket->vrsta_drveta = "hrast";
//        $parket->boja = "bakarno braon";
//        $parket->izgled_daske = "2-lamelni";
//        $parket->opis = "Tango Classic parket - Premium kolekcija je višeslojni hrastov parket koji je spreman za upotrebu odmah nakon ugradnje, bez potrebe za dodatnim hoblovanjem ili lakiranjem. Parket je četkan, što dodatno ističe prirodnu teksturu drveta, čineći ga otpornijim na ogrebotine i svakodnevna oštećenja.

//                         Zahvaljujući višeslojnoj konstrukciji, parket je izuzetno stabilan i nema opasnosti od rasušivanja, što ga čini pogodnim za postavljanje na podno grejanje. Može se postavljati lepljenjem ili plivajućom metodom, omogućavajući jednostavnu i brzu ugradnju.

//                         Parket Tango Classic karakteriše široka daska sa sve četiri oborene ivice, što prostor čini impresivnim i luksuznim.

//                         Održavanje: Usisavanje papučicom sa četkom. Brisanje vlažnom dobro oceđenom krpom, korišćenje sredstava namenjenih za parket.

//                         Za čišćenje parketa preporučuje se Tarkett Cleaner.";
//        $parket->cena = 9737.00;
//        $parket->save();
//     }