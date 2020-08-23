<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index ()
    {
        
        // CRUD with DB facade

        // Create  new user
        // DB::insert('insert into users (name, email, password) values (?,?,?)', ['manu', 'manuhal@mail.com', 'password']);

        // Udapte user
        // DB::update('update users set name = ? where id = 1', ['mnuel']);

        // Delete all users
        // DB::delete('delete from users');

        // Retreive users
        $users = DB::select('select * from users');        
        return $users;
         
        return view('users');
    }
}
