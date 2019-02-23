@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <buildings-component></buildings-component>
                    </div>


                    <div class="row">

                        <stats-component></stats-component>

                        <supply-component></supply-component>


                    </div>

                </div>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
