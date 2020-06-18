@extends('adminlte::page')

@section('title', "Detalhe a empresa {$tenant->name}")

@section('content_header')
<h1>Detalhes da empresa <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
    <div class="card">               
        <div class="card-body"> 
            <ul>
                <img src="{{ url("storage/{$tenant->logo}")}}" alt="{{ $tenant->name }}" style="max-width: 90px">
                <li><b>Plano: </b> {{ $tenant->plan->name }}</li>
                <li><b>Empresa: </b> {{ $tenant->name }}</li>                               
                <li><b>URL: </b> {{ $tenant->url }}</li>
                <li><b>E-mail: </b> {{ $tenant->email }}</li>            
                <li><b>CNPJ: </b> {{ $tenant->cnpj }}</li> 
                <li><b>Ativo: </b> {{ $tenant->active == 'Y' ? 'Sim' : 'Não' }}</li>
            </ul>
            <ul>
                <hr>

                <li><b>Data Assinatura: </b> {{ $tenant->subscription }}</li>                               
                <li><b>Data Expira: </b> {{ $tenant->expires_at }}</li>
                <li><b>Identificador: </b> {{ $tenant->subscription_id }}</li>            
                <li><b>Ativo: </b> {{ $tenant->sbuscription_active == 'Y' ? 'Sim' : 'Não' }}</li>                 
                <li><b>Cancelou? </b> {{ $tenant->subscription_suspended == 'Y' ? 'Sim' : 'Não' }}</li> 
            </ul>    
               
        </div>
    </div>
@stop