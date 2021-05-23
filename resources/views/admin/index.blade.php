@extends('admin.layouts.app')

@section('title', 'Main page')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                </div>
                <h5>Шинэ захиалга</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $new_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                </div>
                <h5>Төлбөр баталгаажсан</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $verified_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                </div>
                <h5>Хүлээлгэн өгсөн</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $handed_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                </div>
                <h5>Хүлээн авсан</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $received_count }}</h1>
            </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-title">
          <h5>Simple FooTable with pagination, sorting and filter</h5>

          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li>
                <a href="#" class="dropdown-item">Config option 1</a>
              </li>
              <li>
                <a href="#" class="dropdown-item">Config option 2</a>
              </li>
            </ul>
            <a class="close-link">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <table
            class="footable table table-stripped toggle-arrow-tiny"
            data-page-size="8"
            data-filter="#filter"
          >
            <thead>
              <tr>
                <th data-toggle="true">Хэрэглэгч</th>
                <th data-toggle="true">Машин Бүлэг</th>
                <th data-toggle="true">Улсын дугаар</th>
                <th>Эхлэх хугацаа</th>
                <th>Дуусах хугацаа</th>
                <th>Төлөв</th>
                <th data-hide="all">Овог</th>
                <th data-hide="all">Нэр</th>
                <th data-hide="all">Имайл</th>
                <th data-hide="all">Тайлбар</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td>{{ $order->c_fname }}</td>
                <td>{{ $order->car->carGroup->name }}</td>
                <td>{{ $order->car->uls_dugaar }}</td>
                <td>{{ $order->start_date }}</td>
                <td>{{ $order->end_date }}</td>
                <td>
                  @if($order->status == 'new')
                    Шинэ захиалга
                  @elseif($order->status == 'verified')
                    Төлбөр баталгаажсан
                  @elseif($order->status == 'handed')
                    Хүлээлгэн өгсөн
                  @elseif($order->status == 'received')
                    Хүлээн авсан
                  @endif
                </td>
                <td>{{ $order->c_lname }}</td>
                <td>{{ $order->c_fname }}</td>
                <td>{{ $order->c_email }}</td>
                <td>{{ $order->c_message }}</td>
                <td>
                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Төлөв</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('admin.change.status', ['id'=>$order->id, 'status'=>'new']) }}">Шинэ захиалга</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.change.status', ['id'=>$order->id, 'status'=>'verified']) }}">Төлбөр баталгаажсан</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.change.status', ['id'=>$order->id, 'status'=>'handed']) }}">Хүлээлгэн өгсөн</a></li>
                      <li><a class="dropdown-item" href="{{ route('admin.change.status', ['id'=>$order->id, 'status'=>'received']) }}">Хүлээн авсан</a></li>
                    </ul>
                    <button class="btn btn-danger btn-xs deleteRecord" data-id="{{$order->id}}">Устгах</button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <ul class="pagination float-right"></ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('custom_script')
<!-- FooTable -->
<link href="{{ asset('assets/css/plugins/footable/footable.core.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
<!-- FooTable -->
<script src="{{ asset('assets/js/plugins/footable/footable.all.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $(".deleteRecord").click(function() {
      var result = confirm("Устгахад итгэлтэй байна?");
      if (result) {
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
          url: "/admin/order/"+id,
          type: 'DELETE',
          data: {
            'id': id,
            '_token': token
          },
          success: function() {
            location.reload();
          }
        });   
      }
    });
    $(".footable").footable();
  });
</script>
@endpush