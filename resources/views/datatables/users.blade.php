<thead>
    <tr>
        <th class="text-left">
            Nom
        </th>
        <th class="text-left">
            Prenom
        </th>
        <th class="text-left">
            @lang('crud.users.inputs.email')
        </th>
        <th class="text-left">
            Residence
        </th>
        <th class="text-left">
            @lang('crud.users.inputs.compte')
        </th>
        <th class="text-left">
            @lang('crud.users.inputs.devise')
        </th>
        <th class="text-center">
            @lang('crud.common.actions')
        </th>
    </tr>
</thead>
<tbody>
    @forelse($users as $user)
    <tr>
        <td>{{ $user->name ?? '-' }}</td>
        <td>{{ $user->firstname ?? '-' }}</td>
        <td>{{ $user->email ?? '-' }}</td>
        <td>{{ $user->location ?? '-' }}</td>
        <td>{{ $user->compte ? number_format($user->compte, 2, ',', ' '): '-' }}</td>
        <td>{{ $user->devise ?? '-' }}</td>
        <td class="text-center" style="width: 134px;">
            <div
                role="group"
                aria-label="Row Actions"
                class="btn-group"
            >
                @can('update', $user)
                <a href="{{ route('users.edit', $user) }}">
                    <button
                        type="button"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-create"></i>
                    </button>
                </a>
                @endcan @can('view', $user)
                <a href="{{ route('users.show', $user) }}">
                    <button
                        type="button"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-eye"></i>
                    </button>
                </a>
                @endcan @can('delete', $user)
                <form
                    action="{{ route('users.destroy', $user) }}"
                    method="POST"
                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                >
                    @csrf @method('DELETE')
                    <button
                        type="submit"
                        class="btn btn-light text-danger"
                    >
                        <i class="icon ion-md-trash"></i>
                    </button>
                </form>
                @endcan
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">
            @lang('crud.common.no_items_found')
        </td>
    </tr>
    @endforelse
</tbody>
