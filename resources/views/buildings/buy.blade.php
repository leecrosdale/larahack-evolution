@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Buy Buildings</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">

                                <table class="table table-striped">
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Supply Required
                                            </th>
                                            <th>
                                                Buy
                                            </th>
                                        </tr>

                                    @if (isset($errors))
                                            @foreach ($errors as $k => $error)
                                                <div class="alert alert-danger">You require {{ $error }} {{ $k }} to make that purchase</div>
                                            @endforeach
                                    @endif

                                    @foreach ($buildings as $building)

                                        <tr>
                                            <td>
                                                {{ $building->name }}
                                            </td>
                                            <td>
                                                @foreach ($building->requirements as $requirement)
                                                  {{ $requirement->amount * (\Illuminate\Support\Facades\Auth::user()->user_buildings()->count() + 1) * \Illuminate\Support\Facades\Auth::user()->level }} {{ $requirement->supply->name }},
                                                @endforeach
                                            </td>
                                            <td>

                                                @if (\Illuminate\Support\Facades\Auth::user()->afford_purchase($building->requirements_arr()) === true)
                                                <a href="{{ route('building.buy', $building) }}"><button class="btn btn-success">Buy</button></a>
                                                @else

                                                    @foreach(\Illuminate\Support\Facades\Auth::user()->afford_purchase($building->requirements_arr()) as $type => $purchase)
                                                        {{ $purchase }} {{ $type }},
                                                    @endforeach

                                                @endif

                                            </td>
                                        </tr>

                                    @endforeach

                                </table>

                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
