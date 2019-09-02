<div class="row">
  <div class="col-md-6 col-lg-7 p-b-30">
    <div class="p-l-25 p-r-30 p-lr-0-lg">
      <div class="wrap-slick3 flex-sb flex-w">
        <div class="wrap-slick3-dots"></div>
        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

        <div class="slick3 gallery-lb">
          @foreach ($product->getMedia('images') as $media)
            <div class="item-slick3" data-thumb="{{asset($media->getUrl())}}">
              <div class="wrap-pic-w pos-relative">
                <img src="{{asset($media->getUrl())}}" alt="IMG-PRODUCT">

                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset($media->getUrl())}}">
                  <i class="fa fa-expand"></i>
                </a>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-5 p-b-30">
    <div class="p-r-50 p-t-5 p-lr-0-lg">
      <h4 class="mtext-105 cl2 js-name-detail p-b-14">
        {{ $product->name }}
      </h4>

      <span class="mtext-106 cl2">
        {{$product->priceUnit}} &euro;
      </span>

      <p class="stext-102 cl3 p-t-23">
        {{$product->description}}
      </p>

      <!--  -->
      <div class="p-t-33">

        @if(count($product->sizes)>0)
          <div class="flex-w flex-r-m p-b-10">
            <div class="size-203 flex-c-m respon6">
              Taille
            </div>

            <div class="size-204 respon6-next">
              <div class="rs1-select2 bor8 bg0">
                <select class="js-select2" name="time">
                  @foreach ($product->sizes as $size)
                    <option value="{{$size->id}}">{{$size->code}}</option>
                  @endforeach

                </select>
                <div class="dropDownSelect2"></div>
              </div>
             </div>

            </div>
        @endif

        <div class="flex-w flex-r-m p-b-10">
          <div class="size-204 flex-w flex-m respon6-next">
            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
              <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                <i class="fs-16 zmdi zmdi-minus"></i>
              </div>

              <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

              <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                <i class="fs-16 zmdi zmdi-plus"></i>
              </div>
            </div>

            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
              Ajouter au panier
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
