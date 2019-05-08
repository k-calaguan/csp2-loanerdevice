@extends('layouts.app')

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="col-sm-12 col-lg-10">
				<label for="search">Search</label>
				<input type="text" id="search">
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
				<tbody id="tBody">
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