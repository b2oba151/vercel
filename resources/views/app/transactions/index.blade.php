@extends('layouts.app')

@section('content')

<div class="card-body" >
    <h4 class="card-title mb-3 text-center"> {{ __('Liste des transactions') }}</h4>
    <div class="text-right  mb-4">
        @can('create', App\Models\Transaction::class)
        <a href="{{ route('transactions.create') }}" class="btn btn-primary"><i class="icon ion-md-add"></i> @lang('crud.common.create')</a>
        @endcan
    </div>
    <div class="table-responsive table-sm">

        <table id="historique_transactions" class="display table table-striped table-bordered"style="width:100%">
            @include('datatables.transaction')
        </table>
    </div>
</div>


@endsection
@section('page-js')
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.script.js') }}"></script>
@endsection
