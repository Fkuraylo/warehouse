<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();



        if (!isset($data['tags_id']))
        {
            Product::create($data);
        } else
        {
            $tags = $data['tags_id'];
            unset($data['tags_id']);
            $product = Product::create($data);
            $product->tags()->attach($tags);
        }

        return redirect()->route('product.index');
    }
}
