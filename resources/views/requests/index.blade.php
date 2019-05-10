@extends('layouts.app')

@section('title', 'Devices')

@section('content')
	<div class="container">
		@if (session('status'))
			<div class="col-sm-12 col-lg-6 justify-content-center">
				<div class="alert {{ session('alert-type') }} alert-dissmisible fade show custom-alert" role="alert">
					{{ session('status') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		@endif

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
			<div class="float-right mb-3" id="float-disable">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Search:</span>
					</div>
					<input type="text" name="" id="search" class="form-control">
				</div>
			</div>

			@if(Auth::user()->is_admin == 1)
				<div class="card table-responsive">
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>Date Created</th>
								<th>Request Number</th>
								<th>User</th>
								<th>Model</th>
								<th>Asset</th>
								<th>Request Status</th>
							</tr>
						</thead>
						<tbody id="tBody">
							@foreach($userreqs as $userreq)
								@if($userreq->status_id < 5)
									<tr>
										<td>{{ $userreq->created_at }}</td>
										<td>{{ $userreq->req_num }}</td>

										@foreach($users as $user)
											@if($user->id == $userreq->user_id)
												<td>{{ $user->name }}</td>
											@endif
										@endforeach

										@foreach($modelnames as $modelname)
											@if($modelname->id == $userreq->modelname_id)
												<td>{{ $modelname->name }}</td>
											@endif
										@endforeach


										@if($userreq->asset_id == null)
											<td>No asset yet</td>
										@else
											@foreach($assets as $asset)
												@if($asset->id == $userreq->asset_id)
													<td>{{ $asset->sn }}</td>
												@endif
											@endforeach
										@endif

										@foreach($statuses as $status)
											@if($status->id == $userreq->status_id)
												@if($userreq->status_id == 3)
													<td>
														<form method="POST" action="/requests/{{$userreq->id}}">
															@csrf
															@method('PUT')
															<select class="form-control form-control-sm mb-2" name="asset_id">
																<option> Select an asset </option>
																@foreach($assets as $asset)
																	@if($asset->modelname_id == $userreq->modelname_id && $asset->status_id == 1)
																		<option value="{{$asset->id}}">{{ $asset->sn }}</option>
																	@endif
																@endforeach
															</select>
															<input type="text" name="req_action" value="approved" hidden>
															<button type="submit" class="btn btn-sm btn-block btn-outline-success mb-2">Approve</button>
														</form>

														<form method="POST" action="/requests/{{$userreq->id}}">
															@csrf
															@method('PUT')
															<input type="text" name="req_action" value="cancelled" hidden>
															<button type="submit" class="btn btn-sm btn-block btn-outline-secondary">Cancel</button>
														</form>
													</td>
												@elseif($userreq->status_id == 4)
													<td>
														<form method="POST" action="/requests/{{$userreq->id}}">
															@csrf
															@method('PUT')
															<input type="text" name="req_action" value="returned" hidden>
															<input type="text" name="asset_id" value="{{$userreq->asset_id}}" hidden>
															<button type="submit" class="btn btn-sm btn-block btn-outline-primary">Return</button>
														</form>
													</td>
												@else
													<td>{{ $status->name }}</td>
												@endif
											@endif
										@endforeach
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<div class="card table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Date Created</th>
								<th>Request Number</th>
								<th>Model</th>
								<th>Asset</th>
								<th>Request Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($userreqs as $userreq)
								@if($userreq->user_id == Auth::user()->id)
									<tr>
										<td>{{ $userreq->created_at }}</td>
										<td>{{ $userreq->req_num }}</td>

										@foreach($modelnames as $modelname)
											@if($modelname->id == $userreq->modelname_id)
												<td>{{ $modelname->name }}</td>
											@endif
										@endforeach


										@if($userreq->asset_id == null)
											<td>No assigned asset</td>
										@else
											@foreach($assets as $asset)
												@if($asset->id == $userreq->asset_id)
													<td>{{ $asset->sn }}</td>
												@endif
											@endforeach
										@endif

										@foreach($statuses as $status)
											@if($status->id == $userreq->status_id)
												@if($userreq->status_id == 3)
													<td><p class="mb-1">Pending for approval</p>
														<form method="POST" action="/requests/{{$userreq->id}}">
															@csrf
															@method('PUT')
															<input type="text" name="req_action" value="cancelled" hidden>
															<button type="submit" class="btn btn-sm btn-outline-danger btn-block">Cancel</button>
														</form>
													</td>
												@else
													<td>{{ $status->name }}</td>
												@endif
											@endif
										@endforeach

									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		@endguest
	</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#search").on("keyup", function() {
			let value = $(this).val().toLowerCase();
			$("#tBody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
@endsection