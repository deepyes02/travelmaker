<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
        <x-nav-link href="{{route('getcategories')}}">{{ __('All Categores (') . (count($categories) > 0 ? count($categories) : "Add some") . ")" }}</x-nav-link>
        <x-nav-link href="{{route('add-trip')}}">{{ __('Add New Category(need work)') }}</x-nav-link>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($categories) > 0)
                @foreach($categories as $category)
                <div class="p-6 bg-white border-b border-gray-200">
                <x-nav-link href="#">{{$category->name}}</x-nav-link> <x-nav-link href="#">{{count($category->trips) !==  1 ? count($category->trips) . ' trips' : count($category->trips) . ' trip' }}</x-nav-link>
                
                        <x-nav-link href="#">{{ __('Edit') }}</x-nav-link>
                    <x-nav-link href="#">{{ __('Delete') }}</x-nav-link>
                </div>
                @endforeach
                @else
                <div class="p-6 bg-white border-b border-gray-200">
                    No Categories available. Add some to get started
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>