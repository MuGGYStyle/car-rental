@extends('admin.layouts.app')

@section('title', 'User page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
      </div>
    </div>
  </div>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script  type="text/javascript">
    $(document).ready(function () {
      
    });
    function deleteUser(id) {
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
              url: '/admin/user/' + id,
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

    function editUser(id) {
      let url = "{{ route('admin.user.edit', ':id') }}";
      url = url.replace(':id', id);
      document.location.href=url;
    }
  </script>
@endsection

@push('custom_script')
<!-- CSS -->
<link href="{{ asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
@endpush