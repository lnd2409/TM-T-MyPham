@extends('admin.template.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
            <h1>Hình ảnh sản phẩm</h1>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item"><a href="#">Chi tiết sản phẩm</a></li>
                <li class="breadcrumb-item active">Hình ảnh</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('themhinhanh2222') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <h2>Upload image multiple in Laravel 5.8</h2>
                
                <div class="form-group">
                    <label for="sp">ID sản phẩm</label>
                    <input type="text" value="{{ $sanpham->sp_id }}" name="sp_id" readonly/>
                    <div class="show-progress">
                          
                    </div>
                </div>
                <div class="form-group">
                    <label for="image 1">Hình ảnh</label>
                    <input type="file"  class="selectImage" name="ha_ten" id="images"/>
                    <div class="show-progress">
                          
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="uploadImage">Upload</button>
                </div> 
            </form>
        </div>
    </div>
    {{-- //Image show ở đây --}}
    <div class="row justify-content-center" id="showImage">
        
    </div>

  </div>
@endsection