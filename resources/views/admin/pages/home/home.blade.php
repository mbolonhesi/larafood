@extends('adminlte::page')

@section('title', "Dashboard")

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-users"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number">{{ $totalUsers }}</span>
            </div>

        </div>
        <!-- small box -->
    </div>    
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-tablet"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Mesas</span>
                <span class="info-box-number">{{ $totalTable }}</span>
            </div>

        </div>
        <!-- small box -->
    </div>    
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-layer-group"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Categorias</span>
                <span class="info-box-number">{{ $totalCategories }}</span>
            </div>

        </div>
        <!-- small box -->
    </div>    
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-hamburger"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Produtos</span>
                <span class="info-box-number">{{ $totalProducts }}</span>
            </div>

        </div>
        <!-- small box -->
    </div>  
    @admin()
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-building"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Empresas</span>
                <span class="info-box-number">{{ $totalTenants }}</span>
            </div>

        </div>
        <!-- small box -->
    </div> 
    @endadmin
    @admin()
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-list-ul"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Planos</span>
                <span class="info-box-number">{{ $totalPlans }}</span>
            </div>

        </div>
        <!-- small box -->
    </div>  
    @endadmin
    @admin() 
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-address-card"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Cargos</span>
                <span class="info-box-number">{{ $totalRoles }}</span>
            </div>

        </div>
        <!-- small box -->
    </div> 
    @endadmin
    @admin()
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-user-alt"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Perfis</span>
                <span class="info-box-number">{{ $totalProfiles }}</span>
            </div>

        </div>
        <!-- small box -->
    </div>  
    @endadmin
    @admin()
    <div class="col-lg-3 col-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fas fa-lock"></i>
            </span>    
            <div class="info-box-content">
                <span class="info-box-text">Permissões</span>
                <span class="info-box-number">{{ $totalPermissions }}</span>
            </div>

        </div>
        <!-- small box -->
    </div> 
    @endadmin                  
</div>
@stop