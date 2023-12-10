<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){


        // Ellenőrizd, hogy a felhasználó be van-e jelentkezve
        $user_id = Session::get('user_id');
        if (!$user_id) {
            return redirect('login');
        }

        // Lekérdezés az adatbázisból a felhasználói adatok lekérdezéséhez
        $user = DB::table('user_form')->where('id', $user_id)->first();

        return view('home', ['user' => $user]);
    }
 
    public function logout()
    {
        // Kiléptetés és visszairányítás a bejelentkező oldalra
        Session::forget('user_id');
        return redirect('login');
    }

 
}
 


 
 











 
 



