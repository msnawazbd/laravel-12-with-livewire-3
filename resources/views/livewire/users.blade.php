<div>
    @session('success')
    <div class="alert alert-success">
        {{ $value }}
    </div>
    @endsession

    <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <livewire:user-show :user="$user"/>
        @endforeach
        </tbody>
    </table>
</div>
