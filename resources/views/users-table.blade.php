@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users Table') }}</div>

                <div class="card-body">
                    <livewire:users-table theme="bootstrap-5" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
