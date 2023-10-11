@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.index') }}" method="GET" class="float-start p-1">
                        @csrf
                        <button type="submit" class="btn btn-success">Show Companies</button>
                    </form>
                    <form action="{{ route('companies.create') }}" method="GET" class=" float-start p-1">
                        @csrf
                        <button type="submit" class="btn btn-success">Add Company</button>
                    </form>
                    <form action="{{ route('companyUsers.index') }}" method="GET" class=" float-start p-1">
                        @csrf
                        <button type="submit" class="btn btn-primary">Show Users</button>
                    </form>
                    <form action="{{ route('companyUsers.create') }}" method="GET" class="p-1">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
