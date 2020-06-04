@extends('adminlte::page')

@section('title', "Permissão {$permission->name}")

@section('content_header')
<h1>Permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Nome: </b> {{ $permission->name }}</li>                
                <li><b>Descrição: </b> {{ $permission->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar permissão {{ $permission->name }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop