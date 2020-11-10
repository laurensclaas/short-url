<x-app-layout>
    <style>
        table, th, td {
    border: 1px solid black;
    padding: 1em;
}
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short Urls Overview') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table style='border:1px black solid'>
                @foreach ($shortUrls as $shortUrl)
                    
                <div class="card m-b-md">
                        <div class='card-body'>
                            <tr>
                            <td>{{$shortUrl->id}}</td>
                            <td>{{$shortUrl->short_url}}</td>
                            <td>{{$shortUrl->url}}</td>
                            <td>{{$shortUrl->counter}}</td>
                            <td><form action="<?=route('short-urls.edit',$shortUrl)  ?>" method="post">
                                @csrf
                                @method("GET")
                                <input type="submit" value="Edit">
                            </form></td>
                            <td><form action="<?=route('short-urls.delete',$shortUrl) ?>" method="post"> 
                                @csrf
                                @method("delete")
                                <button type="submit">Delete</button>
                            </form></td>
                            </tr>
                        </div>
                    </div>
                
                @endforeach
            </table>
            </div>
        </div>
    </div>
</x-app-layout>

