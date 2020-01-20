@extends('app')

@section('header')
  @include('headers.basic')
@endsection

@section('content')

  <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ route('welcome')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Accueil
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="{{route('show_by_type',['code'=>$product->type->code])}}" class="stext-109 cl8 hov-cl1 trans-04">
				{{ $product->type->name }}
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{ $product->name }}
			</span>
		</div>
	</div>


	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
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
            <form id="cart_add" method="post" action="{{route('add_to_cart',['product'=>$product->id])}}" >
						<div class="p-t-33">
              @php($stock = 0)
              @if(count($product->sizes)>0)
    						<div class="flex-w flex-r-m p-b-10">
    							<div class="size-203 flex-c-m respon6">
    								Taille
    							</div>

                  <div class="size-204 respon6-next">
    								<div class="rs1-select2 bor8 bg0">
    									<select id="size" class="js-select2" name="size_code">
                        @foreach ($product->sizes as $size)
                          @if($size->pivot->quantity > 0 )
                            <option value="{{$size->code}}">{{$size->code}}/Stock:{{$size->pivot->quantity}}</option>
                          @else
                            <option value="{{$size->code}}" disabled>{{$size->code}}/Stock:{{$size->pivot->quantity}}</option>
                          @endif
                        @endforeach

    									</select>
    									<div class="dropDownSelect2"></div>
                      @foreach ($product->sizes as $size)
                        @php($stock+= $size->pivot->quantity)
                        <div id="{{$size->code}}-stock" hidden>{{$size->pivot->quantity}}</div>
                      @endforeach

    								</div>
    							 </div>

    						  </div>
                  <div class="flex-w flex-r-m p-b-10">
                    <div class="size-203 flex-c-m respon6">
                    </div>
    								<div class="size-204 respon6-next">
    									<div class="rs1-select2 bor8 bg0">
    										<select id="stock" class="js-select2" name="quantity">
                          <!-- Dynamic change depending on stock for a size -->
                        </select>
                        <div class="dropDownSelect2"></div>
    									</div>

    								</div>
    							</div>
              @else
              <div class="flex-w flex-r-m p-b-10">
                <div class="size-203 flex-c-m respon6">
                </div>
                <div class="size-204 respon6-next">
                  @php($stock +=$product->quantity)
                  @if($product->quantity > 0)
                    <div class="rs1-select2 bor8 bg0">
                      <select id="stock" class="js-select2" name="quantity">
                        @for($i=1;$i<= $product->quantity; $i++)
                          <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  @endif

                </div>
              </div>

              @endif

              <div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
                  @if($stock > 0 )
  									<button id="add-to-cart-button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
  										Ajouter au panier
  									</button>

                  @else
                    <div style="color:red"> Stock épuisé </div>
                  @endif
								</div>
							</div>

						</div>
          </form>

					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{$product->description}}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">

			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categorie: {{$product->type->name}}
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Produits similaires
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
          @foreach ($similars as $prod)
            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
  						<!-- Block2 -->
  						<div class="block2">
  							<div class="block2-pic hov-img0">
  								<img src="{{asset($prod->getFirstMediaUrl('images','thumb'))}}" alt="IMG-PRODUCT">

  								<a href="{{route('product.show',['product'=>$prod->id])}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
  									Visualiser
  								</a>
  							</div>

  							<div class="block2-txt flex-w flex-t p-t-14">
  								<div class="block2-txt-child1 flex-col-l ">
  									<a href="{{route('product.show',['product'=>$prod->id])}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
		</div>
	</section>

@endsection

@section('javascripts')
  @parent
  <script type="text/javascript">
    $(document).ready(function(){

      if($('#size').length){  // if size exists
        updateStockSelectOptions()
      }
      $('#size').change(function(){
        updateStockSelectOptions();
      });


      function updateStockSelectOptions(){
        let code = '#'+$('#size').val()+'-stock';
        let stock = $(code).text();
        let options = "";
        for(i=1;i<=stock;i++){
          options+= "<option value="+i+" >"+i+"</option>";
        }
        $('#stock').empty().append(options);
      }

    });
  </script>
@endsection
