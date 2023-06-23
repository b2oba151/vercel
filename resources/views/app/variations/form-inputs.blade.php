@php $editing = isset($variation) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="avant"
            label="Avant"
            :value="old('avant', ($editing ? $variation->avant : ''))"
            
            step="0.01"
            placeholder="Avant"

        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="apres"
            label="Apres"
            :value="old('apres', ($editing ? $variation->apres : ''))"
            
            step="0.01"
            placeholder="Apres"

        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="variation"
            label="Variation"
            :value="old('variation', ($editing ? $variation->variation : ''))"
            
            step="0.01"
            placeholder="Variation"

        ></x-inputs.number>
    </x-inputs.group>
</div>
