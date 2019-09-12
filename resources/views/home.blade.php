@extends('layouts.app')

@section('content')

<div class="content mt-3">

    <div class="col-sm-12">
      @if (session('status'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

      @endif

    </div>


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="{{route('admin_prods.index')}}">Afficher </a>

                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">{{$productsCount}}</span>
                </h4>
                <p class="text-light">Produits</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="{{route('purchases')}}">Afficher</a>

                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">{{$purchasesRunningCount}}</span>
                </h4>
                <p class="text-light">Commandes en cours</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                        <div class="dropdown-menu-content">
                            <a class="dropdown-item" href="{{route('delivered_purchases')}}">Afficher</a>

                        </div>
                    </div>
                </div>
                <h4 class="mb-0">
                    <span class="count">{{$purchasesDeliveredCount}}</span>
                </h4>
                <p class="text-light">Commandes réalisées</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>
    <!--/.col-->



</div> <!-- .content -->
@endsection
