@extends('adminlte::page')

@section('title', "Detalhe do plano {$plan->name}")

@section('content_header')
<h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <li><b>Nome: </b> {{ $plan->name }}</li>
                <li><b>URL: </b> {{ $plan->url }}</li>
                <li><b>Preço: </b> R$ {{ number_format($plan->price,2,',','.') }}</li>
                <li><b>Descrição: </b> {{ $plan->description }}</li>            
            
                @include('admin.includes.alerts')
                <br>
                <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Deletar o plano {{ $plan->name }}</button>
                </form>
            </ul>          
        </div>
    </div>
@stop