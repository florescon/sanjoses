<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{

    public function index()
    {
    	return view('backend.documentation.index');
    }

    public function start()
    {
    	return view('backend.documentation.start');
    }

    public function documentation()
    {
    	return view('backend.documentation.documentation');
    }

    public function faqs()
    {
    	return view('backend.documentation.faqs');
    }

    public function license()
    {
    	return view('backend.documentation.license');
    }


}
