<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\CmsPerson;
use App\CmsImage;
use App\Setting;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = Setting::pluck('value', 'key');
        return view('frontend.index3', compact('setting'));
    }

}
