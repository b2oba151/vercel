<div>
    <div class="mb-4">
        {{-- @can('create', App\Models\Transaction::class)
        <button class="btn btn-primary" wire:click="newTransaction">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan --}}

        @can('delete-any', App\Models\Transaction::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }}
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="user-transactions-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="transaction.vers"
                            label="Vers"
                            wire:model="transaction.vers"
                        >
                            <option value="mali" {{ $selected == 'mali' ? 'selected' : '' }} >Mali</option>
                            <option value="maroc" {{ $selected == 'maroc' ? 'selected' : '' }} >Maroc</option>
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="transaction.nom"
                            label="Nom"
                            wire:model="transaction.nom"
                            maxlength="255"
                            placeholder="Nom"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="transaction.prenom"
                            label="Prenom"
                            wire:model="transaction.prenom"
                            maxlength="255"
                            placeholder="Prenom"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="transaction.envoye"
                            label="Envoye"
                            wire:model="transaction.envoye"
                            max="255"
                            step="0.01"
                            placeholder="Envoye"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="transaction.recu"
                            label="Recu"
                            wire:model="transaction.recu"
                            max="255"
                            step="0.01"
                            placeholder="Recu"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="transaction.frais"
                            label="Frais"
                            wire:model="transaction.frais"
                            max="255"
                            step="0.01"
                            placeholder="Frais"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="transaction.taux"
                            label="Taux"
                            wire:model="transaction.taux"
                            max="255"
                            step="0.01"
                            placeholder="Taux"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="transaction.charges"
                            label="Charges"
                            wire:model="transaction.charges"
                            max="255"
                            step="0.01"
                            placeholder="Charges"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="transaction.statut"
                            label="Statut"
                            wire:model="transaction.statut"
                        >
                            <option value="effectue" {{ $selected == 'effectue' ? 'selected' : '' }} >Effectue</option>
                            <option value="attente" {{ $selected == 'attente' ? 'selected' : '' }} >Attente</option>
                            <option value="annulle" {{ $selected == 'annulle' ? 'selected' : '' }} >Annulle</option>
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="transaction.description"
                            label="Description"
                            wire:model="transaction.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
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
                    {{-- <th></th> --}}
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
                    <td class="text-left">
                    {{-- <td class="text-right" style="width: 134px;">
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
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11">{{ $transactions->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
