@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 text-center mb-3">
			<h2 class="text-light">Admin Dashboard</h2>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-sm-12 col-lg-5 card-group">
			<div class="card border-info text-center">
				<table class="table table-striped table-sm">
					<div class="pt-3 text-center">
						<h5>New Requests</h5>
					</div>
					<thead>
						<tr>
							<th>Request #</th>
							<th>Status</th>
							<th>Created on</th>
						</tr>
					</thead>
					<tbody>
						@foreach($requests as $request)
							@foreach($statuses as $status)
								@if($status->id == $request->status_id && ($request->status_id == 3))
									<tr>
										<td>{{$request->req_num}}</td>
										<td>{{$status->name}}</td>
										<td>{{$request->updated_at}}</td>
									</tr>
								@endif
							@endforeach
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-sm-12 col-lg-7 card-group">
			<div class="card border-info text-center">
				<table class="table table-striped table-sm">
					<div class="pt-3 text-center">
						<h5>New Users</h5>
					</div>
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Created on</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->created_at}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-sm-12 col-lg-12">
			<div class="card border-info text-center">
				<table class="table table-striped table-sm">
					<div class="pt-3 text-center">
						<h5>New Assets</h5>
					</div>
					<thead>
						<tr>
							<th>Model</th>
							<th>SN</th>
							<th>Status</th>
							<th>Created on</th>
						</tr>
					</thead>
					<tbody>
						@foreach($assets as $asset)
							@foreach($modelnames as $modelname)
								@if($modelname->id == $asset->modelname_id)
									<tr>
										<td>{{$modelname->name}}</td>
										<td>{{$asset->sn}}</td>
										<td>{{$asset->status->name}}</td>
										<td>{{$asset->created_at}}</td>
									</tr>
								@endif
							@endforeach
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

@endsection
