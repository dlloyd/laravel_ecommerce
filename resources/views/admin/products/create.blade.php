@extends('layouts.app')

@section('breadcrumb')
  Ajouter un produit
@endsection

@section('content')

  <div class="content mt-3">
    <div class="row">
      <div class="col-lg-8">
          <div class="card">
              <div class="card-header">
                  <strong>Formulaire</strong>
              </div>
              <div class="card-body card-block">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <form action="{{route('admin_prods.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                      @csrf
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="name" class=" form-control-label">Nom</label></div>
                          <div class="col-12 col-md-9"><input type="text" id="name" name="name"  class="form-control"><small class="form-text text-muted">Libellé du produit</small></div>
                      </div>
                      <div class="row form-group">
                          <div class="col col-md-3"><label for="priceUnit" class=" form-control-label">Prix Unitaire</label></div>
                          <div class="col-3 col-md-3"><input type="text" id="priceUnit" name="priceUnit"  class="form-control"><small class="help-block form-text">Montant en euros</small></div>
                      </div>

                      <div class="row form-group">
                          <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                          <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="..." class="form-control"></textarea></div>
                      </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="select" class=" form-control-label">Type de produit</label></div>
                              <div class="col-12 col-md-9">
                                  <select name="product_type_id" id="product_type_id" class="form-control">
                                    @foreach ($productTypes as $type)
                                      <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach

                                  </select>
                              </div>
                          </div>

                          <div class="row form-group">
                              <div class="col col-md-3"><label class=" form-control-label">Tailles</label></div>
                              <div class="col col-md-9">
                                  <div class="form-check">
                                      @foreach ($productSizes as $size)
                                        <div class="checkbox">

                                          <input type="checkbox" id="checkbox{{$size->id}}" name="sizes[]" value="{{$size->id}}" class="form-check-input">{{$size->name}} ({{$size->code}})

                                        </div>
                                      @endforeach

                                  </div>
                              </div>
                          </div>


                          <div class="row form-group">
                            <div class="col col-md-3"><label for="image">Images</label></div>
                            <div class="col-12 col-md-9">
                              <div class="needsclick dropzone" id="document-dropzone">
                                <div class="dz-message" data-dz-message><span>Déposez image ici pour enregistrer</span></div>
                              </div>
                            </div>
                          </div>

                        </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i> Enregistrer
                  </button>
                  <button type="reset" class="btn btn-danger btn-sm">
                      <i class="fa fa-ban"></i> Annuler
                  </button>
              </div>
            </form>
          </div>

      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script>
  jQuery(document).ready(function($){
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
      url: '{{ route('products.storeMedia') }}',
      maxFilesize: 2, // MB
      acceptedFiles: ".jpeg,.jpg,.png",
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      success: function (file, response) {
        $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
      },
      removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="image[]"][value="' + name + '"]').remove()
      },
      init: function () {
        @if(isset($product) && $product->getMedia('images'))

          @foreach ($product->getMedia('images') as $media)
            var file = {!! json_encode($media) !!}

            var img_url ="{{route('welcome')}}"+"{{$media->getUrl()}}"
            this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file,img_url);
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
          @endforeach

        @endif
      }
    }
 });
</script>
@stop
