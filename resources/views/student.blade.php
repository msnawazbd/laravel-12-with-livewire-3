@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Student') }}</div>

                <div class="card-body">
                    <livewire:student />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
