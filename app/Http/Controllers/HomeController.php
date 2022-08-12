<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Document;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $templates = Template::getAllTemplates();
        return view('docs.list',['list' => $templates]);
    }
}
