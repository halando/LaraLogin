<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserForm extends Model
{
    use HasFactory;
    
}
// ...

// Példa az adatbázis lekérdezésre és kiírásra
$users = User::all();
foreach ($users as $user) {
    echo $user->name;
}

// Vagy használhatod a DB facade-t is
$users = DB::table('users')->get();
foreach ($users as $user) {
    echo $user->name;
}

