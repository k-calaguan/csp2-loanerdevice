@extends('layouts.app')

@section('title', 'Add a device')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="alert {{ session('alert-type') }} alert-dissmisible fade show" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	
	<div class="row">
		<div class="col-sm-12 col-lg-6 mb-4">
			<h1 class="text-center">New Category</h1>
			<form class="form-group" method="POST" action="/categories">
				@csrf
				<div class="form-group">
					<div class="col-sm-12">
						<input class="form-control" type="text" name="name">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
						<button class="btn btn-primary btn-block col-sm-12 col-md-6 col-lg-4" type="submit">Add</button>
					</div>
				</div>
			</form>

			<hr class="my-4">

			<h1 class="text-center ">Model Name</h1>
			<form class="form-group" method="POST" action="/modelnames" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<div class="col-sm-12">
						<input class="form-control" type="text" name="name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="category_id">Category:</label>
					<div class="col-sm-12">
						<select class="form-control" name="category_id" id="category_id">
							<option>-- Select Category --</option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="specs">Specifications:</label>
					<div class="col-sm-12">
						<textarea class="form-control" type="text" name="specs" id="specs" style="height: 50px"></textarea> 
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="image">Image:</label>
					<div class="col-sm-12">
						<input class="form-control-file" type="file" name="image" id="image" accept="images/*">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
						<button class="btn btn-primary btn-block col-sm-12 col-md-6 col-lg-4" type="submit">Add</button>
					</div>
				</div>
			</form>
		</div>
		
		<div class="col-sm-12 col-lg-6">
			<h1 class="text-center">New device</h1>
			<form class="form-horizontal" method="POST" action="/assets" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label col-sm-3" for="sn">Serial Number:</label>
					<div class="col-sm-12">
						<input class="form-control" type="text" name="sn" id="sn">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="modelname_id">Model Name:</label>
					<div class="col-sm-12">
						<select class="form-control" name="modelname_id" id="modelname_id">
							<option>-- Select Model Name --</option>
							@foreach($modelnames as $modelname)
								<option value="{{ $modelname->id }}">{{ $modelname->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="status_id">Status:</label>
					<div class="col-sm-12">
						<select class="form-control" name="status_id" id="status_id">
							@foreach($statuses as $status)
								<option value="{{ $status->id }}">{{ $status->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
						<button class="btn btn-primary btn-block col-sm-12 col-md-6 col-lg-4" type="submit">Add</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
@endsection