<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\TotalPrice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Custmer;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories_count = Category::count();
        $products_count = Product::count();
        $users_count = User::whereRoleIs('admin')->count();
        $categories = Category::get();
        $custmer = Custmer::count();




        return view('dashboard.welcome', compact('categories_count', 'products_count','users_count',  'categories','custmer'));

    }//end of index

}//end of controller
