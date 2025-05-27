<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function user_list(){
        if (auth()->check() && auth()->user()->role_id == 1) {
           return view("users", [
            "users" => User::all(),
            ]); 
        }
        else
        return redirect("/dashboard");
    
    }

    public function delete_u($id) {
        $user = User::find($id);
        return view("deleteu", [
        "user" => $user
        ]);  
    }

    public function delete_uc($id) {
        $user = User::find($id);
        if (auth()->check() && auth()->user()->role_id == 1) {
            $user->delete();
            return redirect(route('users'));
        }
        else
        

        return redirect(route('users'));
    }

     public function add_u() {
        return view("addu");
    }

    public function add_uc(Request $request) {
        $request->validate([
           'name' => "string|required|min:3|max:20|unique:users,name",
           'email' => "string|required|email|unique:users,email",
           'password' => "string|required|min:5|max:100",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();
        
        return redirect(route("users"));
    }

    public function edit_u($id) {
        $user = User::find($id);
        return view('editu', [
            'user' => $user
        ]);
    }

    public function edit_uc(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|min:3|max:20|unique:users,name,' . $id,
            'email' => 'required|string|email|unique:users,email,' . $id,
            'password' => 'required|string|min:5|max:100',
            'role_id' => 'required|integer',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();
        
        return redirect(route("users"));
    }
}
