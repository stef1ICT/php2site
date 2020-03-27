<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    

    public function __construct()
    {
     
    }

    public function index() {
        $this->authorize('isAdmin');
        $users = User::latest()->paginate(5);
        return view('Admin.User.index', ['users'=>$users]);
    }
}
