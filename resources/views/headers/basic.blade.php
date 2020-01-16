<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
      <!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						BeOne The Vision site de ventes officiel
					</div>
				</div>
			</div>


			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

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
                <a href="{{route('show_by_type',['code'=>'TSH'])}}">T-shirt</a>
              </li>
              <li>
                <a href="{{route('show_by_type',['code'=>'HOO'])}}">Hoodie</a>
              </li>
							<li>
                <a href="{{route('show_by_type',['code'=>'PUL'])}}">Pull</a>
              </li>
							<li class="label1" data-label1="hot">
                <a href="{{route('show_by_type',['code'=>'COU'])}}">Coupe-vent</a>
              </li>
              <li>
                <a href="{{route('show_by_type',['code'=>'SAC'])}}">Sac</a>
              </li>

              <li>
                <a href="{{route('show_by_type',['code'=>'CAS'])}}">Casquette</a>
              </li>

            </ul>
          </div>

					@if(Route::current()->getName() !== 'payment_page')
						<!-- Icon header -->
						@php($count = session()->has('cart')? count(session('cart')) : 0)
						<div class="wrap-icon-header flex-w flex-r-m">
							<div class="cart-items-number icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$count}}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
					@endif
				</nav>
			</div>
		</div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->
      <div class="logo-mobile">
        <a href="{{route('welcome')}}"><img src="{{asset('images/icons/logo.jpg')}}" alt="IMG-LOGO"></a>
      </div>

			@if(Route::current()->getName() !== 'payment_page')
	      <!-- Icon header -->
	      <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
	        <div class="flex-c-m h-full p-r-5">

	          <div class="cart-items-number icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{$count}}">
	            <i class="zmdi zmdi-shopping-cart"></i>
	          </div>
	        </div>
	      </div>
			@endif
      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						BeOne The Vision site de ventes officiel
					</div>
				</li>

      <ul class="main-menu-m">
				<li>
					<a href="{{route('welcome')}}"> Accueil </a>
				</li>
        <li>
          <a href="{{route('show_by_type',['code'=>'TSH'])}}">T-shirt</a>
        </li>
        <li>
          <a href="{{route('show_by_type',['code'=>'HOO'])}}">Hoodie</a>
        </li>
				<li>
					<a href="{{route('show_by_type',['code'=>'PUL'])}}">Pull</a>
				</li>
				<li class="label1" data-label1="hot" >
					<a href="{{route('show_by_type',['code'=>'COU'])}}" >Coupe-vent</a>
				</li>
				<li>
					<a href="{{route('show_by_type',['code'=>'SAC'])}}">Sac</a>
				</li>

        <li>
          <a href="{{route('show_by_type',['code'=>'CAS'])}}">Casquette</a>
        </li>

      </ul>
    </div>
	</header>
