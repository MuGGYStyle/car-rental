@extends('admin.layouts.app')

@section('title', 'Cars page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

      <div class="col-lg-12">
        <div class="ibox">
          <div class="ibox-title">
            <h5>Cars Table</h5>
            <div class="ibox-tools">
              <a class="btn btn-primary dim" href="{{ route('admin.car_group.create')}}" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row" id="cars_row">
              @foreach($car_groups as $car_group)
              <div class="col-md-4">
                <hr>
                <div class="profile-card-4 text-center"><img src="{{$car_group->photo_url}}" class="img img-responsive"  id="{{$car_group->id}}">
                  <div class="profile-content">
                    <div class="profile-name">
                    </div>
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="profile-overview">
                          <p>Ангилал</p>
                          <h4>{{$car_group->category->name}}</h4></div>
                      </div>
                      <div class="col-xs-4">
                        <div class="profile-overview">
                          <p>Бүлэг</p>
                          <h4>{{$car_group->name}}</h4></div>
                      </div>
                      <div class="col-xs-4">
                        <div class="profile-overview">
                          <p>Үнэ</p>
                          <h4>{{$car_group->price_per_day}}</h4></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script  type="text/javascript">
    $(document).ready(function () {
      var row = document.getElementById('cars_row');
      row.addEventListener("click", function(e) {
        if (e.target.id === "" || e.target.id === null || e.target.id === undefined) {
          
        } else {
          let url = "{{ route('admin.car_group.edit', ':id') }}";
          url = url.replace(':id', e.target.id);
          document.location.href=url;
        }
        
      })
    });
    function deleteProduct(id) {
      swal(
        {
          title: "Are you sure?",
          text: "Your will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false 
        },
        function (isConfirm) 
        {
          if (isConfirm) {
            var elem = document.getElementById('row_id_'+id);
            window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token(), ]) !!};
            $.ajax({
              type: "POST",
              url: '/admin/car_group/' + id,
              data: {_method: 'delete', _token: Laravel.csrfToken},
              success: function(data) {
                swal(data.title, data.body, "success");
                elem.parentNode.removeChild(elem);
              }
            });
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        }
      );
    }

    function editProduct(id) {
      
      let url = "{{ route('admin.car_group.edit', ':id') }}";
      url = url.replace(':id', id);
      document.location.href=url;
    }
  </script>
@endsection

@push('custom_script')
<!-- CSS -->
<link href="{{ asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- Scripts -->
<script src="{{ asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
@endpush