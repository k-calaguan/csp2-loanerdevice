@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6">
            <div class="card mb-3">
                <div class="card-header">Newly added devices:</div>
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}


                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-header">Most recent requests:</div>
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
