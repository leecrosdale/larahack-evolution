@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Training</div>


                    @if (!\Illuminate\Support\Facades\Auth::user()->can_train)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if (\Illuminate\Support\Facades\Auth::user()->energy === 0)
                                            You are out of energy! <a href="{{route('user.sleep')}}">Try to sleep</a>
                                        @else
                                            You can retrain in {{ Auth::user()->last_train->addMinutes(15)->diffForHumans() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else

                    @php

                    $elements = ['strength','stamina','energy','health']

                    @endphp



                        @foreach ($elements as $element)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">{{ ucfirst($element) }}</div>
                                    <div class="card-body">
                                            <a href="{{ url('/train/' . $element . '/all')}}">
                                                <button class="btn btn-primary">
                                                    Train using all energy
                                                </button>
                                            </a>
                                            <a href="{{ url('/train/' . $element . '/half')}}">
                                                <button class="btn btn-secondary">
                                                    Train using half energy
                                                </button>
                                            </a>
                                            <a href="{{ url('/train/' . $element . '/qtr')}}">
                                                <button class="btn btn-warning">
                                                    Train using quarter energy
                                                </button>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @endif


                </div>
        </div>
    </div>
    </div>
@endsection
