@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('users.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.users.show_title')
            </h4><br />
            <div class="row">

                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.users.inputs.name')</h5>
                        <span>{{ $user->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.users.inputs.firstname')</h5>
                        <span>{{ $user->firstname ?? '-' }}</span>
                    </div>
                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.users.inputs.email')</h5>
                        <span>{{ $user->email ?? '-' }}</span>
                    </div>
                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.users.inputs.location')</h5>
                        <span>{{ $user->location ?? '-' }}</span>
                    </div>
                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.users.inputs.compte')</h5>
                        <span>{{ $user->compte ?? '-' }}</span>
                    </div>
                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.users.inputs.devise')</h5>
                        <span>{{ $user->devise ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mb-4 col-md-6">
                        <h5>@lang('crud.roles.name')</h5>
                        <div>
                            @forelse ($user->roles as $role)
                            <div class="badge badge-primary">{{ $role->name }}</div>
                            <br />
                            @empty - @endforelse
                        </div>
                    </div>


            </div>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\User::class)
                <a href="{{ route('users.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Transaction::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Transactions</h4>

            <livewire:user-transactions-detail :user="$user" />
        </div>
    </div>
    @endcan
</div>
@endsection
@section('page-js')
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.script.js') }}"></script>
@endsection
