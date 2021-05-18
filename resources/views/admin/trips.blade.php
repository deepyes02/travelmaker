<!--
<h2>Trips with category and user</h2>
@if(count($trips)>0)
<div class="trips_container">
@foreach($trips as $trip)
<div class="trip_inner">
<h2><a href="{{$trip->slug}}">{{$trip->name}}</a></h2>
<p>Difficulty: {{$trip->difficulty}}</p>
<p>Max-altitude: {{$trip->max_altitude_mtr}} meters / {{round($trip->max_altitude_mtr*3.29)}} ft</p>
<p>Category: <a href="{{$trip->category->slug}}">{{$trip->category->name}}</a></p>
</div>
@endforeach
</div>
@else
<h3>sorry no trips available, add some in the database</h3>
@endif
-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Trips (') . (count($trips) > 0 ? count($trips) : "Add some") . ")" }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($trips) > 0)
                @foreach($trips as $trip)
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2><a href="{{$trip->slug}}">{{$trip->name}}</a></h2>
                    <p>Difficulty: {{$trip->difficulty}}</p>
                    <p>Max-altitude: {{$trip->max_altitude_mtr}} meters / {{round($trip->max_altitude_mtr*3.29)}} ft </p>
                    <p>Category: <a href="{{$trip->category->slug}}">{{$trip->category->name}}</a></p>
                    <br>
                    <x-button class="ml-3">
                        {{ __('Edit') }}
                    </x-button>
                    <x-button class="ml-3">
                        {{ __('Delete') }}
                    </x-button>
                </div>
                @endforeach
                @else
                <div class="p-6 bg-white border-b border-gray-200">
                    No Trips available. Add some to get started
                </div>
                @endif
            </div>
        </div>
    </div>
    You're logged in as {{ Auth::user()->name}}
</x-app-layout>