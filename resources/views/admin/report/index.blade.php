@extends('admin.layouts.app')

@section('title', 'Main page')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-title"></div>
        <div class="ibox-content">
          <form method="GET" action="{{ route('admin.report.index') }}">
            {{ csrf_field() }}
            <div class="form-group" id="data_5">
              <label class="font-normal">Огноо Сонгох</label>
              <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control-sm form-control" name="start_date" value="{{ $start_date}}" autocomplete="off"/>
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control-sm form-control" name="end_date" value="{{ $end_date}}" autocomplete="off"/>
              </div>
              <div class="hr-line-dashed"></div>
              <button type="submit" class="btn btn-primary btn-rounded btn-block"><i class="fa fa-search"></i> Хайх</button>
            </div>
          </form>
        </div>
      </div>
    </div>

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
                <th data-toggle="true">Захиалга хийсэн огноо</th>
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
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
              <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
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
<link href="{{ asset('assets/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
@endpush
@push('scripts')
<!-- FooTable -->
<script src="{{ asset('assets/js/plugins/footable/footable.all.min.js') }}"></script>
<!-- Data picker -->
<script src="{{ asset('assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<!-- Date range picker -->
<script src="{{ asset('assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
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
    $('#data_5 .input-daterange').datepicker({
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true
    });
  });
</script>
@endpush