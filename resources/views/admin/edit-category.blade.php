<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editing Category') }}
        </h2>
    </x-slot>
    @if(session('status'))
    <div class="py-5">
        <span class="notification">{{session('status') }}</span>
    </div>
    @endif
    <div class="py-5">
    <form id="updateCategory">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                    <input type="hidden" name="category_id" value="{{$category->id}}"/>
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/4" for="category_name">Category Name</x-label>
                        <x-input class="w-3/4" name="category_name" id="category_name" type="text" placeholder="category name" value="{{ $category->name }}" />
                    </div>
                    <div class="flex flex-wrap justify-around items-center p-6 bg-white border-b border-gray-200">
                        <x-label class="w-1/5" for="category_slug">SEO Slug</x-label>
                        <x-button class="ml-1" id="button">Insert SEO Friendly URL</x-button>
                        <x-input class="w-3/5" name="category_slug" id="category_slug" type="text" placeholder="seo-friendly-slug" value="{{ $category->slug }}" />
                        <script>
                        const category_name = document.getElementById('category_name');
                        const button = document.getElementById('button');
                        const category_slug = document.getElementById('category_slug');
                        button.addEventListener('click', (e)=>{
                            e.preventDefault();
                            category_slug.value = category_name.value.split(" ").join('-').toLowerCase();
                        });
                        </script>
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
                <x-button class="ml-1" name="submit" type="submit" id="updateSubmit">Update Category</x-button>
            </div>
        </form>
        <div class=" mt-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Available Categories</h2>
        <div class="flex flex-wrap justify-between items-center p-6 bg-white border-b border-gray-200">
                        
                        <ul>
                        @foreach($categories as $category)
                        <li>{{$category->name}}</li>
                        @endforeach
                        </ul>
                    </div>
        </div>
        </div>
    </div>
    <script>
    //ajax using jquery
        $("#updateSubmit").click(function(event){
            event.preventDefault();

            //input selectors
            let category_name = $("input[name=category_name]").val();
            let category_slug = $("input[name=category_slug").val();
            let _token = $('meta[name="csrf-token"]').attr('content');

            //ajax function
            let url = "<?php echo route ( 'edit-category', ['category' => $category] ) ?>";
            $.ajax({
                url: url,
                type: "POST",
                data:
                {
                    category_name:category_name,
                    category_slug:category_slug,
                    _token:_token
                },

                success:
                function (response) {
                    console.log(response);
                }
            })

        })
    </script>
</x-app-layout>