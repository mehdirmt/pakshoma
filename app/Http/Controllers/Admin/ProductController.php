<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function create(): View
    {
        return view('admin.product.create');
    }

    public function store(CreateProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try {
            $imagePath = $request->file('image')->store('uploads', 'public');
            if (!$imagePath) {
                throw new Exception('file upload exception');
            }
            $product = new Product();
            $product->name = $validated['name'];
            $product->price = $validated['price'];
            $product->image = $imagePath;
            $product->save();

            $route = 'admin.dashboard';
            $flash = [
                'type'    => 'success',
                'message' => 'create new product success'
            ];
        } catch (Exception $e) {
            $route = 'admin.products.create';
            $flash = [
                'type'    => 'failure',
                'message' => $e->getMessage()
            ];
        }

        return redirect()->route($route)->with('flash_message', $flash);
    }
}
