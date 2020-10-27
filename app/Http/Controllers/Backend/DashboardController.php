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

        $users = User::role('user')->count();
        $sales = Sale::count();
        $parent_products = Product::count();
        $products = ColorSizeProduct::count();
        $material = Material::count();


        // $orders = Sale::with('status')->where('type', 2)->whereDoesntHave('status', function ($query) {
        //     $query->where('level', 'like', 10);
        // })->paginate();

        $orders = Sale::with('user')->where('type', 2)->orderBy('created_at', 'desc')->paginate(10);


        return view('backend.dashboard', compact('users', 'sales', 'parent_products', 'products', 'material', 'orders'));
    }
}
