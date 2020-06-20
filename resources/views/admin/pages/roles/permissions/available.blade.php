@extends('adminlte::page')

@section('title', "Permissões disponíveis para o Cargo {$role->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index')}}" class="active">Cargos</a></li>
    <li class="breadcrumb-item active">Permissões</li>
</ol>

<h1>Permissões disponíveis para o cargo <b>{{$role->name}}</b>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('roles.permissions.available',$role->id)}}" class="form form-inline" method="POST">
                @csrf
             <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
             </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50">#</th>                                          
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('roles.permissions.attach',$role->id) }}" class="form" method="POST">
                        @csrf
                        @foreach ($permissions as $permission)
                        <tr>
                            <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></td>
                            <td>{{ $permission->name }}</td>                                                
                        </tr>
                        @endforeach 
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>                    
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