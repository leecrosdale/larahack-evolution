@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Buildings</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <h2>Buildings - <a href="{{ route('user.building.buy') }}">Buy</a></h2>

                            <table class="table table-striped">
                                <tr>
                                    <th>Building</th>
                                    <th>Level</th>
                                    <th>Location</th>
                                    <th>Health</th>
                                    <th>Next Work</th>
                                    <th>Supply</th>
                                    <th>Upgrade</th>
                                    <th>Supply Requirements</th>
                                    <th>Supply Remaining</th>
                                </tr>

                                @foreach ($buildings as $userBuilding)
                                    <tr>
                                        <td>
                                            {{ $userBuilding->building->name }}
                                        </td>
                                        <td>
                                            {{ $userBuilding->level }}
                                        </td>
                                        <td>
                                            {{ $userBuilding->location->name }}

                                            @if ($userBuilding->location->id !== Auth::user()->location_id)
                                                -
                                                <a href="{{ route('location.travel', $userBuilding->location->id) }}">Travel</a>
                                                @php
                                                    $distance = $userBuilding->location->id  - Auth::user()->location_id;
                                                    $travel_cost = $distance < 0 ? $distance * -1 : $distance;
                                                @endphp
                                                ({{ $travel_cost }} Energy)
                                            @endif
                                        </td>
                                        <td>
                                            {{ $userBuilding->health }} / {{ $userBuilding->max_health }}
                                        </td>
                                        <td>
                                            {{ $userBuilding->next_work_time }}
                                        </td>
                                        <td>
                                            {{ $userBuilding->next_work_supply }} {{ $userBuilding->building_type }}
                                        </td>
                                        <td>
                                            @if ($userBuilding->can_be_upgraded === true)
                                                Upgrade Ready
                                            @else
                                                Supply needed
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($userBuilding->collectRequirements() as $key => $requirement)
                                                {{ $requirement }} {{ $key }},
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($userBuilding->can_be_upgraded !== true)
                                                @foreach ($userBuilding->can_be_upgraded as $key => $requirement)
                                                    {{ $requirement }} {{ $key }},
                                                @endforeach
                                            @else
                                                Requirements Met!
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
@endsection
