@extends('layouts.app')

@section('content')
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Commandes livrées </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th>Addresse</th>
                                            <th>Adresse complément </th>
                                            <th>Code Postal </th>
                                            <th>Détail Commande </th>
                                            <th> Code livraison  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{$purchase->customer_name}}</td>
                                            <td>{{$purchase->customer_email}}</td>
                                            <td>{{$purchase->customer_country}}</td>
                                            <td>{{$purchase->customer_city}}</td>
                                            <td>{{$purchase->customer_address}}</td>
                                            <td>{{$purchase->customer_address_complement}}</td>
                                            <td>{{$purchase->customer_postal_code}}</td>
                                            <td>
                                              <a href="#{{$purchase->id}}details" class="btn btn-info btn-lg" style="background-color:#008000" rel="modal:open">Voir</a>

                                              <!-- Modal -->
                                              <div class="modal" id="{{$purchase->id}}details">
                                                <div class="modal-dialog">

                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Détail de commande </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                      <table>
                                                      <thead>
                                                        <th>Produit</th>
                                                        <th style="width: 50%">Nom</th>
                                                        <th>Taille</th>
                                                        <th>Quantité</th>
                                                      </thead>
                                                      <tbody>
                                                        @foreach ($purchase->getPurchaseList() as $item)
                                                          <tr>
                                                          <td>
                                                            <a>
                                                              <img style="width:80px" src="{{asset($item['thumb'])}}" alt="IMG">
                                                            </a>

                                                          </td>
                                                          <td>
                                                            <a>{{$item['name']}}</a>
                                                          </td>
                                                          <td>
                                                            &nbsp; @isset($item['size']) {{$item['size']}} @endisset
                                                          </td>
                                                          <td>
                                                            {{ $item['quantity'] }}
                                                          </td>
                                                          </tr>
                                                        @endforeach

                                                        </tbody>
                                                      </table>


                                                    </div>

                                                  </div>

                                                </div>
                                              </div>
                                            </td>

                                            <td>
                                              {{$purchase->delivery_code}}
                                            </td>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  

@stop
