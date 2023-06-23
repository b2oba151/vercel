@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('transactions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.transactions.show_title')
            </h4>
            <br>

            <div class="row">
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.vers')</h5>
                    <span>{{ $transaction->vers ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.prenom')</h5>
                    <span>{{ $transaction->prenom ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.envoye')</h5>
                    <span>{{ $transaction->envoye ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.nom')</h5>
                    <span>{{ $transaction->nom ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.recu')</h5>
                    <span>{{ $transaction->recu ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.frais')</h5>
                    <span>{{ $transaction->frais ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.taux')</h5>
                    <span>{{ $transaction->taux ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.charges')</h5>
                    <span>{{ $transaction->charges ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.statut')</h5>
                    <span>{{ $transaction->statut ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-6">
                    <h5>@lang('crud.transactions.inputs.user_id')</h5>
                    <span>{{ optional($transaction->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4 col-md-12">
                    <h5>@lang('crud.transactions.inputs.description')</h5>
                    <span>{{ $transaction->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('transactions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Transaction::class)
                <a
                    href="{{ route('transactions.create') }}"
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
