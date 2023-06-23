<thead>
    <tr>
        <th>
            <input
                type="checkbox"
                wire:model="allSelected"
                wire:click="toggleFullSelection"
                title="{{ trans('crud.common.select_all') }}"
            />
        </th>
        <th class="text-left">
            @lang('crud.user_transactions.inputs.vers')
        </th>
        <th class="text-left">
            @lang('crud.user_transactions.inputs.nom')
        </th>
        <th class="text-left">
            @lang('crud.user_transactions.inputs.prenom')
        </th>
        <th class="text-right">
            @lang('crud.user_transactions.inputs.envoye')
        </th>
        <th class="text-right">
            @lang('crud.user_transactions.inputs.recu')
        </th>
        <th class="text-right">
            @lang('crud.user_transactions.inputs.frais')
        </th>
        <th class="text-right">
            @lang('crud.user_transactions.inputs.taux')
        </th>
        <th class="text-right">
            @lang('crud.user_transactions.inputs.charges')
        </th>
        <th class="text-left">
            @lang('crud.user_transactions.inputs.statut')
        </th>
        <th></th>
    </tr>
</thead>
<tbody class="text-gray-600">
    @foreach ($transactions as $transaction)
    <tr class="hover:bg-gray-100">
        <td class="text-left">
            <input
                type="checkbox"
                value="{{ $transaction->id }}"
                wire:model="selected"
            />
        </td>
        <td class="text-left">{{ $transaction->vers ?? '-' }}</td>
        <td class="text-left">{{ $transaction->nom ?? '-' }}</td>
        <td class="text-left">{{ $transaction->prenom ?? '-' }}</td>
        <td class="text-right">
            {{ $transaction->envoye ?? '-' }}
        </td>
        <td class="text-right">{{ $transaction->recu ?? '-' }}</td>
        <td class="text-right">{{ $transaction->frais ?? '-' }}</td>
        <td class="text-right">{{ $transaction->taux ?? '-' }}</td>
        <td class="text-right">
            {{ $transaction->charges ?? '-' }}
        </td>
        <td class="text-left">{{ $transaction->statut ?? '-' }}</td>
        <td class="text-right" style="width: 134px;">
            <div
                role="group"
                aria-label="Row Actions"
                class="relative inline-flex align-middle"
            >
                @can('update', $transaction)
                <button
                    type="button"
                    class="btn btn-light"
                    wire:click="editTransaction({{ $transaction->id }})"
                >
                    <i class="icon ion-md-create"></i>
                </button>
                @endcan
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
