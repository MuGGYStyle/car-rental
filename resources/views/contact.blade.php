<!doctype html>
<html lang="en">

  <head>
    <title>Автомашин|Холбоо Барих</title>
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

    <!-- undsen c CSS -->
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
                  <li><a href="/" class="nav-link">Нүүр</a></li>
                  <li><a href="/cars" class="nav-link">Түрээслэх Машин</a></li>
              </nav>
            

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('http://localhost:8000/assets/front-end/images/travel.jpg')">
      
      
        
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-5">
                <div class="feature-car-rent-box-1">
                  <h3>{{ $car->name }} | {{ $car->uls_dugaar }}</h3>
                  <ul class="list-unstyled">
                    <li>
                      <span>Түлш зарцуулалт</span>
                      <span class="spec">100км/{{ $car->fuel }}л</span>
                    </li>
                    <li>
                      <span>Суудлын тоо</span>
                      <span class="spec">{{ $car->seat }}</span>
                    </li>
                    
                    <li>
                      <span>Араа</span>
                      <span class="spec">{{ $car->transmission }}</span>
                    </li>
                    <li>
                      <span>Үйлдвэрлэсэн он</span>
                      <span class="spec">{{ $car->uild_on }}</span>
                    </li>
                  </ul>
                  <div class="d-flex align-items-center bg-light p-3">
                    <span>1 Өдөр / {{ number_format($car_group->price_per_day) }}₮</span>
                  </div>
                  <div class="d-flex align-items-center bg-light p-3">
                    <span>{{ $total_day }} Өдөр / {{ number_format($car_group->price_per_day * $total_day) }}₮</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
            </div>
          </div>
        </div>
      </div>
    </div>

    <form action="{{ route('order', ['id' => $car->id]) }}" method="post">
      {{ csrf_field() }}
      <div class="site-section pt-0 pb-0 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-12">
              
                <div class="trip-form">
                  <div class="row align-items-center mb-4">
                    <div class="col-md-6">
                      <h3 class="m-0">Аялалын Мэдээлэл</h3>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="cf-3">Аялах Өдөр</label>
                      <input type="text" id="cf-3" placeholder="Өдрөө Сонго" readonly name="start_date" value="{{ $start_date ?$start_date :null }}" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="cf-4">Буцаах Өдөр</label>
                      <input type="text" id="cf-4" placeholder="Өдрөө Сонго" readonly name="end_date" value="{{ $end_date ?$end_date :null }}" class="form-control">
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light" id="contact-section">
        <div class="container">
          <div class="row justify-content-center text-center">
          <div class="col-7 text-center mb-5">
            <h2>Холбоо барих мэдэлээл авах </h2>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-8 mb-5" >
              <div>
                <div class="form-group row">
                  <div class="col-md-6 mb-4 mb-lg-0">
                    <input type="text" class="form-control" placeholder="Овог" name="lname">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Нэр" name="fname">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Цахим шуудан" name="email">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <textarea name="message" class="form-control" placeholder="Захиагаа бичнэ үү ?" cols="30" rows="10"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 mr-auto">
                    <input 
                      type="button" 
                      class="btn btn-block btn-primary text-white py-3 px-5" 
                      data-toggle="modal" data-target="#exampleModal" value="Илгээх">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 ml-auto">
              <div class="bg-white p-3 p-md-5">
                <h3 class="text-black mb-4">Мэдээлэл</h3>
                <ul class="list-unstyled footer-link">
                  <li class="d-block mb-3">
                    <span class="d-block text-black">Хаяг:</span>
                    <span>Дархан-уул аймаг Дархан хот</span></li>
                  <li class="d-block mb-3"><span class="d-block text-black">Утас:</span><span>+976 89922233</span></li>
                  <li class="d-block mb-3"><span class="d-block text-black">Та төлбөр тооцоогоо хийх үед захиалага баталгаажина</span>
                  <li class="d-block mb-3"><span class="d-block text-black">Данс:</span>Хаан банк: 5068258627 Насанбат<span</li>
                  <li class="d-block mb-3"><span class="d-block text-black">E-Шуудан:</span><span>Jeusnas2010@gmail.com</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">АВТОМАШИН ТҮРЭЭСЛЭХ  ГЭРЭЭ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Энэ дотор хүссэнээ хийнэ  -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
              <button type="submit" class="btn btn-primary">Зөвшөөрөх</button>
            </div>
          </div>
        </div>
      </div>
    </form>

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

  </body>

</html>
