<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short Urls Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($short_urls as $short_url)
                            <div class="card m-b-md">
                                <div class='card-body'>
                                    {{$short_url->id}}
                                    {{$short_url->short_url}}
                                    {{$short_url->url}}
                                </div>
                            </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

