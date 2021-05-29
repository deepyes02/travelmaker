<x-layout title="Trips">
<div class="padded_section">
<h2>Trips with category</h2>
@if(count($trips)>0)
<div class="trips_container">
    @foreach($trips as $trip)
    <div class="trip_inner">
        <h2><a href="trips/{{$trip->slug}}">{{$trip->name}}</a></h2>
        <p>Difficulty: {{$trip->difficulty}}</p>
        <p>Max-altitude: {{$trip->max_altitude_mtr}} meters / {{round($trip->max_altitude_mtr * 3.2)}} ft</p>
        <p>Category: <a href="{{$trip->category->slug}}">{{$trip->category->name}}</a></p>
        <p>Created at: {{$trip->convertDate($trip->created_at)}}</p>
    </div>
    @endforeach
</div>
@else
<h3>sorry no trips available, add some in the database</h3>
@endif
</div>
</x-layout>