<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }
}
