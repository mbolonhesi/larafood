@extends('adminlte::page')

@section('title', "Categorias do produto {$product->title}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index')}}">Categorias</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('products.categories',$product->id)}}" class="active">Planos</a></li>
</ol>

<h1>Categorias do produto <b>{{$product->title}}</b>
    <a href="{{ route('products.categories.available',$product->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> ADD CATEGORIA</a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('products.search')}}" class="form form-inline" method="POST">
                @csrf
             <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
             </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>                       
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>                        
                        <td>                                                        
                            <a href="{{ route('products.category.detach', [$product->id,$category->id]) }}" class="btn btn-info"><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            <div class="card-footer">
                @if (isset($filters))
                    {!!$categories->appends($filters)->links() !!}
                @else
                    {!!$categories->links() !!}
                @endif               
            </div>                                      
        </div>
    </div>
@stop