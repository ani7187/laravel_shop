<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Services\Product\CreateProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{

    private $productService;

    public function __construct()
    {
        $this->productService = new CreateProductService();
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

//        dd($data);

        try {
            $this->productService->createProduct($data);
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            // Log the exception or handle the error appropriately
            Log::error('Product creation failed: ' . $e->getMessage());
            return redirect()->route('product.index')->with('error', 'Product creation failed. Please try again.');
        }

    }
}
