<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index');
    }
}
