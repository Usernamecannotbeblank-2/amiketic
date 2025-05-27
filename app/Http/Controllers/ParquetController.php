<?php

namespace App\Http\Controllers;

use App\Models\Parquet;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class ParquetController extends Controller
{
    public function index() {
        return view("store.list", [
            "proizvodi" => Parquet::all(),
        ]);

    }

    public function single($id) {
        $proizvod = Parquet::find($id);
        return view("store.single", [
            "proizvod" => $proizvod
        ]);
    }

    public function product_list() {
        if (auth()->check() && auth()->user()->role_id == 2 || auth()->user()->role_id == 1) {
           return view("products", [
            "products" => Parquet::all(),
            ]); 
        }
        else
        return redirect("/dashboard")->with("error", "You do not have permission to access this page.");
    }

    public function delete_p($id) {
        $proizvod = Parquet::find($id);
        return view("deletep", [
            "product" => $proizvod
        ]);
    }

    public function delete_pc($id) {
        Parquet::find($id)->delete();;
        Supply::find($id)->delete();
        return redirect(route("products"));
    }

    public function add_p() {
        return view("addp");
    }

    public function add_pc(Request $request) {
        $request->validate([
            'naziv' => "string|required|max:100",
            'vrsta_drveta' => "string|required|max:20",
            'boja' => "string|required|max:30",
            'izgled_daske' => "string|required|max:30",
            'opis' => "nullable|max:1000",
            'cena' => "numeric|required",
            'kolicinam2' => "numeric|required",
            'komad' => "numeric|required",
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'naziv.required' => 'Naziv proizvoda je obavezan.',
            'naziv.max' => 'Naziv proizvoda ne sme biti duži od 100 karaktera.',
            'vrsta_drveta.required' => 'Vrsta drveta je obavezna.',
            'vrsta_drveta.max' => 'Vrsta drveta ne sme biti duža od 20 karaktera.',
            'boja.required' => 'Boja je obavezna.',
            'boja.max' => 'Boja ne sme biti duža od 30 karaktera.',
            'izgled_daske.required' => 'Izgled daske je obavezan.',
            'izgled_daske.max' => 'Izgled daske ne sme biti duži od 30 karaktera.',
            'opis.max' => 'Opis ne sme biti duži od 1000 karaktera.',
            'cena.required' => 'Cena je obavezna.',
            'cena.numeric' => 'Cena mora biti broj.',
            'kolicinam2.required' => 'Količina na m² je obavezna.',
            'kolicinam2.numeric' => 'Količina na m² mora biti broj.',
            'komad.required' => 'Prodaja u količini je obavezna.',
            'komad.numeric' => 'Prodaja u količini mora biti broj.',
            'image.image' => 'Fajl mora biti slika.',
            'image.mimes' => 'Slika mora biti u formatu: jpeg, png, jpg ili gif.',
            'image.max' => 'Slika ne sme biti veća od 2MB.'
        ]);

        
        $supply = new Supply();
        $supply->komad = $request->komad;
        $supply->kolicinam2 = $request->kolicinam2;
        $supply->save();

        
        $product = new Parquet();
        $product->naziv = $request->naziv;
        $product->vrsta_drveta = $request->vrsta_drveta;
        $product->boja = $request->boja;
        $product->izgled_daske = $request->izgled_daske;
        $product->opis = $request->opis;
        $product->cena = $request->cena;
        $product->supply_id = $supply->id;

        if ($request->hasFile("image")) {
            $imageFile = $request->file("image");
            $imageName = time() . "." . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs("product_images", $imageName, 'public');
            $product->image = $imagePath;
        }

        $product->save();
        
        return redirect(route("products"));
    }



    public function edit_p($id) {
        $product = Parquet::find($id);
        return view('editp', [
            'product' => $product
        ]);
    }

    public function edit_pc(Request $request, $id) {
        $request->validate([
            'naziv' => "string|required|max:100",
            'vrsta_drveta' => "string|required|max:20",
            'boja' => "string|required|max:30",
            'izgled_daske' => "string|required|max:30",
            'opis' => "nullable|max:1000",
            'cena' => "numeric|required",
            'kolicinam2' => "numeric|required",
            'komad' => "numeric|required",
        ], [
            'naziv.required' => 'Naziv proizvoda je obavezan.',
            'naziv.max' => 'Naziv proizvoda ne sme biti duži od 100 karaktera.',
            'vrsta_drveta.required' => 'Vrsta drveta je obavezna.',
            'vrsta_drveta.max' => 'Vrsta drveta ne sme biti duža od 20 karaktera.',
            'boja.required' => 'Boja je obavezna.',
            'boja.max' => 'Boja ne sme biti duža od 30 karaktera.',
            'izgled_daske.required' => 'Izgled daske je obavezan.',
            'izgled_daske.max' => 'Izgled daske ne sme biti duži od 30 karaktera.',
            'opis.max' => 'Opis ne sme biti duži od 1000 karaktera.',
            'cena.required' => 'Cena je obavezna.',
            'cena.numeric' => 'Cena mora biti broj.',
            'kolicinam2.required' => 'Količina na m² je obavezna.',
            'kolicinam2.numeric' => 'Količina na m² mora biti broj.',
            'komad.required' => 'Prodaja u količini je obavezna.',
            'komad.numeric' => 'Prodaja u količini mora biti broj.'
        ]);

        $product = Parquet::find($id);
        $product->naziv = $request->naziv;
        $product->vrsta_drveta = $request->vrsta_drveta;
        $product->boja = $request->boja;
        $product->izgled_daske = $request->izgled_daske;
        $product->opis = $request->opis;
        $product->cena = $request->cena;

        $supply = $product->supply;
        $supply->komad = $request->komad;
        $supply->kolicinam2 = $request->kolicinam2;
        
        if ($request->hasFile("image")) {
            $imageFile = $request->file("image");
            $imageName = time() . "." . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs("product_images", $imageName, 'public');
            $product->image = $imagePath;
        }

        $supply->save();
        $product->save();

        
        return redirect(route("products"));
    }

    public function addToCart(Request $request, $id) {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Morate biti prijavljeni da biste dodali proizvod u korpu.');
        }

        $request->validate([
            'kolicinam2' => 'required|numeric|min:0.01',
            'cena' => 'required|numeric|min:0'
        ], [
            'kolicinam2.required' => 'Količina je obavezna.',
            'kolicinam2.numeric' => 'Količina mora biti broj.',
            'kolicinam2.min' => 'Količina mora biti veća od 0.',
            'cena.required' => 'Cena je obavezna.',
            'cena.numeric' => 'Cena mora biti broj.',
            'cena.min' => 'Cena mora biti veća od 0.'
        ]);

        $product = Parquet::find($id);
        
        $cart = new Cart();
        $cart->user_id = auth()->id();
        $cart->parquet_id = $product->id;
        $cart->total_m2 = $request->kolicinam2;
        $cart->price = $request->cena;
        $cart->save();

        return redirect()->route('cart')->with('success', 'Proizvod je dodat u korpu!');
    }

    public function viewCart() {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da bi ste videli korpu!');
        }

        $carts = Cart::where('user_id', auth()->id())
                    ->where('is_ordered', false)
                    ->with('parquet')
                    ->get();

        $total = $carts->sum('price');

        return view("store.cart", [
            'carts' => $carts,
            'total' => $total
        ]);
    }

    public function removeFromCart($id) {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Morate biti prijavljeni da biste uklonili proizvod iz korpe.');
        }


        if (!$cartItem) {
            return redirect()->route('cart')->with('error', 'Proizvod nije pronađen u korpi.');
        }

        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'Proizvod je uklonjen iz korpe.');
    }

}

// $table->id();
//             $table->string("naziv", 50);
//             $table->string("image")->default("default.jpeg");
//             $table->string("vrsta_drveta", 30);
//             $table->string("boja", 50);
//             $table->string("izgled_daske", 50);
//             $table->text("opis");
//             $table->decimal("cena");
//             $table->timestamps();


