@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row mb-3">
		<div class="col-12">
			<div class="float-right">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Search:</span>
					</div>
					<input type="text" name="" id="search" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-hover table-light table-sm">
				<thead class="thead-light">
					<tr>
						<th class="pl-3">Name</th>
						<th class="pl-3">Email Address</th>
						<th class="pl-3">Permission</th>
						<th class="pl-3">Created on</th>
						<th class="pl-3">Updated at</th>
					</tr>
				</thead>
				<tbody id="tBody">
					@foreach($users as $user)
					<tr>
						<td class="pl-3">{{ $user->name }}</td>
						<td class="pl-3">{{ $user->email }}</td>
						@if($user->is_admin == 1)
							<td class="pl-3">Administrator</td>
						@else
							<td class="pl-3">User</td>
						@endif
						<td class="pl-3">{{ $user->created_at }}</td>
						<td class="pl-3">{{ $user->updated_at }}</td>
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