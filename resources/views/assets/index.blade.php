@extends('layouts.app')

@section('title', 'Devices')

@section('content')
<div class="container">
	@guest
		<div class="row justify-content-center">
			<div class="card custom-card-color col-7 p-4">
				<div class="text-center">
					<h2 class="text-light">Access Denied</h2>
					<h5>You do not have permission to this page. Please <a href="/login" class="text-light">login</strong></a> first.</h5>
				</div>
			</div>
		</div>

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
			<div class="col-lg-6">
				<div class="row pl-3">
					<div class="dropdown"><span></span>
						<div class="btn btn-info dropdown-toggle" data-toggle="dropdown">Sort By</div>
						<div class="dropdown-menu">
							<a href="/assets" class="dropdown-item">Show All</a>
							<a href="/assets/?sort=category" class="dropdown-item">Categories</a>
							<a href="/assets/?sort=status" class="dropdown-item">Status</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="float-right">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Search SN:</span>
						</div>
						<input type="text" name="" id="searchSN" class="form-control">
					</div>
				</div>
			</div>
		</div>

		@if(request()->has('sort'))
			@if(request('sort') == "category")
				@foreach($categories as $category)
					<div class="row">
						<div class="col-12 mb-2">
							<a href="#catCollapse{{$category->id}}" data-toggle="collapse" role="button" class="btn btn-secondary btn-block">
								<h5>{{$category->name}}</h5>
							</a>
						</div>

						<div class="collapse col-12" id="catCollapse{{$category->id}}">
							<div class="row mb-3">
								<div class="col-12">
									<div class="card table-responsive">
										<table class="table table-hover">
											<thead class="thead-light">
												<tr>
													<th>Model Name</th>
													<th>Image</th>
													<th>Serial Number</th>
													<th>Status</th>
													<th>Date Created</th>
													<th>Date Updated</th>
												</tr>
											</thead>
											<tbody id="tBody">
												@foreach($assets as $asset)
													@foreach($modelnames as $modelname)
														@if($asset->modelname_id == $modelname->id)
															@if($modelname->category_id == $category->id)
																<tr>
																	<td>
																		<a href="/modelnames/{{ $asset->modelname->id}}/edit">{{ $asset->modelname->name }}</a>
																	</td>

																	<td>
																		<img src="{{ $asset->modelname->image }}" class="img-thumbnail rounded mx-auto d-block" style="height:50px">
																	</td>
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
																							<button type="submit" class="btn btn-info">Save changes</button>
																						</div>
																					</form>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td>{{ $asset->status->name }}</td>
																	<td>{{ $asset->created_at }}</td>
																	<td>{{ $asset->updated_at }}</td>
																</tr>
															@endif
														@endif
													@endforeach
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@elseif(request('sort') == "status")
				@foreach($statuses as $status)
					<div class="row">
						<div class="col-12 mb-2">
							<a href="#statCollapse{{$status->id}}" data-toggle="collapse" role="button" class="btn btn-secondary btn-block">
								<h5>{{$status->name}} Assets</h5>
							</a>
						</div>

						<div class="collapse col-12" id="statCollapse{{$status->id}}">
							<div class="row mb-3">
								<div class="col-12">
									<div class="card table-responsive">
										<table class="table table-hover">
											<thead class="thead-light">
												<tr>
													<th>Model Name</th>
													<th>Image</th>
													<th>Serial Number</th>
													<th>Category</th>
													<th>Date Created</th>
													<th>Date Updated</th>
												</tr>
											</thead>
											<tbody id="tBody">
												@foreach($assets as $asset)
													@if($asset->status_id == $status->id)
														<tr>
															<td>
																<a href="/modelnames/{{ $asset->modelname->id}}/edit">{{ $asset->modelname->name }}</a>
															</td>

															<td>
																<img src="{{ $asset->modelname->image }}" class="img-thumbnail rounded mx-auto d-block" style="height:50px">
															</td>
															

															
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
																										@if($asset->status_id == 1)
																											<option value="{{ $status->id }}" selected>{{ $status->name }}</option>
																											<option value="2">Not Available</option>
																										@elseif($asset->status_id == 2)
																											<option value="2">Available</option>
																											<option value="{{ $status->id }}" selected>{{ $status->name }}</option>
																										@endif
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																						<button type="submit" class="btn btn-info">Save changes</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>

															@foreach($modelnames as $modelname)
																@if($modelname->id == $asset->modelname_id)
																	<td>{{$modelname->category->name}}</td>
																@endif
															@endforeach
															<td>{{ $asset->created_at }}</td>
															<td>{{ $asset->updated_at }}</td>
														</tr>
													@endif
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
		@else
			{{-- Show All --}}
			<div class="row">
				<div class="col-12">
					<div class="card table-responsive">	
						<table class="table table-hover">
							<thead class="thead-light">
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
							<tbody id="tBody">
								@foreach($assets as $asset)
								<tr>
									<td>
										<a href="/modelnames/{{ $asset->modelname->id}}/edit">{{ $asset->modelname->name }}</a>
									</td>

									<td>
										<img src="{{ $asset->modelname->image }}" class="img-thumbnail rounded mx-auto d-block" style="height:50px">
									</td>

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
															<button type="submit" class="btn btn-info">Save changes</button>
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
					</div>
				</div>
			</div> {{-- end of Admin View --}}
		@endif

		@else
			<div class="row mb-3">
				<div class="col-lg-6">
					<div class="btn-group">
						<a href="/assets" class="btn btn-info">Show All</a>
						<a href="/assets/?sort=category" class="btn btn-info">Categories</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="float-right">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Search:</span>
							</div>
							<input type="text" name="" id="searchModel" class="form-control">
						</div>
					</div>
				</div>
			</div>
			@if(request()->has('sort'))
				@if(request('sort') == "category")
				{{-- Sort by category --}}
					@foreach($categories as $category)
						<div class="row">
							<div class="col-12 mb-2">
								<a href="#catCollapse{{$category->id}}" data-toggle="collapse" role="button" class="btn btn-secondary btn-block">{{$category->name}}</a>
							</div>

							<div class="collapse col-12" id="catCollapse{{$category->id}}">
								<div class="row">
									@foreach($modelnames as $modelname)
										@if($modelname->category_id == $category->id)
										<div class="col-sm-6 col-lg-3 mb-3 card-group" id="divCard">
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
										@endif
									@endforeach
								</div>
							</div>
						</div>
					@endforeach
				@endif
			@else
				{{-- Show all --}}
				<div class="row">
					@foreach($modelnames as $modelname)
					<div class="col-sm-6 col-lg-3 mb-3 card-group" id="divCard">
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
	@endif
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#searchSN").on("keyup", function() {
			let value = $(this).val().toLowerCase();
			$("#tBody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});

	$(document).ready(function() {
		$("#searchModel").on("keyup", function() {
			let value = $(this).val();
			if(value == "") {
				$(".card-group").find(".card").parent().removeClass("d-none");
			} else {
				$(".card-group").find(".card:not(:contains("+value+"))").parent().addClass("d-none");
			}
		});
	});
</script>
@endsection
