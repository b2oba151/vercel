@extends('layoutsAcceuil.app')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <x-form
            id="monFormulaire"
            method="POST"
            action="{{ route('home.store') }}"
            class="mt-4"
        >
            @include('app.transactions.form-inputs-acceuil')

            <div class="mt-4">

                <div class="row">
                    <div class="col-1"></div>
                    <button type="submit" class="btn btn-primary col-4 mt-2">Envoyer</button>
                    <div class="col-2"></div>
                    <button type="button" class="btn btn-secondary col-4 mt-2" onclick="reinitialiserChamps()">Réinitialiser</button>
                    <div class="col-1"></div>
                </div>
            </div>
        </x-form>
        </div>
        <div class="col-md-7">
            <h3 class="text-center">Les 5 dernières transactions</h3>

            <div class="card-body" style="background-color:rgb(147, 179, 115)">
                <h4 class="card-title mb-3 text-center">Historique des transactions</h4>
                <p></p>
                <div class="table-responsive table-secondary table-sm">

                    <table id="cinq_dernier" class="display table table-striped table-bordered"style="width:100%">
                        @include('datatables.transaction-cinq-dernier')
                    </table>
                </div>

            </div>

        </div>
    </div>

    <div class="modal fade mt-2" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="calculatorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="calculatorModalLabel">Calculatrice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="calculator"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
<script>
    function reinitialiserChamps() {
        document.getElementById("monFormulaire").reset();
    }
</script>
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.script.js') }}"></script>
@endsection
