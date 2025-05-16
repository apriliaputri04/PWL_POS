<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    public function index()
    {
        return view('transaksi_penjualan.index');
    }
}