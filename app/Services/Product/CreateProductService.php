<?php
namespace App\Services\Product;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ColorProduct;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateProductService
{
    public function createProduct(array $data)
    {
        DB::beginTransaction(); // Start the transaction

//        dd($data);
        try {
            // Handle image upload
            $data['preview_img'] = Storage::disk('public')->put('/images',  $data['preview_img']);

            if (!empty($data['tags'])) {
                $tagIDList = $data['tags'];
                unset($data['tags']); // Remove tags and colors from $data
            }
            if (!empty($data['colors'])) {
                $colorIDList = $data['colors'];
                unset($data['colors']);
            }

            // Create product
            $product = Product::firstOrCreate([
                'title' => $data['title']
            ], $data);

            if (!empty($tagIDList)) {
                // Add product tags
                foreach ($tagIDList as $tagID) {
                    ProductTag::firstOrCreate([
                        'product_id' => $product->id,
                        'tag_id' => $tagID
                    ]);
                }
            }

            if (!empty($colorIDList)) {
                // Add product colors
                foreach ($colorIDList as $colorID) {
                    ColorProduct::firstOrCreate([
                        'product_id' => $product->id,
                        'color_id' => $colorID
                    ]);
                }
            }

            DB::commit(); // Commit the transaction

            return $product; // Return the created product

        } catch (Exception $e) {
            DB::rollBack(); // Rollback the transaction if anything fails

            // Log the exception or handle it as needed
            // Log::error($e->getMessage()); // Uncomment if you want to log the error
            throw $e; // Optionally rethrow the exception to handle it in the controller
        }
    }
}
