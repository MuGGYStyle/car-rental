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
              action="{{ $mode=='edit' ?route('admin.car.update', ['car' => $car->id]) :route('admin.car.store') }}"
              enctype="multipart/form-data">
              @if($mode == 'edit')
              {{ method_field('PATCH') }}
              @elseif($mode == 'create')
              {{ method_field('POST') }}
              @endif
              {{ csrf_field() }}
              
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Нэр</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{$mode=='edit' ?$car->name :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Шатахуун</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="fuel" value="{{$mode=='edit' ?$car->fuel :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Суудал</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="seat" value="{{$mode=='edit' ?$car->seat :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Үнэ</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="price_per_day" value="{{$mode=='edit' ?$car->price_per_day :null}}"></div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group row"><label class="col-sm-2 col-form-label">Араа</label>
                <div class="col-sm-10">
                  <select class="form-control" name="car_trans_id">
                    @foreach($carTransmissions  as $transmission)
                      @if($mode=='edit')
                        <option value="{{$transmission->id}}" {{$transmission->id === $car->car_trans_id ?'selected' :''}}>{{$transmission->name}}</option>
                      @else
                        <option value="{{$transmission->id}}">{{$transmission->name}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Үйлдвэрлэгдсэн он</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="uild_on" value="{{$mode=='edit' ?$car->uild_on :null}}"></div>
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
@endsection

@push('custom_script')
<!-- CSS -->
<link href="{{ asset('assets/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script  type="text/javascript">
  $(document).ready(function () {
  });

  function backRedirect() {
    let url = "{{ URL::previous() }}";
    document.location.href=url;
  }
</script>
@endpush
