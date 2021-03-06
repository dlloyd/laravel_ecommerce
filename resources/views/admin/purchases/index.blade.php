@extends('layouts.app')

@section('content')
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Commandes en cours </strong>
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
                                              <form action="{{ route('admin_validate_purchase_delivery') }}" method="post">
                                                 <input type="text" name="delivery_code" value='' class="delivery-code" placeholder="Code livraison" required/>
                                                 <input type="hidden" value="{{$purchase->id}}" name="id" />
                                                 <button type="button"  class="delivery">
                                                   Valider
                                                 </button>
                                               </form>
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
  <script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
  <script type="text/javascript">
  jQuery.noConflict();

    jQuery(document).ready(function(){
      jQuery(document).on('click','.delivery',function(event){
        event.preventDefault();
        let form = jQuery(this).parent();
        if(!form.valid()){
          swal('Attention!',' Entrez un code de livraison!','warning');
        }
        else{
          swal({
            title: "Vous confirmez l'envoie de la commande?",
            text: "Validez si vous êtes certains d'avoir entré le bon code!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((addCode) => {
            if (addCode) {
              jQuery.ajax({
                url: form.attr( "action" ),
                method: "POST",
                data: form.serialize(),
                cache: false,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                },
                success: function (data) {
                  swal("Envoie de la commande validée", {
                    icon: "success",
                  }).then(()=>{
                    form.remove()
                    form.parent().text('Livrée');
                   });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  swal('Erreur','Une erreur interne est survenu',"error");
                  console.log(JSON.stringify(jqXHR) )
                }
              });

            }
          });
        }

    });
    });
  </script>
@stop
