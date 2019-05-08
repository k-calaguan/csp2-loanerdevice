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

	<h1>New Category</h1>

	<form class="form-horizontal" method="POST" action="/categories">
		@csrf
		<div class="form-group">
			<label class="control-label col-sm-12" for="name">Name:</label>
			<div class="col-sm-12">
				<input class="form-control" type="text" name="name" id="name">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-12 d-flex justify-content-center">
				<button class="btn btn-primary btn-block col-sm-12 col-md-6" type="submit">Add</button>
			</div>
		</div>
	</form>
</div>
@endsection