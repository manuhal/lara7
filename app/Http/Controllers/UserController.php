<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        // User Eloquent ORM https://laravel.com/docs/7.x/eloquent

        // method #2 in creating record
        // $data = [
        //     'name' => 'jack',
        //     'email' => 'jack@hotmail.com',
        //     'password' => '123456', //udh bikin mutator to bcrypt this field
        //     'email_verified_at' => date("Y/m/d"),
        // ];

        // // using ::create() method - https://laravel.com/docs/7.x/eloquent#mass-assignment
        // User::create($data);

        // method #1 to create record
        // Create new record
        // $user = new User();
        // $user->name = 'Olin';
        // $user->email = 'olin@mail.com';
        // $user->password = bcrypt('123456');
        // $user->save();

        // Retrieve specific id = 2
        // return User::find(2);

        // Delete specific id = 2
        // User::find(2)->delete();

        // delete user without finding it first, use destroy, also can delete multiple ids
        // User::destroy(4,5,6,7,8,9,12,13,14);

        // Update
        // User::where('id',5)->update(['name' => 'Olin (Manu\'s beloved wife)']);
        // User::where('id',4)->update(['password' => bcrypt('12345abc')]);

        //return all user records
        return User::all();

        // dd($user);

        // CRUD with DB facade

        // Create  new user
        // DB::insert('insert into users (name, email, password) values (?,?,?)', ['manu', 'manuhal@mail.com', 'password']);

        // Udapte user
        // DB::update('update users set name = ? where id = 1', ['mnuel']);

        // Delete all users
        // DB::delete('delete from users');

        // Retreive users
        // $users = DB::select('select * from users');
        // return $users;

        // return view('users');
    }

    public function uploadAvatar(Request $request)
    {
        //check if user select image (avatar field is not empty)
        if ($request->hasFile('avatar')) {
            
            //get the filename            
            //$filename = $request->file('avatar')->getClientOriginalName();
            $filename = $request->avatar->getClientOriginalName();   

            //store in the  public/images folder            
            // $request->file('avatar')->storeAs('images', $filename,'public');
            $request->avatar->storeAs('images', $filename,'public');

            // verify that there were no problems uploading the file
            if ($request->avatar->isValid()) {
                //return 'image uploaded successfully';
                //update user's record with the avatar data
                // dd(auth()->user());
                // User::find(1)->update(['avatar' => $filename])
                auth()->user()->update(['avatar' => $filename]);                
            }
        } else {
            return 'please select your image';
        }
        return redirect()->back();

    }
}
