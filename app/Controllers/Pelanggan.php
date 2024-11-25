<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index(): string
    {
        return view('pages/v_pelanggan');
    }
}
