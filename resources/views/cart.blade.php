<div class="wrap-header-cart js-panel-cart">
  <div class="s-full js-hide-cart"></div>

  <div class="header-cart flex-col-l p-l-65 p-r-25">
    <div class="header-cart-title flex-w flex-sb-m p-b-8">
      <span class="mtext-103 cl2">
        Votre Panier
      </span>

      <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
        <i class="zmdi zmdi-close"></i>
      </div>
    </div>

    @php($total=0)
    <div class="header-cart-content flex-w js-pscroll">

      <ul id="cart_content" class="header-cart-wrapitem w-full">

      </ul>

      <div class="w-full">
        <div class="header-cart-total w-full p-tb-40">
          Total: <span id="cart-total">{{$total}}</span> &euro;
        </div>

        <div id="cart-buttons" class="header-cart-buttons flex-w w-full">
          @if($products)
            <a id="payment-link" href="{{route('payment_page')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              Passer au paiement
            </a>
            <h3 style="display:none;" id="empty-cart"> Votre panier est vide  </h3>
          @else
            <a style="display:none;" id="payment-link" href="{{route('payment_page')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              Passer au paiement
            </a>
            <h3 id="empty-cart"> Votre panier est vide  </h3>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
