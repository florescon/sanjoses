<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Subscription;
use App\Sale;
use App\Product;
use App\ColorSizeProduct;
use App\Material;
use App\Status;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $users = User::role('user')->get()->count();
        $sales = Sale::all()->count();
        $parent_products = Product::all()->count();
        $products = ColorSizeProduct::all()->count();
        $material = Material::all()->count();

        $list = array('fa-evernote', 'fa-firefox-browser', 'fa-digital-ocean', 'fa-whatsapp', 'fa-wolf-pack-battalion', 'fa-youtube', 'fa-tumblr', 'fa-gratipay', 'fa-earlybirds', 'fa-free-code-camp', 'fa-canadian-maple-leaf', 'fa-linux', 'fa-apple', 'fa-apple');
        shuffle($list);

        // $orders = Sale::with('status')->where('type', 2)->whereDoesntHave('status', function ($query) {
        //     $query->where('level', 'like', 10);
        // })->paginate();

        $orders = Sale::with('status_bar', 'user')->where('type', 2)->orderBy('created_at', 'desc')->paginate(10);

        

        return view('backend.dashboard', compact('users', 'sales', 'parent_products', 'products', 'material', 'list', 'orders'));
    }
}
