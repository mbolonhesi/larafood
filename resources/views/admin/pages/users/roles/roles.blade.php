@extends('adminlte::page')

@section('title', "Cargos do Usuário {$user->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index')}}" class="active">Usuários</a></li>
    <li class="breadcrumb-item active">Permissões</li>
</ol>

<h1>Cargos do usuário <b>{{$user->name}}</b>
    <a href="{{ route('users.roles.available',$user->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> ADD NOVA CARGO</a></h1>    
@stop

@section('content')
    <div class="card">
       
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>                       
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>                        
                        <td>                                                        
                            <a href="{{ route('users.roles.detach', [$user->id,$role->id]) }}" class="btn btn-info"><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            <div class="card-footer">
                @if (isset($filters))
                    {!!$roles->appends($filters)->links() !!}
                @else
                    {!!$roles->links() !!}
                @endif               
            </div>                                      
        </div>
    </div>
@stop