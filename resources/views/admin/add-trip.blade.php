<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Trip') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <form action="" method="POST">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/4" for="trip_name">Trip Name</x-label>
                        <x-input class="w-3/4" name="trip_name" id="trip_name" type="text" placeholder="trip name" />
                    </div>
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/5" for="trip_slug">SEO Slug</x-label>
                        <x-button class="ml-1" id="button">Insert SEO Friendly URL</x-button>
                        <x-input class="w-3/5" name="trip_slug" id="trip_slug" type="text" placeholder="seo-friendly-slug" value="" />
                        <script>
                        const trip_name = document.getElementById('trip_name');
                        const button = document.getElementById('button');
                        const trip_slug = document.getElementById('trip_slug');
                        button.addEventListener('click', (e)=>{
                            e.preventDefault();
                            trip_slug.value = trip_name.value.split(" ").join('-').toLowerCase();
                        });
                        </script>
                    </div>
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/4" for="trip_difficulty">Trip Difficulty</x-label>
                        <x-input class="w-3/4" name="trip_difficulty" type="text" placeholder="easy,medium,hard" />
                    </div>
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/4" for="trip_max_alt_mtr">Max Altitude in Meters</x-label>
                        <x-input class="w-3/4" name="trip_max_alt_mtr" type="number" placeholder="in meters" />
                    </div>
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/4" for="category">Category</x-label>
                        <select name="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <x-button class="ml-1" name="submit" type="submit">Add Trip</x-button>

            </div>
        </form>
    </div>
</x-app-layout>