@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Modal CRUD') }}</div>

                <div class="card-body">
                    <livewire:modal-crud />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
