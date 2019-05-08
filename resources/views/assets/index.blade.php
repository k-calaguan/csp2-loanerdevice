@extends('layouts.app')

@section('title', 'Devices')

@section('content')
<div class="container">
	@guest
		You have no permission to this page. Please <a href="/login">login</a> first.

	@else
		@if (session('status'))
			<div class="alert {{ session('alert-type') }} alert-dissmisible fade show" role="alert">
				{{ session('status') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif


		@if($user->is_admin == 1)
		{{-- Admin View --}}
		<div class="row mb-3">
			<div class="col-sm-6 col-lg-6">
				<div class="dropdown">Filter by:
					<button class="dropdown-toggle" data-toggle="dropdown"></button>
					
					<div class="dropdown-menu">
						<a href="/assets" class="dropdown-item">Clear filter</a>
						<a href="/assets/?filter=1" class="dropdown-item">Available</a>
						<a href="/assets/?filter=2" class="dropdown-item">Not Available</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-6">
				<label for="search">Search SN:</label>
				<input type="text" name="search">
			</div>
		</div>

		<div class="row table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Model Name</th>
						<th>Image</th>
						<th>Serial Number</th>
						<th>Category</th>
						<th>Status</th>
						<th>Date Created</th>
						<th>Date Updated</th>
					</tr>
				</thead>
				<tbody>
					@foreach($assets as $asset)
					<tr>
						<td>
							<a href="/modelnames/{{ $asset->modelname->id}}/edit">{{ $asset->modelname->name }}</a>
						</td>
						<td><img src="{{ $asset->modelname->image }}" class="img-thumbnail rounded mx-auto d-block" style="height:50px"></td>
						<td>
							<!-- Edit Asset SN Modal Button -->
							<a href="" class="btn btn-link" data-toggle="modal" data-target="#editModal{{$asset->id}}">{{ $asset->sn }}</a>

							<!-- Edit Asset SN Form Modal -->
							<div class="modal fade" id="editModal{{$asset->id}}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">{{ $asset->modelname->name }} - {{ $asset->sn }}</h5>
										</div>

										<form class="form-horizontal" method="POST" action="/assets/{{$asset->id}}" enctype="multipart/form-data">
											@csrf
											@method('PUT')
											<div class="modal-body">
												<div class="form-group">
													<label class="control-label col-sm-4" for="sn">Serial Number:</label>
													<div class="col-sm-12">
														<input class="form-control" type="text" name="sn" id="sn" value="{{ $asset->sn }}">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3" for="modelname_id">Model Name:</label>
													<div class="col-sm-12">
														<select class="form-control" name="modelname_id" id="modelname_id">
															<option>-- Select Model Name --</option>
															@foreach($modelnames as $modelname)
																@if($asset->modelname_id == $modelname->id)
																	<option value="{{ $modelname->id }}" selected>{{ $modelname->name }}</option>
																@else
																	<option value="{{ $modelname->id }}">{{ $modelname->name }}</option>
																@endif
															@endforeach
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-sm-3" for="status_id">Status:</label>
													<div class="col-sm-12">
														<select class="form-control" name="status_id" id="status_id">
															@foreach($statuses as $status)
																@if($asset->status_id == $status->id)
																	<option value="{{ $status->id }}" selected>{{ $status->name }}</option>
																@else
																	<option value="{{ $status->id }}">{{ $status->name }}</option>
																@endif
															@endforeach
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</td>
						<td>{{ $asset->modelname->category->name }}</td>
						<td>{{ $asset->status->name }}</td>
						<td>{{ $asset->created_at }}</td>
						<td>{{ $asset->updated_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> {{-- end of Admin View --}}

		@else
			<div class="row">
				@foreach($modelnames as $modelname)
				<div class="col-sm-6 col-lg-3 mb-3 card-group">
					<div class="card">
						<div class="card-header">{{$modelname->name}}</div>
						<div class="card-body">
							<img src="{{$modelname->image}}" class="rounded mx-auto d-block img-fluid">

						</div>
						<div class="text-center">
							@foreach($assetcounts as $assetcount)
								@if($assetcount->modelname_id == $modelname->id)
									<p>In stock: {{ $assetcount->total }}</p>
								@endif
							@endforeach
						</div>

						<div class="card-footer">
							<button type="button" class="btn btn-link float-left" data-toggle="modal" data-target="#showDetails{{$modelname->id}}">View Details</button>

							<div class="modal fade" id="showDetails{{$modelname->id}}">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Specifications</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>{{$modelname->specs}}</p>
										</div>
									</div>
								</div>
							</div>

							<form method="POST" action="/requests">
								@csrf
								<input type="hidden" name="modelname_id" value="{{$modelname->id}}">
								<button type="submit" class="btn btn-success float-right" data-id="{{$modelname->id}}">Request</button>
							</form>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		@endif
	@endif
</div>
@endsection
