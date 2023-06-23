@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $user->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="firstname"
            label="Firstname"
            :value="old('firstname', ($editing ? $user->firstname : ''))"
            maxlength="255"
            placeholder="Firstname"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="location" label="Location">
            @php $selected = old('location', ($editing ? $user->location : '')) @endphp
            <option value="mali" {{ $selected == 'mali' ? 'selected' : '' }} >Mali</option>
            <option value="maroc" {{ $selected == 'maroc' ? 'selected' : '' }} >Maroc</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="compte"
            label="Compte"
            :value="old('compte', ($editing ? $user->compte : ''))"
            maxlength="255"
            placeholder="Compte"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="devise" label="Devise">
            @php $selected = old('devise', ($editing ? $user->devise : '')) @endphp
            <option value="fcfa" {{ $selected == 'fcfa' ? 'selected' : '' }} >Fcfa</option>
            <option value="mad" {{ $selected == 'mad' ? 'selected' : '' }} >Mad</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
