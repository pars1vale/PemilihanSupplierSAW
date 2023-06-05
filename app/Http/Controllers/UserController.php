<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemohon;
use App\Models\Berkas;
use App\Models\Keluhan;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('home', ['users' => $users]);
    }

}