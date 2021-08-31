<?php 

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('users.index', [
            "users" => $users,
        ]);
    }


}