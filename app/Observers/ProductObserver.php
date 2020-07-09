<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->flag = Str::of($product->title)->kebab();
        $product->uuid = Str::uuid();
    }

    /**
     * Handle the product "updating" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->flag = Str::of($product->title)->kebab();
    }
}
