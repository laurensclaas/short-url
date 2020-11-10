<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short Url Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Hier kun je deze short url bijwerken.</p>
                <table>
                    <form action="<?=route('short-urls.update',$short_url)  ?>" method="POST">
                        @csrf
                        @method("PUT")
                        <tr>
                            <td>
                                <label for='short_url'><b>Short URL:</b> </label>
                            <input id='short_url' name="short_url" placeholder="Product naam" value="{{$short_url->short_url}}" autocomplete="off" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='url'><b>URL:</b></label>
                            <input size='90' name='url' id='url' value="{{$short_url->url}}" autocomplete="off" required>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <input type="submit" value="Bijwerken">
                            </td>
                       </tr>         
                    </form>   
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
