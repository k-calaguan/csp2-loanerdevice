@extends('layouts.app')

@section('content')
<div class="container">
    {{-- alert message here --}}
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

	<div class="row justify-content-center">
		<div class="col-12 text-center mb-3">
			<h3 class="text-light">Dashboard</h3>
		</div>
	</div>
		
	<div class="row justify-content-center card-deck">
		<div class="col-sm-12 col-lg-6">
			<div class="card text-center">
				<table class="table table-striped table-sm">
					<div class="pt-3 text-center">
						<h5>Active Requests</h5>
					</div>
					<thead>
						<tr>
							<th>Request #</th>
							<th>Status</th>
							<th>Last updated on</th>
						</tr>
					</thead>
					<tbody>
						@foreach($requests as $request)
							@foreach($statuses as $status)
								@if($status->id == $request->status_id && ($request->status_id == 3 || $request->status_id == 4))
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

		<div class="col-sm-12 col-lg-6">
			<div class="card text-center">
				<table class="table table-striped table-sm">
					<div class="pt-3 text-center">
						<h5>Recent Closed Requests</h5>
					</div>
					<thead>
						<tr>
							<th>Request #</th>
							<th>Status</th>
							<th>Closed on</th>
						</tr>
					</thead>
					<tbody>
						@foreach($requests as $request)
							@foreach($statuses as $status)
								@if($status->id == $request->status_id && ($request->status_id == 5 || $request->status_id == 6))
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
	</div>
</div>
@endsection
