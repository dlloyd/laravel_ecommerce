@extends('layouts.app')

@section('content')
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Liste des Produits</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Prix Unitaire</th>
                                            <th>Mettre à jour</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($products as $prod)
                                        <tr>
                                            <td><img src="{{asset($prod->getFirstMediaUrl('images', 'thumb'))}}" /></td>
                                            <td>{{$prod->name}}</td>
                                            <td>{{$prod->priceUnit}}</td>
                                            <td><a href="{{route('admin_prods.edit',['admin_prod'=> $prod->id])}}" > Ici  </a></td>
                                            <td><a href="{{route('admin_prods.destroy',['admin_prod'=> $prod->id])}}" > Ici </a></td>
                                        </tr>

                                      @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection

@section('scripts')
  <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
@stop