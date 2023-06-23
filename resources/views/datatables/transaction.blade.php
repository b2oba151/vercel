<thead>
    <tr>
        <th class="text-left">
            @lang('crud.transactions.inputs.vers')
        </th>
        <th class="text-left">
            @lang('crud.transactions.inputs.prenom')
        </th>
        <th class="text-right">
            @lang('crud.transactions.inputs.envoye')
        </th>
        <th class="text-left">
            @lang('crud.transactions.inputs.nom')
        </th>
        <th class="text-right">
            @lang('crud.transactions.inputs.recu')
        </th>
        <th class="text-right">
            @lang('crud.transactions.inputs.frais')
        </th>
        <th class="text-right">
            @lang('crud.transactions.inputs.taux')
        </th>
        <th class="text-right">
            @lang('crud.transactions.inputs.charges')
        </th>
        <th class="text-left">
            @lang('crud.transactions.inputs.statut')
        </th>
        <th class="text-left">
            @lang('crud.transactions.inputs.description')
        </th>
        <th class="text-left">
            Effectuée par
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
    @forelse($transactions as $transaction)
    <tr>
        @php
        $devise = ($transaction->user->location == "mali") ? "fcfa" : "dh";
    @endphp
        <td>{{ $transaction->vers ?? '-' }}</td>
        <td>{{ $transaction->nom ?? '-' }}</td>
        <td>{{ $transaction->prenom ?? '-' }}</td>
        <td>{{ $transaction->envoye ? number_format($transaction->envoye, 2, ',', ' ').' '.$devise : '-' }}</td>
        <td>{{ $transaction->recu ? number_format($transaction->recu, 2, ',', ' ').' '.$devise : '-' }}</td>
        <td>{{ $transaction->frais ? number_format($transaction->frais, 2, ',', ' ').' '.$devise : '-' }}</td>
        <td>{{ $transaction->taux ? number_format($transaction->taux, 2, ',', ' ').' '.'dh' : '-' }}</td>
        <td>{{ $transaction->charges ? number_format($transaction->charges, 2, ',', ' ').' '.$devise : 'Pas de charges' }}</td>
        <td>{{ $transaction->statut ?? '-' }}</td>
        <td>{{ $transaction->description ?? 'Pas de description' }}</td>
        <td>
            {{ optional($transaction->user)->name.' '.$transaction->user->firstname ?? '-' }}
        </td>
        <td>{{ $transaction->created_at}}</td>
        <td class="text-center" style="width: 134px;">
            <div
                role="group"
                aria-label="Row Actions"
                class="btn-group"
            >
                @can('update', $transaction)
                <a
                    href="{{ route('transactions.edit', $transaction) }}"
                >
                    <button
                        type="button"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-create"></i>
                    </button>
                </a>
                @endcan @can('view', $transaction)
                <a
                    href="{{ route('transactions.show', $transaction) }}"
                >
                    <button
                        type="button"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-eye"></i>
                    </button>
                </a>
                @endcan @can('delete', $transaction)
                <form
                    action="{{ route('transactions.destroy', $transaction) }}"
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
        <td colspan="12">
            @lang('crud.common.no_items_found')
        </td>
    </tr>
    @endforelse
</tbody>

