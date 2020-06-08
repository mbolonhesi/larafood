@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}" class="active">Perfis</a></li>
    <li class="breadcrumb-item active">Permissões</li>
</ol>

<h1>Permissões do perfil <b>{{$profile->name}}</b>
    <a href="{{ route('profiles.permissions.available',$profile->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> ADD NOVA PERMISSÃO</a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('profiles.search')}}" class="form form-inline" method="POST">
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
                            <a href="{{ route('profiles.permissions.detach', [$profile->id,$permission->id]) }}" class="btn btn-info"><i class="fas fa-trash"></i></a>
                            
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