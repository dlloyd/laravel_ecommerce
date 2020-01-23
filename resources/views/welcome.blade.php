@extends('app')

@section('header')
  @include('headers.welcome')
@endsection

@section('content')

<!-- Slider -->
<section class="section-slide">
  <div class="wrap-slick1 rs2-slick1">
    <div class="slick1">
      <div class="item-slick1 bg-overlay1" style="background-image: url(images/beone-1.jpg);" data-thumb="images/beone-1.jpg" data-caption="Hoodie">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                du texte
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                texte
              </h2>
            </div>


          </div>
        </div>
      </div>

      <div class="item-slick1 bg-overlay1" style="background-image: url(images/beone-3.jpg);" data-thumb="images/beone-3.jpg" data-caption="T-shirt">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                Texte
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                Texte
              </h2>
            </div>


          </div>
        </div>
      </div>

      <div class="item-slick1 bg-overlay1" style="background-image: url(images/beone-2.jpg);" data-thumb="images/beone-2.jpg" data-caption="Casquette">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                texte
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                texte
              </h2>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="wrap-slick1-dots p-lr-10"></div>
  </div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-95 p-b-55">

</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-130">
  <div class="container">
    <div class="p-b-10">
      <h3 class="ltext-103 cl5">
        Nos Articles
      </h3>
    </div>

    <div class="flex-w flex-sb-m p-b-52">
      <div class="flex-w flex-l-m filter-tope-group m-tb-10">
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
          Tout
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".HOO">
          Hoodies
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".TSH">
          T-shirts
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".PUL">
          Pulls
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".COU">
          Coupes-vent
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CAS">
          Casquettes
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".SAC">
          Sacs
        </button>

      </div>

    </div>

    <div class="row isotope-grid">

      @foreach ($products as $prod)
        @php($class = "col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ".$prod->type->code)
        <div class="{{$class}}">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-pic hov-img0 " >
              <img src="{{asset($prod->getFirstMediaUrl('images'))}}" alt="IMG-PRODUCT">

              <a href="{{ route('product.show',['product'=>$prod->id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                Visualiser
              </a>

            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                <a href="{{ route('product.show',['product'=>$prod->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                  {{$prod->name}}
                </a>

                <span class="stext-105 cl3">
                  {{$prod->priceUnit}}&euro;
                </span>
              </div>

            </div>
          </div>
        </div>
      @endforeach

    </div>

  </div>
</section>

@endsection
