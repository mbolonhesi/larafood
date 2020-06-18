@extends('adminlte::page')

@section('title', "Editar a Empresa {$tenant->title}")

@section('content_header')
<h1>Editar a Empresa {{ $tenant->title }}</h1>
@stop

@section('content')
    <div class="card">       
        <div class="card-body">
            <form action="{{ route('tenants.update',$tenant->id) }}" class="form" method="POST" enctype="multipart/form-data">                                            
                @csrf
                @method('PUT')
                @include('admin.pages.tenants._partials.form')
            </form> 
        </div>
    </div>
@stop