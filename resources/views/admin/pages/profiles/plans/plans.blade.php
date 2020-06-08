@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('profiles.index')}}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.plans',$profile->id)}}" class="active">Planos</a></li>
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
                    @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td> 
                        <td><a href="{{ route('plans.profiles.detach', [$plan->id,$profile->id]) }}" class="btn btn-info"><i class="fas fa-trash"></i></a></td>                                             
                    </tr>
                    @endforeach
                </tbody>
            </table>                                               
        </div>
    </div>
@stop