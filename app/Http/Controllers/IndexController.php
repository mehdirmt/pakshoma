<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'products' => Product::query()->latest()->get()
        ]);
    }
}
