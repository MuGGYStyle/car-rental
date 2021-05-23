<!doctype html>
<html lang="en">

  <head>
    <title>Автомашин Түрээс|Түрээслэх Машин</title>
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

    <!-- undsen css-->
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
                <a href="/">Машин Түрээслэх</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="/" class="nav-link">Нүүр</a></li>
                  <li class="active"><a href="/cars" class="nav-link">Түрээслэх Машин</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('assets/front-end/images/travel2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Түрээслэх машин</h1>
              <p>Та машин аа сонирхоорой</p>
            </div>
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
                    <input type="text" id="cf-3" autocomplete="off" placeholder="Өдрөө Сонго" name="start_date" value="{{ $start_date ?$start_date :null }}" class="form-control datepicker px-3">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Буцаах Өдөр</label>
                    <input type="text" id="cf-4" autocomplete="off" placeholder="Өдрөө Сонго" name="end_date" value="{{ $end_date ?$end_date :null }}" class="form-control datepicker px-3">
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

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          @foreach($car_groups as $car)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="item-1">
                  <a href="#"><img src="{{$car->photo_url}}" alt="Image" class="img-fluid"></a>
                  <div class="item-1-contents">
                    <div class="text-center">
                    <h3><a href="#">{{ $car->name }}</a></h3>
                    <!-- <div class="rent-price"><span>1 Өдөр/</span>{{ $car->price_per_day }}₮</div> -->
                    </div>
                    <ul class="specs">
                      <li>
                        <span>1 өдөр</span>
                        <span class="spec">{{ number_format($car->price_per_day) }}₮</span>
                      </li>
                      <li>
                        <span>Нийт</span>
                        <span class="spec">{{ number_format($car->price_per_day * $total_day) }}₮</span>
                      </li>
                    </ul>
                    <div class="d-flex action">
                      <a href="/contact/{{$car->id}}?start_date={{$start_date}}&end_date={{$end_date}}" class="btn btn-primary">Түрээслэх</a>
                    </div>
                  </div>
                </div>
            </div>
          @endforeach
        </div>
        </div>
      </div>
    

    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2> Анхааруулага </h2>
          <p>түрээслэсэн машин аа гэмтээх юмуу ямар нэг хохирол үзүүлсэн тохиолдолд хуулийн дагуу хариуцлага үүрхийг анхаарна уу !</p>
        </div>
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
      $(document).ready(function () {
        var cars = {!! json_encode($total_day) !!}
        console.log(cars);
      });
    </script>

  </body>

</html>
