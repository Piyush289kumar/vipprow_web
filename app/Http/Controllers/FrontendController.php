<?php

namespace App\Http\Controllers;

use App\Models\AppConfiguration;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $appConfig = AppConfiguration::first();

        return view("layouts.pages.home", compact("appConfig"));
    }
}
