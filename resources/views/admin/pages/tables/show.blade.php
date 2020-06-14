@extends('adminlte::page')

@section('title', "Detalhe da Mesa {$table->identify}")

@section('content_header')
<h1>Detalhes da Mesa <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Identificação: </b> {{ $table->identify }}</li>                            
                <li><b>Descrição: </b> {{ $table->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('tables.destroy',$table->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar a Mesa {{ $table->identify }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop