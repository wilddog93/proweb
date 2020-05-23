@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show all articles</div>

                <div class="card-body">
                    @role('admin')
                        <a href="#">Delete post</a>
                    @endrole

                    @can('edit posts')
                        <a href="#">Edit post</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
