@extends('adminlte::page')

@section('title', "Perfis do plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index')}}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.profiles',$plan->id)}}" class="active">Planos</a></li>
</ol>

<h1>Perfis do plano <b>{{$plan->name}}</b>
    <a href="{{ route('plans.profiles.available',$plan->id)}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> ADD NOVO PERFIL</a></h1>    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
             <form action="{{ route('plans.search')}}" class="form form-inline" method="POST">
                @csrf
             <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
             </form>
        </div>
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
                        <td>                                                        
                            <a href="{{ route('plans.profiles.detach', [$plan->id,$profile->id]) }}" class="btn btn-info"><i class="fas fa-trash"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            <div class="card-footer">
                @if (isset($filters))
                    {!!$profiles->appends($filters)->links() !!}
                @else
                    {!!$profiles->links() !!}
                @endif               
            </div>                                      
        </div>
    </div>
@stop