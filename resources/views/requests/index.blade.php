@extends('layouts.app')

@section('title', 'Devices')

@section('content')
	<div class="container">
		@if(session('status'))
			<div class="alert {{ session('alert-type') }} alert-dissmisible fade show" role="alert">
				{{ session('status') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		@guest
			You have no permission to this page. Please <a href="/login">login</a> first.

		@elseif(Auth::user()->is_admin == 1)
			<div class="col-sm-12 table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Date Created</th>
							<th>Request Number</th>
							<th>User</th>
							<th>Model</th>
							<th>Asset</th>
							<th>Request Status</th>
						</tr>
					</thead>
					<tbody>
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
														<select class="form-control form-control-sm" name="asset_id">
															<option> Select an asset </option>
															@foreach($assets as $asset)
																@if($asset->modelname_id == $userreq->modelname_id && $asset->status_id == 1)
																	<option value="{{$asset->id}}">{{ $asset->sn }}</option>
																@endif
															@endforeach
														</select>
														<input type="text" name="req_action" value="approved" hidden>
														<button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
													</form>

													<form method="POST" action="/requests/{{$userreq->id}}">
														@csrf
														@method('PUT')
														<input type="text" name="req_action" value="cancelled" hidden>
														<button type="submit" class="btn btn-sm btn-outline-secondary">Cancel</button>
													</form>
												</td>
											@elseif($userreq->status_id == 4)
												<td>
													<form method="POST" action="/requests/{{$userreq->id}}">
														@csrf
														@method('PUT')
														<input type="text" name="req_action" value="returned" hidden>
														<input type="text" name="asset_id" value="{{$userreq->asset_id}}" hidden>
														<button type="submit" class="btn btn-sm btn-outline-primary">Return</button>
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
			<div class="col-sm-12 table-responsive">
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
												<td> Pending for approval
													<form method="POST" action="/requests/{{$userreq->id}}">
														@csrf
														@method('PUT')
														<input type="text" name="req_action" value="cancelled" hidden>
														<button type="submit" class="btn btn-sm btn-outline-danger">Cancel</button>
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
	</div>
@endsection