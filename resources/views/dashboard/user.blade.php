@extends('layouts.app')

@section('content')
<div class="container">
    {{-- alert message here --}}
    @if (session('status'))
        <div class="alert {{ session('alert-type') }} alert-dissmisible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">User Dashboard</div>

				<div class="card-body">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
