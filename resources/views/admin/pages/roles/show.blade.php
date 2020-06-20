@extends('adminlte::page')

@section('title', "Detalhe do cargo {$role->name}")

@section('content_header')
<h1>Detalhes do cargo <b>{{ $role->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Nome: </b> {{ $role->name }}</li>                
                <li><b>Descrição: </b> {{ $role->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar o cargo {{ $role->name }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop