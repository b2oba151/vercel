<div class="row">
    @php $editing = isset($transaction) @endphp
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vers" label="Vers">
            @php $selected = old('vers', ($editing ? $transaction->vers : '')) @endphp
            <option value="{{ Auth()->user()->location == 'mali' ? 'maroc' : 'mali' }}" {{ $selected == 'mali' ? 'selected' : '' }} >{{ Auth()->user()->location == 'mali' ? 'Maroc ' : 'Mali' }}</option>
            {{-- <option value="mali" {{ $selected == 'mali' ? 'selected' : '' }} >Mali</option>
            <option value="maroc" {{ $selected == 'maroc' ? 'selected' : '' }} >Maroc</option> --}}
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="nom"
            label="Nom"
            :value="old('nom', ($editing ? $transaction->nom : 'test'))"
            placeholder="Nom"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="prenom"
            label="Prenom"
            :value="old('prenom', ($editing ? $transaction->prenom : 'test'))"
            placeholder="Prenom"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.number
        wire:model="envoye"
        name="envoye"
        label="Envoyé{{ Auth()->user()->location == 'mali' ? ' (FCFA)' : ' (MAD)' }}"
        step="0.000000000000001"
        placeholder="Envoyé"
        required
        ></x-inputs.number>
        </x-inputs.group>


    <x-inputs.group class="col-sm-6">
        <x-inputs.number
            wire:model="recu"
            name="recu"
            label="Recu{{ Auth()->user()->location == 'mali' ? ' (MAD)' : ' (FCFA)' }}"
            step="0.000000000000001"
            placeholder="Recu"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-4">
        <x-inputs.number
            wire:model="frais"
            name="frais"
            label="Frais"
            step="0.5"
            placeholder="Frais"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-4">
        <x-inputs.number
            wire:model="taux"
            name="taux"
            label="Taux"
            step="0.01"
            placeholder="Taux"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-4">
        <x-inputs.number
            wire:model="charges"
            name="charge"
            label="Charges"
            step="0.01"
            placeholder="Charges"
        ></x-inputs.number>
    </x-inputs.group>
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="statut" label="Statut">
            @php $selected = old('statut', ($editing ? $transaction->statut : '')) @endphp
            <option value="effectue" {{ $selected == 'effectue' ? 'selected' : '' }} >Effectue</option>
            <option value="attente" {{ $selected == 'attente' ? 'selected' : '' }} >Attente</option>
            <option value="annulle" {{ $selected == 'annulle' ? 'selected' : '' }} >Annulle</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"

        >{{ old('description', ($editing ? $transaction->description : 'Une breve description'))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    {{-- <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User">
            @php $selected = old('user_id', ($editing ? $transaction->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group> --}}
</div>
