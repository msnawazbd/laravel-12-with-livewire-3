<div wire:init="loadProducts" wire:poll.5s="loadProducts">

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
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @if($product->status == 'AVAILABLE')
                        <span class="badge bg-success text-uppercase">Available</span>
                    @elseif($product->status == 'ON SALE')
                        <span class="badge bg-warning text-uppercase">On Sale</span>
                    @elseif($product->status == 'OUT OF STOCK')
                        <span class="badge bg-danger text-uppercase">Out of Stock</span>
                    @endif
                </td>
                <td>
                    <button
                            wire:click="productDelete({{ $product->id }})"
                            class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@script
<script>
    $wire.on("confirm", (event) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.dispatch("delete", {
                    id: event.id
                });
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    });
</script>
@endscript
