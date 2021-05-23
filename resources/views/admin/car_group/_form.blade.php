@extends('admin.layouts.app')

@section('title', 'Car page')

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
              action="{{ $mode=='edit' ?route('admin.car_group.update', ['car_group' => $car_group->id]) :route('admin.car_group.store') }}"
              enctype="multipart/form-data">
              @if($mode == 'edit')
              {{ method_field('PATCH') }}
              @elseif($mode == 'create')
              {{ method_field('POST') }}
              @endif
              {{ csrf_field() }}
              
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Нэр</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{$mode=='edit' ?$car_group->name :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Үнэ</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="price_per_day" value="{{$mode=='edit' ?$car_group->price_per_day :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group row"><label class="col-sm-2 col-form-label">Ангилал</label>
                <div class="col-sm-10">
                  <select class="form-control" name="category_id">
                    @foreach($categories  as $category)
                      @if($mode=='edit')
                        <option value="{{$category->id}}" {{$category->id === $car_group->category_id ?'selected' :''}}>{{$category->name}}</option>
                      @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                  <div class="custom-file">
                    <input id="logo" type="file" class="custom-file-input" name="image">
                    <label for="logo" class="custom-file-label">Choose file...</label>
                  </div>
                </div>
              </div>

              <div class="hr-line-dashed"></div>

              <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                  <button class="btn btn-white btn-sm" type="button" onclick="backRedirect()">Буцах</button>
                  <button class="btn btn-primary btn-sm" type="submit">Хадгалах</button>
                  <button class="btn btn-danger btn-sm deleteRecord" data-id="{{$car_group->id}}" type="button">Устгах</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('custom_script')
<!-- CSS -->
<link href="{{ asset('assets/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script  type="text/javascript">
  $(document).ready(function () {
    $(".deleteRecord").click(function() {
      var result = confirm("Устгахад итгэлтэй байна?");
      if (result) {
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
          url: "/admin/car_group/"+id,
          type: 'DELETE',
          data: {
            'id': id,
            '_token': token
          },
          success: function() {
            backRedirect();
          }
        });   
      }
    });
  });

  function backRedirect() {
    let url = "{{ URL::previous() }}";
    document.location.href=url;
  }
</script>
@endpush
