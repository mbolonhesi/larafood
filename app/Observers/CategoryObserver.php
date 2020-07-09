<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
     /**
     * Handle the category "creating" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->url = Str::of($category->name)->kebab();
        $category->uuid = Str::uuid();
    }

    /**
     * Handle the category "updating" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::of($category->name)->kebab();
    }
}
