@extends('adminlte::page')

@section('title', "Editar o perfil {$profile->nome}")

@section('content_header')
<h1>Editar o perfil {{ $profile->nome }}</h1>
@stop

@section('content')
    <div class="card">       
        <div class="card-body">
            <form action="{{ route('profiles.update',$profile->id) }}" class="form" method="POST">                                                            
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form> 
        </div>
    </div>
@stop