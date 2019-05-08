@extends('layouts.app')

@section('title', 'Edit Models')

@section('content')

	<div class="container">
		<form class="form-horizontal" method="POST" action="/modelnames/{{ $modelname->id }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label class="control-label col-sm-12" for="name">Name:</label>
				<div class="col-sm-12">
					<input class="form-control" type="text" name="name" id="name" value="{{ $modelname->name }}">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-12" for="category_id">Category:</label>
				<div class="col-sm-12">
					<select class="form-control" name="category_id" id="category_id">
						<option>-- Select Category --</option>
						@foreach($categories as $category)
							@if($category->id == $modelname->category_id)
								<option value="{{$category->id}}" selected>{{$category->name}}</option>
							@else
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-sm-6">
					<label class="control-label col-sm-12" for="curr-img">Current image:</label>
					<div class="col-sm-12">
						<img src="{{$modelname->image}}" class="img-thumbnail" id="curr-img" style="height:250px">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="control-label col-sm-12" for="image">Upload new image:</label>
					<div class="col-sm-12">
						<input class="form-control-file" type="file" name="image" id="image">
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="specs">Specifications:</label>
				<div class="col-sm-12">
					<textarea class="form-control" type="text" name="specs" id="specs" style="height: 50px">{{$modelname->specs}}</textarea> 
				</div>
			</div>

			<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
				<button class="btn btn-primary" type="submit">Save changes</button>
			</div>
		</form>
	</div>

@endsection