@extends('auth.layout.default')
@section('css')
	<link rel="stylesheet" href="{{asset('auth/vendor/bootstrap4/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/themify-icons/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/animate.css/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/jscrollpane/jquery.jscrollpane.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/waves/waves.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/vendor/switchery/dist/switchery.min.css')}}">
@endsection()
@section('content')
	<div class="content-area py-1">
		<div class="container-fluid">

			<h4>Sửa danh mục</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{URL::route('listCategories')}}">Danh mục</a></li>
				<li class="breadcrumb-item active">Sửa danh mục</li>
			</ol>
			<div class="box box-block bg-white">
	            @if( count($errors) > 0)
		    	<div class="alert alert-danger">
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    	@endif
				
					<form action="{{ URL::route('postEditCategorie')}}" method="POST">
						<form action="" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token()}}">
						<div class="row">
							<div class="col-md-9">
								<div class="row">

									<div class="col-md-3">
										<a href="http://bkshop.vn/" target="_blank"><button class="btn btn-primary" style="width: 100%;">http://bkshop.vn/</button></a>
									</div>
									<div class="col-md-9">
										<div class="form-group">	
											<input type="text" class="form-control" name="url" placeholder="Nhập Url" value="cuong.vn">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Tên danh mục</label>
									<input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="tên danh mục">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Tiêu đề</label>
									<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề danh mục" value="title">
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Keywords</label>
									<input type="text" class="form-control" name="seo_keyword" placeholder="Keywords Seo" value="seo_keyword">

								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Description</label>
									<input type="text" class="form-control" name="seo_description" placeholder="Description Seo" value="seo_description">
								</div>
								<div class="form-group">
									<label for="exampleTextarea">Nội dung</label>
									<textarea class="form-control" name="content" rows="10" >content</textarea>
									<script type="text/javascript">
								      var editor = CKEDITOR.replace('content',{
								       language:'vi',
								       filebrowserImageBrowseUrl : '../../../auth/ckfinder/ckfinder.html?type=Images',
								       filebrowserFlashBrowseUrl : '../../../auth/ckfinder/ckfinder.html?type=Flash',
								       filebrowserImageUploadUrl : '../../../auth/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
								       filebrowserFlashUploadUrl : '../../../auth/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
								       });
								     </script>﻿
								</div>
								
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<select class="form-control" name="parent_id">
										
					                    <option value="0">Thư mục gốc</option>
					                    
										<option value="id">danh mục</option>
										
									</select>
								</div>
								<fieldset class="form-group">
									@if(0)
										<label>
											<input type="radio" name="type" value="0" checked>
											Tin Tức
										</label>
										<label>
											<input type="radio" name="type" value="1">
											List Sản phẩm
										</label>
										<label>
										<input type="radio" name="type" value="2">
											List tin tức
										</label>
									@elseif(2)
										<label>
											<input type="radio" name="type" id="optionsRadios1" value="0">
											Tin Tức
										</label>
										<label>
											<input type="radio" name="type" id="optionsRadios2" value="1">
											List Sản phẩm
										</label>
										<label>
										<input type="radio" name="type" value="2" checked>
											List tin tức
										</label>

									@else
										<label>
											<input type="radio" name="type" id="optionsRadios1" value="0">
											Tin Tức
										</label>
										<label>
											<input type="radio" name="type" id="optionsRadios2" value="1" checked>
											List Sản phẩm
										</label>
										<label>
											<input type="radio" name="type" value="2">
											List tin tức
										</label>
									
									@endif
								</fieldset>
								<div class="checkbox">
									@if(0)
										<label>
											<input type="radio"  name="display" value="1" >Hiển thị
										</label>
										<label>
											<input type="radio"  name="display" value="0" checked>Tắt hiển thị
										</label>
									@else 
										<label>
											<input type="radio"  name="display" value="1" checked >Hiển thị
										</label>
										<label>
											<input type="radio"  name="display" value="0" >Tắt hiển thị
										</label>
									@endif
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				
			</div>
			
		</div>
	</div>
@endsection()
@section('js')
	<!-- Vendor JS -->
		<script type="text/javascript" src="{{asset('auth/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jscrollpane/mwheelIntent.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/waves/waves.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/vendor/switchery/dist/switchery.min.js')}}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{asset('auth/js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('auth/js/demo.js')}}"></script>
@endsection