<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        <button
            wire:click="destroy({{ $user->id }})"
            wire:confirm="Are you sure want to delete this user?"
            class="btn btn-danger btn-sm">Delete</button>
    </td>
</tr>
