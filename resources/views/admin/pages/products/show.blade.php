@extends('adminlte::page')

@section('title', "Detalhe do Produto {$product->title}")

@section('content_header')
<h1>Detalhes da Produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <img src="{{ url("storage/{$product->image}")}}" alt="{{ $product->title }}" style="max-width: 90px">
                <li><b>Título: </b> {{ $product->title }}</li>   
                <li><b>Preço: </b> R$ {{ number_format($product->price,2,',','.') }}</li>             
                <li><b>Flag: </b> {{ $product->flag }}</li>
                <li><b>Descrição: </b> {{ $product->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar a Produto {{ $product->title }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop