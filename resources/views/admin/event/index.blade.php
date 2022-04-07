@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection

@section('css')
  <link href="{{ asset('public/admin/product/index/index.css') }}" rel="stylesheet">
@endsection

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Event', 'key' => ''])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('event.create') }}" class="btn btn-success float-right m-2 mb-2" role="button" aria-pressed="true">Thêm Event</a>
          </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên event</th>
              <th scope="col">Giá</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @php
              $t = 0;
          @endphp

            @foreach($events as $event)
            <tr>
              @php
                $t += 1;
              @endphp

              <th scope="row">{{ $t }}</th>
              <td>{{ $event->event_name }}</td>
              <td>{{ number_format($event->price) }}</td>
              <td>
              <img class="width-height" src="{{ url($event->core_image) }}" alt="">

              </td>
              <td>
                <a href="" class="btn btn-secondary">Sửa</a>
                <a href="" data-url="" class="btn btn-danger action_delete">Xóa</a>
                
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

        <div class="div-md-12">
          {{ $events->links() }}
        </div>

        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>


@endsection


@section('js')
  <!-- import thư viện JS Sweetalert2 -->
  <script src="{{ asset('public\vendors\sweetalert2\sweetalert2@11.js') }}"></script>
  <!-- import thư viện JS -->
  <script src="{{ asset('public\admin\index.js') }}"></script>
@endsection