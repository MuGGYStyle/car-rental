@extends('admin.layouts.app')

@section('title', 'Item page')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox ">
          <div class="ibox-title">
              <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#" class="dropdown-item">Config option 1</a>
                      </li>
                      <li><a href="#" class="dropdown-item">Config option 2</a>
                      </li>
                  </ul>
                  <a class="close-link">
                      <i class="fa fa-times"></i>
                  </a>
              </div>
          </div>
          <div class="ibox-content">
            <form 
              method="POST" 
              action="{{ $mode=='edit' ?route('admin.category.update', ['category' => $category->id]) :route('admin.category.store') }}"
              enctype="multipart/form-data">
              @if($mode == 'edit')
              {{ method_field('PATCH') }}
              @elseif($mode == 'create')
              {{ method_field('POST') }}
              @endif
              {{ csrf_field() }}
              
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{$mode=='edit' ?$category->name :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                  <button class="btn btn-white btn-sm" type="button" onclick="backRedirect()">Cancel</button>
                  <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('assets/js/plugins/summernote/summernote-bs4.js') }}"></script>
  <script  type="text/javascript">
    $(document).ready(function () {
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
    });

    function backRedirect() {
      let url = "{{ URL::previous() }}";
      document.location.href=url;
    }
  </script>
@endsection

@push('custom_script')
<!-- CSS -->
<link href="{{ asset('assets/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush
