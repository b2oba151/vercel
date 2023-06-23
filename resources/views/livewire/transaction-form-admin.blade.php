
<div class="row">
    @php $editing = isset($transaction) ; $users = \App\Models\User::pluck('name', 'id') @endphp
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vers" label="Vers">
            @php $selected = old('vers', ($editing ? $transaction->vers : '')) @endphp
            <option value="{{ Auth()->user()->location == 'mali' ? 'maroc' : 'mali' }}" {{ $selected == 'mali' ? 'selected' : '' }} >{{ Auth()->user()->location == 'mali' ? 'Maroc ' : 'Mali' }}</option>
            <option value="mali" {{ $selected == 'mali' ? 'selected' : '' }} >Mali</option>
            <option value="maroc" {{ $selected == 'maroc' ? 'selected' : '' }} >Maroc</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom"
            label="Nom"
            :value="old('nom', ($editing ? $transaction->nom : ''))"
            placeholder="Nom"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="prenom"
            label="Prenom"
            :value="old('prenom', ($editing ? $transaction->prenom : ''))"
            placeholder="Prenom"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="envoye"
            label="Envoye"
            :value="old('envoye', ($editing ? $transaction->envoye : ''))"
            step="0.01"
            placeholder="Envoye"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="recu"
            label="Recu"
            :value="old('recu', ($editing ? $transaction->recu : ''))"
            step="0.01"
            placeholder="Recu"

        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="frais"
            label="Frais"
            :value="old('frais', ($editing ? $transaction->frais : ''))"
            step="0.01"
            placeholder="Frais"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="taux"
            label="Taux"
            :value="old('taux', ($editing ? $transaction->taux : ''))"
            step="0.01"
            placeholder="Taux"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="charges"
            label="Charges"
            :value="old('charges', ($editing ? $transaction->charges : ''))"
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

            >{{ old('description', ($editing ? $transaction->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User">
            @php $selected = old('user_id', ($editing ? $transaction->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
