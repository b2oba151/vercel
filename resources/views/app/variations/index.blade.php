@extends('layouts.app')

@section('content')

<div class="card-body" >
    <h4 class="card-title mb-3 text-center"> Variations des Comptes</h4>
    <div class="text-right  mb-4">
        @can('create', App\Models\Variation::class)
        <a href="{{ route('variations.create') }}" class="btn btn-primary"><i class="icon ion-md-add"></i> @lang('crud.common.create')</a>
        @endcan
    </div>
    <div class="table-responsive table-sm">

        <table id="variation" class="display table table-striped table-bordered"style="width:100%">
            @include('datatables.variation')
        </table>
    </div>
</div>


@endsection
@section('page-js')
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.script.js') }}"></script>
@endsection
