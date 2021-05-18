<x-layout title="{{$trip->name}}">
    <div class="padded_section">
        <h1>{{$trip->name}}</h1>
        <p>Difficulty: {{ucfirst($trip->difficulty)}}</p>
        <p>Max Altitude: {{$trip->max_altitude_mtr}} mtr / {{round(($trip->max_altitude_mtr)*3.28)}} ft</p>
        <p>Trip Duration: {{count($trip->itinerary)}} days</p>
        <p>Travel Style: {{$trip->category->name}}</p>
        <h2>Trip Highlights</h2>
        <p>Find some way to json encode</p>
        <h2>Trip Overview</h2>
        <p>Main Trip Introduction (body)</p>
        <h2>Trip Itinerary</h2>
        <ul uk-accordion="collapsible: false multiple : true">
            @foreach ($trip->itinerary as $itinerary)
            <li class="uk-open">
                <a class="uk-accordion-title" href="#">Day {{$itinerary->day}}</a>
                <div class="uk-accordion-content">
                    <h3>{{$itinerary->day_title}}</h3>
                    <p>Altitude: {{$itinerary->day_max_altitude}} meters / {{$itinerary->max_alt_ft()}} ft</p>
                    <p>{{$itinerary->day_body}}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</x-layout>