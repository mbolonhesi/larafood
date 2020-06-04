@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('permissions.index')}}" class="active">Permissões</a></li>
</ol>

<h1>Permissões <a href="{{ route('permissions.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Adicionar</a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('permissions.search')}}" class="form form-inline" method="POST">
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
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>                        
                        <td>
                            
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            <div class="card-footer">
                @if (isset($filters))
                    {!!$permissions->appends($filters)->links() !!}
                @else
                    {!!$permissions->links() !!}
                @endif               
            </div>                                      
        </div>
    </div>
@stop