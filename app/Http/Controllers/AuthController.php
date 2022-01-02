<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function register(Request $req) {
    $req->validate([
      'username' => 'required',
      'fullname' => 'required',
      'password' => 'required',
      'roles' => 'required'
    ]);

    $data = $req->all();
    $check = $this->create($data);

    if($check) return redirect()->route('login');
    return redirect()->route('register');   
  }

  public function create(array $data){
    return User::create([
      'username' => $data['username'],
      'fullname' => $data['fullname'],
      'password' => Hash::make($data['password']),
      'roles' => $data['roles']
    ]);
  }
    public function login(Request $req){
      $credentials = $req->validate([
        'username' => 'required|exists:users,username',
        'password' => 'required'
      ]);

      $remember = $req->has('remember_me');
      $isAuth = Auth::attempt($credentials, $remember);
      if($isAuth) return redirect()->route('games.index');
      return redirect()->route('login');
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('login');
    }
}
