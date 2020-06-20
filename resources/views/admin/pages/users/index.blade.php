@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index')}}" class="active">Usuários</a></li>
</ol>

<h1>Usuários <a href="{{ route('users.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Adicionar</a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('users.search')}}" class="form form-inline" method="POST">
                @csrf
             <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
             </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>                           
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>                            
                            <a href="{{ route('users.roles', $user->id) }}" class="btn btn-warning"><i class="fas fa-address-card"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            <div class="card-footer">
                @if (isset($filters))
                    {!!$users->appends($filters)->links() !!}
                @else
                    {!!$users->links() !!}
                @endif               
            </div>                                      
        </div>
    </div>
@stop