<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Senjanis" />
    <meta name="keywords" content="Senjanis" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('app.ClientKey') }}"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Senjanis</title>

    <!-- Google Font -->
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

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>

    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="header__logo">
              <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

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

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('TRANSACTION_TOKEN_HERE', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>