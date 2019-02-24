@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard - Location: {{ \Illuminate\Support\Facades\Auth::user()->location->name }}</div>

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
                                    {{ $userBuilding->health }} / {{ $userBuilding->max_health }}
                                </td>
                                <td>
                                    @if (\Carbon\Carbon::now()->diffInSeconds($userBuilding->next_work, false) < 0)
                                        <a href="{{ route('user.building.work', $userBuilding) }}"><button class="btn btn-success">Work</button></a>
                                    @else
                                        {{ $userBuilding->next_work_time }}
                                    @endif
                                </td>
                                <td>
                                    {{ $userBuilding->next_work_supply }} {{ $userBuilding->building_type }}
                                </td>
                                <td>
                                    @if ($userBuilding->can_be_upgraded === true)
                                        <a href="{{ route('user.building.upgrade', $userBuilding) }}"><button class="btn btn-success">Upgrade</button></a>
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

                    <br/><hr/><br/>

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
