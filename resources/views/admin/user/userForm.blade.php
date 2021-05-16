@extends('admin.layouts.app')

@section('title', 'User page')

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
              action="{{ $mode=='edit' ?route('admin.user.update', ['user' => $user->id]) :route('admin.user.store') }}"
              enctype="multipart/form-data">
              @if($mode == 'edit')
              {{ method_field('PATCH') }}
              @elseif($mode == 'create')
              {{ method_field('POST') }}
              @endif
              {{ csrf_field() }}
              
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="name" value="{{$mode=='edit' ?$user->name :null}}"></div>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10"><input type="email" class="form-control" name="email" value="{{$mode=='edit' ?$user->email :null}}" required></div>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              @if($mode=='create')
              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" name="password" required></div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="hr-line-dashed"></div>
              <div class="form-group  row"><label class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" name="password_confirmation" required></div>
              </div>
              @endif

              <div class="hr-line-dashed"></div>
              <div class="form-group row"><label class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                  <select class="form-control" name="role_id">
                    @foreach($roles  as $role)
                      @if($mode=='edit')
                        <option value="{{$role->id}}" {{$role->id === $user->role_id ?'selected' :''}}>{{$role->name_desc}}</option>
                      @else
                        <option value="{{$role->id}}">{{$role->name_desc}}</option>
                      @endif
                    @endforeach
                  </select>
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

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script  type="text/javascript">
    $(document).ready(function () {
    });

    function backRedirect() {
      let url = "{{ URL::previous() }}";
      document.location.href=url;
    }
  </script>
@endsection

@push('custom_script')
@endpush
