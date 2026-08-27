<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SkillsController extends Controller
{
    public function index()
    {
        $pageTitle = 'Skills';

        return view('skills.index');
    }

    public function data() {}
}
