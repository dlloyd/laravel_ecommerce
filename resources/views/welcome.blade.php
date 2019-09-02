@extends('app')

@section('header')
  @include('headers.welcome')
@endsection

@section('content')

<!-- Slider -->
<section class="section-slide">
  <div class="wrap-slick1 rs2-slick1">
    <div class="slick1">
      <div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-05.jpg);" data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                Women Collection 2018
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                New arrivals
              </h2>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
              <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                Shop Now
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-06.jpg);" data-thumb="images/thumb-02.jpg" data-caption="Men’s Wear">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                Men New-Season
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                Jackets & Coats
              </h2>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
              <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                Shop Now
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-07.jpg);" data-thumb="images/thumb-03.jpg" data-caption="Men’s Wear">
        <div class="container h-full">
          <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
              <span class="ltext-202 txt-center cl0 respon2">
                Men Collection 2018
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
              <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                NEW SEASON
              </h2>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
              <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                Shop Now
              </a>
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
  <div class="container">
    <div class="row">
      <div class="col-md-6 p-b-30 m-lr-auto">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
          <img src="images/banner-04.jpg" alt="IMG-BANNER">

          <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
            <div class="block1-txt-child1 flex-col-l">
              <span class="block1-name ltext-102 trans-04 p-b-8">
                T-shirts
              </span>

              <span class="block1-info stext-102 trans-04">
                New Trend
              </span>
            </div>

            <div class="block1-txt-child2 p-b-4 trans-05">
              <div class="block1-link stext-101 cl0 trans-09">
                Shop Now
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-6 p-b-30 m-lr-auto">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
          <img src="images/banner-05.jpg" alt="IMG-BANNER">

          <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
            <div class="block1-txt-child1 flex-col-l">
              <span class="block1-name ltext-102 trans-04 p-b-8">
                Hoodies
              </span>

              <span class="block1-info stext-102 trans-04">
                New Trend
              </span>
            </div>

            <div class="block1-txt-child2 p-b-4 trans-05">
              <div class="block1-link stext-101 cl0 trans-09">
                Shop Now
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
          <img src="images/banner-07.jpg" alt="IMG-BANNER">

          <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
            <div class="block1-txt-child1 flex-col-l">
              <span class="block1-name ltext-102 trans-04 p-b-8">
                Casquettes
              </span>

              <span class="block1-info stext-102 trans-04">
                Spring 2018
              </span>
            </div>

            <div class="block1-txt-child2 p-b-4 trans-05">
              <div class="block1-link stext-101 cl0 trans-09">
                Shop Now
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
        <!-- Block1 -->
        <div class="block1 wrap-pic-w">
          <img src="images/banner-08.jpg" alt="IMG-BANNER">

          <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
            <div class="block1-txt-child1 flex-col-l">
              <span class="block1-name ltext-102 trans-04 p-b-8">
                Sacs
              </span>

              <span class="block1-info stext-102 trans-04">
                Spring 2018
              </span>
            </div>

            <div class="block1-txt-child2 p-b-4 trans-05">
              <div class="block1-link stext-101 cl0 trans-09">
                Shop Now
              </div>
            </div>
          </a>
        </div>
      </div>


    </div>
  </div>
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

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
          Hoodies
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
          T-shirts
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
          Casquettes
        </button>

        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
          Sacs
        </button>

      </div>

    </div>

    <div class="row isotope-grid">
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0 label-new" data-label="New">
            <img src="images/product-01.jpg" alt="IMG-PRODUCT">

            <a href="{{ route('product.show',['product'=>13]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
              Aperçu
            </a>

          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Esprit Ruffle Shirt
              </a>

              <span class="stext-105 cl3">
                $16.64
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-02.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Herschel supply
              </a>

              <span class="stext-105 cl3">
                $35.31
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-03.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Only Check Trouser
              </a>

              <span class="stext-105 cl3">
                $25.50
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-04.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Classic Trench Coat
              </a>

              <span class="stext-105 cl3">
                $75.00
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-05.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Front Pocket Jumper
              </a>

              <span class="stext-105 cl3">
                $34.75
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item watches">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-06.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Vintage Inspired Classic
              </a>

              <span class="stext-105 cl3">
                $93.20
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-07.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Shirt in Stretch Cotton
              </a>

              <span class="stext-105 cl3">
                $52.66
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-08.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Pieces Metallic Printed
              </a>

              <span class="stext-105 cl3">
                $18.96
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item shoes">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-09.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Converse All Star Hi Plimsolls
              </a>

              <span class="stext-105 cl3">
                $75.00
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-10.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Femme T-Shirt In Stripe
              </a>

              <span class="stext-105 cl3">
                $25.85
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-11.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Herschel supply
              </a>

              <span class="stext-105 cl3">
                $63.16
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item men">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-12.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Herschel supply
              </a>

              <span class="stext-105 cl3">
                $63.15
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-13.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                T-Shirt with Sleeve
              </a>

              <span class="stext-105 cl3">
                $18.49
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-14.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Pretty Little Thing
              </a>

              <span class="stext-105 cl3">
                $54.79
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item watches">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-15.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Mini Silver Mesh Watch
              </a>

              <span class="stext-105 cl3">
                $86.85
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0">
            <img src="images/product-16.jpg" alt="IMG-PRODUCT">

            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
              Quick View
            </a>
          </div>

          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
              <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                Square Neck Back
              </a>

              <span class="stext-105 cl3">
                $29.64
              </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
              <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="flex-c-m flex-w w-full p-t-38">
      <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
        1
      </a>

      <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
        2
      </a>
    </div>
  </div>
</section>

@endsection
