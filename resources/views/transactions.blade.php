@extends('layoutsAcceuil.app')

@section('title')
   TRANSACTION
@endsection

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection
@section('content-full')



<div class="card-body" >
    <h4 class="card-title mb-3 text-center">Historique des transactions</h4>
    <p></p>
    <div class="table-responsive table-secondary table-sm">

        <table id="historique_transactions" class="display table table-striped table-bordered"style="width:100%">
            @include('datatables.transaction-acceuil')
        </table>
    </div>

</div>


    @endsection


    @section('page-js')
        <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables.script.js') }}"></script>
    @endsection





