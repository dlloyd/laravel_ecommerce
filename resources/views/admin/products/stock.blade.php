@extends('layouts.app')

@section('breadcrumb')
  Mettre à jour stock
@endsection

@section('content')

  <div class="content mt-3">
    <div class="row">
      <div class="col-lg-8">
          <div class="card">
              <div class="card-header">
                  <strong>Formulaire stock {{$product->name}}</strong>
              </div>

                <div class="card-body card-block">

                  <div class="row form-group">
                      <div class="col col-md-3"><label class=" form-control-label">Tailles et Quantité</label></div>
                      <div class="col col-md-9">

                        @foreach ($productSizes as $size)
                          <form action="{{route('admin_prods.update_stock',['admin_prod'=>$product->id])}}" method="POST" class="form-horizontal">
                            @method('put')
                            @csrf
                            <label>{{$size->name}}</label>
                            <input type="number" name="quantity" value="{{$size->pivot->quantity}}" class="form-control" />
                            <input name="size_id" value="{{$size->id}}" hidden/>
                            <button type="submit" class="validate-stock btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Mettre à jour
                            </button>
                          </form>
                          <br/>
                          @endforeach

                      </div>
                  </div>

                </div>
                <div class="card-footer">

                </div>

          </div>

      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
<script>
  jQuery(document).on('click','.validate-stock',function(event){
  event.preventDefault();
  const form = jQuery(this).closest('form');
  const url = form.attr( "action" );
  var formData = new FormData();
  formData.append('quantity',9);
  formData.append('size_id',1);

  jQuery.ajax({
    url: url,
    method: "PUT",
    data: form.serialize(),
    cache: false,
    beforeSend: function (xhr) {
        xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
    },
    success: function (data) {
      swal('Validation', "Stock mis à jour", "success");
      console.log(data)
    },
    error: function (jqXHR, textStatus, errorThrown) {
      swal('Erreur' ,'Une erreur interne est survenue veuillez réessayer','error');
      console.log(JSON.stringify(jqXHR));
    }
  });

});
</script>
@stop
