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
				<table class="table table-hover table-light col-12">
					<thead>
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
					<tbody>
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
			<div class="col-sm-12 table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Request Number</th>
							<th>Model</th>
							<th>Asset</th>
							<th>Status</th>
							<th>Date Created</th>
							<th>Date Completed</th>
						</tr>
					</thead>
					<tbody>
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
	</div>
@endsection