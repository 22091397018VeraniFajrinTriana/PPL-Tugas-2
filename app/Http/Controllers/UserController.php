<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function contact(Request $request)
    {
        $data['title'] = 'Halaman Contact';
        $data['q'] = $request->get('q');
        $data['contacts'] = Contact::where('firstname', 'like', '%' . $data['q'] . '%')->get();
        return view('contact/index', $data);
    }
    
    public function contact_insert(Request $request){
        // $request->validate([

        // ]);
        $contact = new Contact($request->all());
        $contact->save();
        return redirect('contact')->with('success', 'Tambah Contact Berhasil!');
    }
    
    public function contact_insert_view(){
        $data['title'] = "Halaman Tambah Contact";
        return view('contact/insert', $data);
    }
    
    public function contact_update(Request $request, Contact $contact){
        // $request->validate([

        // ]);
        // $contact = new Contact($request->all());
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();
        return redirect('contact')->with('success', 'Edit Contact Berhasil!');
    }
    public function contact_update_view(Request $request){
        $data['title'] = "Halaman Edit Contact";
        $data['contact'] = $request->input('contact_id');
        return view('contact/update', $data);
    }

    public function contact_delete(Contact $contact){
        $contact->delete();
        return redirect('contact')->with('success', 'Hapus Contact Berhasil!');
    }

    public function address(Request $request)
    {
        $data['title'] = 'Halaman Address';
        $data['q'] = $request->get('q');
        $data['addresss'] = Address::where('street', 'like', '%' . $data['q'] . '%')->get();
        return view('address/index', $data);
    }
    
    public function address_insert(Request $request){
        // $request->validate([

        // ]);
        $address = new Address($request->all());
        $address->save();
        return redirect('address')->with('success', 'Tambah Address Berhasil!');
    }

    public function address_insert_view(){
        $data['title'] = "Halaman Tambah Address";
        return view('address/insert', $data);
    }
}