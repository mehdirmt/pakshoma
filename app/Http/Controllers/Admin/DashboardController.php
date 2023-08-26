<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Product;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'plans'    => Plan::with('sellType')->get(),
            'products' => Product::all()
        ]);
    }
}
