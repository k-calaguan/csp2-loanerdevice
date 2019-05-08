@extends('layouts.app')

@section('content')

<div class="container">
	github push check in heroku if pushed
	<div class="card">
		<div class="card-header">
			<div class="dropdown">Filter by:
				<button class="dropdown-toggle" data-toggle="dropdown"></button>
				
				<div class="dropdown-menu">
					<a href="/users" class="dropdown-item">All</a>
					<a href="/users/?filter=1" class="dropdown-item">Admin</a>
					<a href="/users/?filter=2" class="dropdown-item">User</a>
				</div>
			</div>
		</div>
		<div class="card-body table-responsive">
			<table class="table table-hover table-sm">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email Address</th>
						<th>Permission</th>
						<th>Created on</th>
						<th>Updated at</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						@if($user->is_admin == 1)
							<td>Administrator</td>
						@else
							<td>User</td>
						@endif
						<td>{{ $user->created_at }}</td>
						<td>{{ $user->updated_at }}</td>
					</tr>	
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection