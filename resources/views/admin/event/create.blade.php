@extends('layouts.admin')


@section('title')
  <title>Trang chủ</title>
@endsection

@section('css')

@endsection

@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('partials.header-content', ['name' => 'Event', 'key' => 'tạo mới'])
    <!-- /.content-header -->

    <!-- Main content -->
  <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
              @csrf
                <div class="form-group">
                    <label>Tên Event</label>
                    <input type="text" value="{{ old('event_name') }}"class="form-control" name="event_name" placeholder="Nhập tên sự kiện">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="number" value="{{ old('price') }}" class="form-control" name="price" placeholder="Nhập giá">
                    @error('price')
                        <div div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="form-group">
                    <label>ngày bắt đầu</label>
                    <input type="date" value=""class="form-control" name="event_start">
                    
                </div>
                <div class="form-group">
                    <label>ngày kết thúc</label>
                    <input type="date" value=""class="form-control" name="event_end">
                    
                </div> -->

                <div class="form-group">
                    <label>Đơn vị tổ chức</label>
                    <input type="text" value="{{ old('business_name') }}"class="form-control" name="business_name" placeholder="Nhập tên đơn vị">
                    
                </div>
                
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" class="form-control-file" name="core_image">
                </div>
                
          </div>
              <div class="col-md-12">
                    <div class="form-group">
                      <label>Nhập nội dung</label>
                      <textarea name="content" class="form-control my-editor" rows="20"></textarea>
                      @error('content')
                          <div div class="form-text text-danger">{{ $message }}</div>
                      @enderror
                    </div>
              </div>
              <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
        </div>
      </div>
    </div>
  </form>

    <!-- /.main-content -->
  </div>

  

@endsection

@section('js')

<!-- import thư viện JS TinyMCE5 -->
  <script src="https://cdn.tiny.cloud/1/cozw0cxc0b1gtnzf76rpq7ndkc4qj1qcs3cybmmhaor3f8x8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- JS -->
  <!-- <script src="{{ asset('public\admin\event\create\create.js') }}"></script> -->

<script>

var editor_config = {
    path_absolute : "http://localhost/little/",
    selector: 'textarea.my-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);

</script>

@endsection

