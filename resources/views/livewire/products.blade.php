<div wire:init="loadProducts" wire:poll.5s="loadProducts">
    <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
