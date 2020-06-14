@extends('adminlte::page')

@section('title', "Detalhe do usuário {$user->name}")

@section('content_header')
<h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Nome: </b> {{ $user->name }}</li>
                <li><b>E-mail: </b> {{ $user->email }}</li>                
                <li><b>Empresa: </b> {{ $user->tenant->name }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar o usuário {{ $user->name }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop