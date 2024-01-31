@extends('layouts.main')
@section('content')
    <div class="mt-3">{{ $product->id }}. {{ $product->name }}</div>
    <div><span class="fw-bold">Категория: </span>{{ $product->category->name }} </div>
    <div><span class="fw-bold">Описание: </span>{{ $product->description }}</div>
    <div><span class="fw-bold">Цена: </span>{{ $product->price }} руб.</div>
    <hr>
    <div><a class="btn btn-info text-white" href="{{ route('product.index') }}"><- Все товары</a>
        <a class="btn btn-primary text-white" href="{{ route('product.edit', $product->id) }}">Изменить</a>


        <form action="{{ route('product.destroy', $product->id) }}" method="post">
            @csrf
            @method('delete')
            <input class="mt-3 btn btn-danger" type="submit" value="Удалить">
        </form>
    </div>
@endsection
