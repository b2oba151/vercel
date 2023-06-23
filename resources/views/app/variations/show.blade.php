@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('variations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.variations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.variations.inputs.avant')</h5>
                    <span>{{ $variation->avant ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.variations.inputs.apres')</h5>
                    <span>{{ $variation->apres ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.variations.inputs.variation')</h5>
                    <span>{{ $variation->variation ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('variations.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Variation::class)
                <a
                    href="{{ route('variations.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
