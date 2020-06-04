@extends('adminlte::page')

@section('title', "Detalhe do perfil {$profile->name}")

@section('content_header')
<h1>Detalhes do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Nome: </b> {{ $profile->name }}</li>                
                <li><b>Descrição: </b> {{ $profile->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar o perfil {{ $profile->name }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop