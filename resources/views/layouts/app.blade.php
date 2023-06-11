<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Senjanis" />
    <meta name="keywords" content="senjanis" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Senjanis</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
      rel="stylesheet"
    />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
</head>
<body>
    <div id="app">
            <!-- Header Section Begin -->
        <header class="header">
            <div class="header__top">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                      <ul>
                        <li><i class="fa fa-envelope"></i> senjanis@gmail.com</li>
                       
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      @guest
                        <div class="header__top__right">
                          <div
                            class="header__top__right__language header__top__right__auth"
                          >
                            <a class="d-inline" href="{{ route('login') }}"
                              ><i class="fa fa-user"></i> Login</a
                            >
                          </div>
                          <div class="header__top__right__auth">
                            <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                          </div>
                      </div>
                      @else 
                      <div class="header__top__right">
                      <div
                        class="header__top__right__language header__top__right__auth"
                      >
                        <a class="d-inline" href="#"
                          ><i class="fa fa-user"></i> {{ auth()->user()->username }}</a
                        >
                        <span class="arrow_carrot-down"></span>
                        <ul>
                          <li><a href="#">Profile</a></li>
                        </ul>
                      </div>
                      <div class="header__top__right__auth">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i class="fa fa-user"></i> Logout</a>
                        <form action="{{ route('logout') }}" id="logout-form" method="post">
                          @csrf                   
                        </form>
                      </div>
                    </div>
                      @endguest
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <div class="header__logo">
                    <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
                  </div>
                </div>
                <div class="col-lg-6">
                  <nav class="header__menu">
                    <ul>
                      <li class="active"><a href="/">Halaman Utama</a></li>
                      <li><a href="{{ route('shop.index') }}">Produk</a></li>
                      <li>
                        <a href="#">Kategori</a>
                        <ul class="header__menu__dropdown">
                          @foreach($menu_categories as $menu_category)
                            <li><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></li>
                          @endforeach
                        </ul>
                      </li>
                     
                    </ul>
                  </nav>
                </div>
                {{-- <div class="col-lg-3">
                  <div class="header__cart">
                    <ul>
                      <li>
                        <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                      </li>
                      <li>
                        <a href="{{ route('cart.index') }}"
                          ><i class="fa fa-shopping-bag"></i> <span>{{ $cartCount }}</span></a
                        >
                      </li>
                    </ul>
                    <div class="header__cart__price">item: <span>Rp.{{ $cartTotal }}</span></div>
                  </div>
                </div>
              </div>
              <div class="humberger__open">
                <i class="fa fa-bars"></i>
              </div>
            </div> --}}
          </header>

        {{-- <main class="py-4"> --}}
            @yield('content')
        {{-- </main> --}}
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer__about">
                <div class="footer__about__logo">
                  <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
                </div>
                <ul>
                  <li><a href="#">Alamat: Sindang Kerta</a></li>
                  <li><a href="#">No Telp: 083845167289</a></li>
                  <li><a href="#">Email: senjanis@gmail.com</a></li>                
                </ul>
              </div>
             
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
              <div class="footer__widget">
                <h6>Tentang kami</h6>
                <p>Sistem Pemesanan Online Senjanis adalah situs web <br />yang bisa digunakan untuk melakukan pemesanan <br />makanan berupa brownies, kue kering dan molen yang <br />
                diproduksi oleh Senjanis. Situs web ini <br />dibuat agar memudahkan orang yang ingin memesan <br />makanan secara daring tidak melalui aplikasi<p>
                
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="footer__widget">
                <h6>Bergabunglah Dengan Kami Sekarang</h6>
                <p>
                Dapatkan pembaruan email tentang toko terbaru dan penawaran khusus kami.
                </p>
                <form action="#">
                  <input type="text" placeholder="Masukan email anda" />
                  <button type="submit" class="site-btn">Berlangganan</button>
                </form>
                <div class="footer__widget__social">
                  <a href="https://www.instagram.com/senjanis.imy/"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.instagram.com/senjanis.imy/"><i class="fa fa-instagram"></i></a>
                  <a href="https://www.instagram.com/senjanis.imy/"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.instagram.com/senjanis.imy/"><i class="fa fa-pinterest"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="footer__copyright">
                <div class="footer__copyright__text">
                  <p>
                    <!-- Senjanis -->
                    Copyright &copy;
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                     | 
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <a href="https://www.instagram.com/senjanis.imy/" target="_blank">Senjanis</a>
                    <!-- Senjanis -->
                  </p>
                </div>
                <div class="footer__copyright__payment">
                  <img src="img/payment-item.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
  
      <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
      <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
      <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('frontend/js/main.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>

    </div>
</body>
</html>
