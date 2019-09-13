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
                                      @foreach ($products->reverse() as $prod)
                                        <tr>
                                            <td><img src="{{asset($prod->getFirstMediaUrl('images', 'thumb'))}}" /></td>
                                            <td>{{$prod->name}}</td>
                                            <td>{{$prod->priceUnit}}</td>
                                            <td><a href="{{route('admin_prods.edit',['admin_prod'=> $prod->id])}}" > Ici  </a></td>
                                            <td>

                                              <form  method="post" action="{{route('admin_prods.destroy',['admin_prod'=> $prod->id])}}" >
                                                @method('delete')

                                                <button class="delete-product btn btn-info btn-lg" style="background-color:red" type="submit" >Supprimer</button>
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
<script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
<script>
  jQuery(document).ready(function($){
    jQuery(document).on('click','.delete-product',function(event){
      event.preventDefault();
      let form = jQuery(this).parent();

        swal({
          title: "Attention!!",
          text: "Cette étape est irréversible! Etes vous sûr de vouloir supprimer ce produit?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((deleteIt) => {
          if (deleteIt) {
            jQuery.ajax({
              url: form.attr( "action" ),
              type:'DELETE',
              data: form.serialize(),
              cache: false,
              beforeSend: function (xhr) {
                  xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
              },
              success: function (data) {
                swal("Produit supprimé de la base de données", {
                  icon: "success",
                }).then(()=>{
                  let line = form.parent().parent();
                  line.remove();
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
 });
</script>
@stop
