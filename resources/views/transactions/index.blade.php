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
			<div class="float-right mb-3">
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
								<th>Request Number</th>
								<th>User</th>
								<th>Model</th>
								<th>Asset</th>
								<th>Status</th>
								<th>Date Created</th>
								<th>Date Completed</th>
							</tr>
						</thead>
						<tbody id="tBody">
							@foreach($trans as $tran)
								<tr>
									<td>{{ $tran->req_num }}</td>
									@foreach($users as $user)
										@if($user->id == $tran->user_id)
											<td>{{ $user->name }}</td>
										@endif
									@endforeach

									@foreach($modelnames as $modelname)
										@if($modelname->id == $tran->modelname_id)
											<td>{{ $modelname->name }}</td>
										@endif
									@endforeach

									@if($tran->asset_id == null)
										<td>---</td>
									@else
										@foreach($assets as $asset)
											@if($asset->id == $tran->asset_id)
												<td>{{ $asset->sn }}</td>
											@endif
										@endforeach
									@endif

									@foreach($statuses as $status)
										@if($status->id == $tran->status_id)
											<td>{{ $status->name }}</td>
										@endif
									@endforeach

									<td>{{ $tran->created_at }}</td>
									<td>{{ $tran->updated_at }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<div class="card table-responsive">
					<table class="table table-hover">
						<thead class="thead-light">
							<tr>
								<th>Request Number</th>
								<th>Model</th>
								<th>Asset</th>
								<th>Status</th>
								<th>Date Created</th>
								<th>Date Completed</th>
							</tr>
						</thead>
						<tbody id="tBody">
							@foreach($trans as $tran)
								@if($tran->user_id == Auth::user()->id)
									<tr>
										<td>{{ $tran->req_num }}</td>

										@foreach($modelnames as $modelname)
											@if($modelname->id == $tran->modelname_id)
												<td>{{ $modelname->name }}</td>
											@endif
										@endforeach

										@if($tran->asset_id == null)
											<td>---</td>
										@else
											@foreach($assets as $asset)
												@if($asset->id == $tran->asset_id)
													<td>{{ $asset->sn }}</td>
												@endif
											@endforeach
										@endif

										@foreach($statuses as $status)
											@if($status->id == $tran->status_id)
												<td>{{ $status->name }}</td>
											@endif
										@endforeach

										<td>{{ $tran->created_at }}</td>
										<td>{{ $tran->updated_at }}</td>
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