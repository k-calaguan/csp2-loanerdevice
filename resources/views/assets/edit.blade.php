@extends('layouts.app')

@section('title', 'Edit devices')

@section('content')

	<div class="container">
		<form class="form-horizontal" method="POST" action="/assets/{{ $asset->id }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label class="control-label col-sm-12" for="name">Name:</label>
				<div class="col-sm-12">
					<input class="form-control" type="text" name="name" id="name" value="{{ $asset->name }}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-12" for="sn">Serial Number:</label>
				<div class="col-sm-12">
					<input class="form-control" type="text" name="sn" id="sn" value="{{ $asset->sn }}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-12" for="category">Category:</label>
				<div class="col-sm-12">
					<select class="form-control" name="category" id="category">
						<option>-- Select Category --</option>
						@foreach($categories as $category)
							@if($category->id == $asset->category_id)
								<option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
							@endif
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-12" for="stock">Stock:</label>
				<div class="col-sm-12">
					<input class="form-control" type="text" name="stock" id="stock" min="1" value="{{ $asset->stock }}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-12" for="specs">Specifications:</label>
				<div class="col-sm-12">
					<input class="form-control" type="text" name="specs" id="specs" value="{{ $asset->specs }}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-12" for="image">Image:</label>
				<div class="col-sm-12">
					<input class="form-control-file" type="file" name="image" id="image">
				</div>
			</div>
			<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
				<button class="btn btn-primary btn-block col-sm-12 col-md-6 col-lg-4" type="submit">Save changes</button>
			</div>
		</form>
	</div>

@endsection