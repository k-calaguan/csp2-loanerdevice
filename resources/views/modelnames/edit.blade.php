@extends('layouts.app')

@section('title', 'Edit Models')

@section('content')

	<div class="container">
		<div class="card">
			<div class="card-body">
				<form class="form-horizontal" method="POST" action="/modelnames/{{ $modelname->id }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">

						{{-- Right side --}}
						<div class="col-sm-12 col-lg-8">
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

							<div class="form-group">
								<label class="control-label col-sm-6" for="specs">Specifications:</label>
								<div class="col-sm-12">
									<textarea class="form-control" type="text" name="specs" id="specs" style="height: 100px">{{$modelname->specs}}</textarea> 
								</div>
							</div>
						</div>

						{{-- left side --}}
						<div class="col-sm-12 col-lg-4">
							<div class="form-group">
								<div class="col-sm-12 mb-3">
									<label class="control-label col-sm-12" for="curr-img">Current image:</label>
									<div class="col-sm-12 text-center">
										<img src="{{$modelname->image}}" class="img-thumbnail" id="curr-img" style="height:250px">
									</div>
								</div>
								<div class="col-sm-12">
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="newImage" name="image">
											<label class="custom-file-label" for="newImage">Upload new image</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
							<button class="btn btn-primary" type="submit">Save changes</button>
						</div>
					</div>			
				</form>
			</div>
		</div>
	</div>

@endsection