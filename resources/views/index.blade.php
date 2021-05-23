<!doctype html>
<html lang="en">

  <head>
    <title>Автомашин Түрээс</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/front-end/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front-end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/aos.css') }}">

    <!-- undsen css -->
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/style.css') }}">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="/">Машин Түрээс</a>
              </div>
            </div>
            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="/" class="nav-link">Нүүр</a></li>
                  <li><a href="/cars" class="nav-link">Түрээслэх Машин</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('assets/front-end/images/hero_1.jpg')">
        
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pt-0 pb-0 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
            
              <form class="trip-form" method="GET" 
              action="{{ route('cars') }}">
                {{ csrf_field() }}
                <div class="row align-items-center mb-4">
                  <div class="col-md-6">
                    <h3 class="m-0">Аялалын Мэдээлэл</h3>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <!-- <span class="text-primary">Түрээслэх боломжтой Машинууд:</span> <span class="text-primary">32</span></span> -->
                  </div>
                </div>
                <div class="row">
                
                  <div class="form-group col-md-3">
                    <label for="cf-3">Аялах Өдөр</label>
                    <input type="text" id="cf-3" autocomplete="off" placeholder="Өдрөө Сонго" name="start_date" value="{{ $start_date}}" class="form-control datepicker px-3">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Буцаах Өдөр</label>
                    <input type="text" id="cf-4" autocomplete="off" placeholder="Өдрөө Сонго" name="end_date" value="{{ $end_date}}" class="form-control datepicker px-3">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary btn-primary">Хайх</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

    

    <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h3>Санал Болгох</h3>
            <p class="mb-4">Бидний Зүгээс Таньд Санал Болгох автомашин</p>
            <p>
              <a href="#" class="btn btn-primary custom-prev">Өмнөх</a>
              <span class="mx-2">/</span>
              <a href="#" class="btn btn-primary custom-next">Дараах</a>
            </p>
          </div>
          <div class="col-lg-9">

            <div class="nonloop-block-13 owl-carousel">

            </div>
            
          </div>
        </div>
      </div>
    </div> -->

    <div class="site-section section-3" style="background-image: url('assets/front-end/images/hero_2.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h2 class="text-white">Манай Үйлчилгээ</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
              <div class="service-1-contents">
                <h3>Баталгаатай байдал</h3>
                <p>Манай байгуулгын бүх машин даатгалд хамрагдсан </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
              <div class="service-1-contents">
                <h3>Заавар Гарын авлага</h3>
                <p>Танд Тухайн машины бүх гарын авлага нэмэлт мэдээлэл-ээр хангах болно</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
              <div class="service-1-contents">
                <h3>Мэдээж хуулийн дагуу</h3>
                <p>Бүх үйл ажиллагаа албан ёсны гэрээ байгуулж явагдах болно</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>Таны хүсэлт хэрхэн баталгааждаг вэ?</h2>
          <p>Таны хүсэлтийг баталгаажуулах үүднээс доорх үе дарааллын дагуу явна уу </p>
        </div>
      </div>
      <div class="how-it-works d-flex">
        <div class="step">
          <span class="number"><span>01</span></span>
          <span class="caption">Цаг Хугацаа</span>
        </div>
        <div class="step">
          <span class="number"><span>02</span></span>
          <span class="caption">Машин</span>
        </div>
        <div class="step">
          <span class="number"><span>03</span></span>
          <span class="caption">Дэлгэрэнгүй Мэдээлэл</span>
        </div>
        <div class="step">
          <span class="number"><span>04</span></span>
          <span class="caption">Төлбөр Тооцоо</span>
        </div>
        <div class="step">
          <span class="number"><span>05</span></span>
          <span class="caption">Амжилттай Баталгаажлаа</span>
        </div>

      </div>
    </div>
    
    
          
        </div>
      </div>
    </div>


    <div class="site-section bg-blue">
      <div class="container">
        


      </div>
    </div>



    </div>

    <script src="{{ asset('assets/front-end/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/aos.js') }}"></script>

    <script src="{{ asset('assets/front-end/js/main.js') }}"></script>

    <script>
        $( document ).ready(function() {
            $(".owl-nav").addClass("disabled");
        });
    </script>

  </body>

</html>
