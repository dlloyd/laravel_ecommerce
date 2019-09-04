@extends('app')

@section('header')
  @include('headers.basic')
@endsection

@section('content')

  <section class="bg0 p-t-23 p-b-130">
    <div class="container">
      <div class="p-b-10">
        <h3 class="ltext-103 cl5">
          {{$type->name}}
        </h3>
      </div> <br/><br/>

      <div class="row isotope-grid">

        @foreach ($products as $prod)

          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
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
