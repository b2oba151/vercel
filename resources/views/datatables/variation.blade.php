<thead>
    <tr>
        <th class="text-left">
           Nom - Prenom
        </th>
        <th class="text-left">
            @lang('crud.variations.inputs.avant')
        </th>
        <th class="text-left">
            @lang('crud.variations.inputs.apres')
        </th>
        <th class="text-left">
            @lang('crud.variations.inputs.variation')
        </th>
        <th class="text-left">
            Date
        </th>
        <th class="text-center">
            @lang('crud.common.actions')
        </th>
    </tr>
</thead>
<tbody>
    @forelse($variations as $variation)
    <tr>
        @php
        $devise = ($variation->user->location == "mali") ? "fcfa" : "dh";
    @endphp
    <td>{{ $variation->user->name ? $variation->user->name.' '.$variation->user->firstname : '-' }}</td>
    <td>{{ $variation->avant ? number_format($variation->avant, 2, ',', ' ').' '.$devise : '-' }}</td>
    <td>{{ $variation->apres ? number_format($variation->apres, 2, ',', ' ').' '.$devise : '-' }}</td>
    <td>{{ $variation->variation ? number_format($variation->variation, 2, ',', ' ').' '.$devise : '-' }}</td>
    <td>{{ $variation->created_at}}</td>

        <td class="text-center" style="width: 134px;">
            <div
                role="group"
                aria-label="Row Actions"
                class="btn-group"
            >
                @can('update', $variation)
                <a
                    href="{{ route('variations.edit', $variation) }}"
                >
                    <button
                        type="button"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-create"></i>
                    </button>
                </a>
                @endcan @can('view', $variation)
                <a
                    href="{{ route('variations.show', $variation) }}"
                >
                    <button
                        type="button"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-eye"></i>
                    </button>
                </a>
                @endcan @can('delete', $variation)
                <form
                    action="{{ route('variations.destroy', $variation) }}"
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
        <td colspan="4">
            @lang('crud.common.no_items_found')
        </td>
    </tr>
    @endforelse
</tbody>
