@extends('layouts.main')
@section('content')
    <div><a class="btn btn-info mt-3 text-white" href="{{ route('product.index') }}">Все товары</a></div>

    <form action="{{ route('product.update', $product->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group mt-3">
            <label for="product_name">Название</label>
            <input type="text" class="form-control" id="product_name" name="name" aria-describedby="nameHelp"
                   value="{{ $product->name }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="product_price">Цена</label>
            <input type="text" class="form-control" id="product_price" name="price" aria-describedby="emailHelp"
                   value="{{ $product->price }}">
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="product_description">Описание</label>
            <textarea class="form-control" id="product_description"
                      name="description">{{ $product->description }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="category">Категория</label>
            <select multiple class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{ $category->id == $product->category->id ? ' selected' : '' }}
                        value="{{ $category->id }}">{{ $category->name }}
                    </option>

                @endforeach
            </select>
        </div>


        <div class="form-group mt-3">
            <label for="tags">Тэги</label>
            <select multiple class="form-control" id="tags" name="tags_id[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($product->tags as $productTag)
                            {{ $tag->id == $productTag->id ? ' selected' : '' }}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Изменить</button>
    </form>
@endsection
