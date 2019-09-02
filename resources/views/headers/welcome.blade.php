<!-- Header -->
<header class="header-v3">
  <!-- Header desktop -->
  <div class="container-menu-desktop trans-03">
    <div class="wrap-menu-desktop">
      <nav class="limiter-menu-desktop p-l-45">

        <!-- Logo desktop -->
        <a href="{{route('welcome')}}" class="logo">
          <img src="{{asset('images/icons/logo.jpg')}}" alt="IMG-LOGO">
        </a>

        <!-- Menu desktop -->
        <div class="menu-desktop">
          <ul class="main-menu">
            <li>
              <a href="{{route('welcome')}}"> Accueil </a>
            </li>
            <li>
              <a href="#">T-shirt</a>
            </li>
            <li>
              <a href="#">Hoodie</a>
            </li>
            <li class="label1" data-label1="hot">
              <a href="#">Sac</a>
            </li>

            <li>
              <a href="#">Casquette</a>
            </li>


          </ul>
        </div>

        <!-- Icon header -->
        @php($count = session()->has('cart')? count(session('cart')) : 0)
        <div class="wrap-icon-header flex-w flex-r-m h-full">
          <div class="flex-c-m h-full p-r-25 bor6">
            <div  class=" cart-items-number icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{$count}}">
              <i class="zmdi zmdi-shopping-cart"></i>
            </div>
          </div>

          <div class="flex-c-m h-full p-lr-19">
            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
              <i class="zmdi zmdi-menu"></i>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <!-- Header Mobile -->
  <div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
      <a href="{{route('welcome')}}"><img src="{{asset('images/icons/logo.jpg')}}" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
      <div class="flex-c-m h-full p-r-5">
        <div class="cart-items-number icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{$count}}">
          <i class="zmdi zmdi-shopping-cart"></i>
        </div>
      </div>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </div>
  </div>


  <!-- Menu Mobile -->
  <div class="menu-mobile">
    <ul class="main-menu-m">
      <li>
        <a href="{{route('welcome')}}"> Accueil </a>
      </li>
      <li>
        <a href="#">T-shirt</a>
      </li>
      <li>
        <a href="#">Hoodie</a>
      </li>
      <li class="label1" data-label1="hot">
        <a href="#">Sac</a>
      </li>

      <li>
        <a href="#">Casquette</a>
      </li>

    </ul>
  </div>

</header>
