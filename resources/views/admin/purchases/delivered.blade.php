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
                                            <th>Nom Prénom</th>
                                            <th>Email</th>
                                            <th>Infos de livraison </th>
                                            <th>Détail Commande </th>
                                            <th> Code livraison  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($purchases->reverse() as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{$purchase->customer_name}}</td>
                                            <td>{{$purchase->customer_email}}</td>
                                            <td>
                                              <a href="#{{$purchase->id}}delivering" class="btn btn-outline-success" style="border-radius:30px;" rel="modal:open">Informations</a>

                                              <!-- Modal -->
                                              <div class="modal" id="{{$purchase->id}}delivering">
                                                <div class="modal-dialog">

                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Informations de livraison </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-bottom:20px;">
                                                          <div class="col-sm">Pays:</div>
                                                          <div class="col-sm">{{$purchase->customer_country}}</div>
                                                        </div>
                                                        <div class="row" style="margin-bottom:20px;">
                                                          <div class="col-sm">Ville:</div>
                                                          <div class="col-sm">{{$purchase->customer_city}}</div>
                                                        </div>
                                                        <div class="row" style="margin-bottom:20px;">
                                                          <div class="col-sm">Code Postal:</div>
                                                          <div class="col-sm">{{$purchase->customer_postal_code}}</div>
                                                        </div>
                                                        <div class="row" style="margin-bottom:20px;">
                                                          <div class="col-sm">Adresse:</div>
                                                          <div class="col-sm">{{$purchase->customer_address}}</div>
                                                        </div>
                                                        <div class="row" style="margin-bottom:20px;">
                                                          <div class="col-sm">Complement adresse:</div><br/>
                                                          <p>{{$purchase->customer_address_complement}}</p>
                                                        </div>

                                                  </div>

                                                </div>
                                              </div>
                                            </td>

                                            <td>
                                              <a href="#{{$purchase->id}}details" class="btn btn-outline-success" style="border-radius:30px;" rel="modal:open">Commande</a>

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
                                                          <td align="center">
                                                             @isset($item['size']) {{$item['size']}} @endisset
                                                          </td>
                                                          <td align="center">
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
