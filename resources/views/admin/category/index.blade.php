@extends('admin.layouts.app')

@section('title', 'Item page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox ">
          <div class="ibox-title">
            <h5>Category Table</h5>
            <div class="ibox-tools">
              <a class="btn btn-primary dim" href="{{ route('admin.category.create')}}" style="cursor: pointer;"><i class="fa fa-plus"></i></a>
            </div>
          </div>
          <div class="ibox-content">

            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="post_table_body">
                @foreach($categories as $category)
                <tr id="row_id_{{$category->id}}">
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->created_at}}</td>
                  <td>{{$category->updated_at}}</td>
                  <td>
                    <button class="btn btn-info btn-circle" type="button" onclick="editItem({{$category->id}})" title="Edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-circle" type="button" onclick="deleteItem({{$category->id}})" title="Remove"><i class="fa fa-ban"></i></button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script  type="text/javascript">
    $(document).ready(function () {
      
    });
    function deleteItem(id) {
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
              url: '/admin/category/' + id,
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

    function editItem(id) {
      let url = "{{ route('admin.category.edit', ':id') }}";
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