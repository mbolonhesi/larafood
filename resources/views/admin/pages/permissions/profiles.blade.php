@extends('adminlte::page')

@section('title', "Perfis da Permissão {$permission->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index')}}">Permissões</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('permissions.profiles',$permission->id)}}" class="active">Profiles</a></li>
</ol>
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
                    @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td> 
                        <td><a href="{{ route('profiles.permissions.detach', [$profile->id,$permission->id]) }}" class="btn btn-info"><i class="fas fa-trash"></i></a></td>                                             
                    </tr>
                    @endforeach
                </tbody>
            </table>                                               
        </div>
    </div>
@stop