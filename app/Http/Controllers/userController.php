<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')
                ->get();
        return view('admin.user', ['users' => $users]);
    }
}
