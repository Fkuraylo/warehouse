@extends('layouts.main')
@section('content')

    <div><a class="btn btn-info mt-3 text-white" href="{{ route('product.index') }}">Назад</a></div>

    <form action="{{ route('product.store') }}" method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" class="form-control" id="product_name" name="name" placeholder="Название товара"
                   value="{{ @old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputEmail1">Цена</label>
            <input type="text" class="form-control" id="product_price" name="price" placeholder="В рублях"
                   value="{{ @old('price') }}">
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="exampleInputEmail1">Описание</label>
            <textarea class="form-control" id="product_description" name="description"
                      placeholder="Описание товара">{{ @old('description') }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="category">Категория</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="tags">Тэги (можно выбрать несколько)</label>
            <select multiple class="form-control" id="tags" name="tags_id[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Добавить</button>
    </form>

@endsection
