<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;

class PageController extends Controller
{

    public function show(CmsPage $page){
        	return view('frontend.page', compact('page'));
    }
}
