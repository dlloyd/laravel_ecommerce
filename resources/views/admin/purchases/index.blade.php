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
                                              <button type="button" style="background-color:#008000" class="btn btn-info btn-lg" data-toggle="modal" data-target="#{{$purchase->id}}details"> Détails </button>
                                              <!-- Modal -->
                                              <div class="modal fade" id="{{$purchase->id}}details" role="dialog">
                                                <div class="modal-dialog">

                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Détail de commande </h4>
                                                    </div>
                                                    <div class="modal-body">

                                                      <table>
                                                      <thead>
                                                        <th class="product-thumbnail">Produit</th>
                                                        <th class="product-name">Nom</th>
                                                        <th class="product-size">Taille</th>
                                                        <th class="product-quantity">Quantité</th>
                                                      </thead>
                                                      <tbody>
                                                        @foreach ($purchase->purchase_list as $item)
                                                          <tr>
                                                          <td class="product-thumbnail">
                                                            <a>
                                                              <img src="{{asset($item['thumb'])}}" alt="IMG">
                                                            </a>

                                                          </td>
                                                          <td class="product-name">
                                                            <a>{{$item.name}}</a>
                                                          </td>
                                                          <td class="product-size">
                                                             @isset($item['size']) {{$item['size']}} @endisset
                                                          </td>
                                                          <td class="product-quantity">
                                                            {{ $item.quantity }}
                                                          </td>
                                                          </tr>
                                                        @endforeach

                                                        </tbody>
                                                      </table>


                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                  </div>

                                                </div>
                                              </div>
                                            </td>

                                            <td>
                                              <form action="{{ route('admin_validate_purchase_delivery') }}" method="post">
                                                 <input type="text" name="delivery-code" value='' class="delivery-code" placeholder="Code livraison" required/>
                                                 <input type="hidden" value="{{purchase.code}}" name="code" />
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
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','.delivery',function(event){
        event.preventDefault();
        let form = $(this).parent();
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
              $.ajax({
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

    });
  </script>
@stop
