<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
