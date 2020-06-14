@extends('adminlte::page')

@section('title', "Detalhe do categoria {$category->name}")

@section('content_header')
<h1>Detalhes da categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Nome: </b> {{ $category->name }}</li>
                <li><b>URL: </b> {{ $category->url }}</li>                
                <li><b>Descrição: </b> {{ $category->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar a categoria {{ $category->name }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop