<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trips') }}
        </h2>   
        <x-nav-link href="{{route('trips')}}">{{ __('Total Trips (') . (count($trips) > 0 ? count($trips) : "0") . ")" }}</x-nav-link>
        <x-nav-link href="{{route('add-trip')}}">{{ __('Add New Trip') }}</x-nav-link>
        <x-nav-link href="{{route('getTrashedTrips')}}">{{ __('Trash') }}</x-nav-link>
    </x-slot>
    @if(session('status'))
    <div class="py-5">
        <span class="notification">{{session('status') }}</span>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($trips) > 0)
                @foreach($trips as $trip)
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>
                        <x-nav-link href="{{ route('get-edit-trip', ['trip' => $trip]) }}">{{$trip->name}}</x-nav-link>
                    </h3>
                    <!-- <h2><a href="edit-trip/{{$trip->slug}}">{{$trip->name}}</a></h2> -->
                    <p>Difficulty: {{$trip->difficulty}}</p>
                    <p>Max-altitude: {{$trip->max_altitude_mtr}} meters / {{round($trip->max_altitude_mtr*3.29)}} ft </p>
                    <p>Category: {{$trip->category->name}}</a></p>
                    @if(isset($trip->user->name))
                    <p>Created by: {{$trip->user->name}}</p>
                    @endif
                    <br>
                    <x-nav-link href="{{ route('get-edit-trip', ['trip' => $trip]) }}">{{ __('Edit') }}</x-nav-link>
                    <form action="{{ route ( 'delete-post', ['trip' => $trip]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="trip_id" value="{{$trip->id}}" />
                        <x-button class="ml-1" name="del_submit" type="submit">Delete Trip</x-button>
                    </form>
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
</x-app-layout>