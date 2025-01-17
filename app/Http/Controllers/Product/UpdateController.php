<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Product $product
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        return view('product.show', compact('product'));
    }
}
