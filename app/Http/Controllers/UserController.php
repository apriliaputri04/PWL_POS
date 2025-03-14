<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // coba akses model UserModel
        $user = UserModel::where('level_id', 1) -> frist(); // ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}