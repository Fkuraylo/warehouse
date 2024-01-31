<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['tags_id']))
        {
            $tags = $data['tags_id'];
            unset($data['tags_id']);
            $product->tags()->sync($tags);
        }
        $product->update($data);

        return redirect()->route('product.show', $product->id);
    }
}
