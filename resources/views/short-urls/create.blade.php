<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Short Urls Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Maak hier een short URL aan. Deze wordt automatisch gegeneerd na klikken op aanmaken.</p>
                <table>
                    <form action="<?=route('short-urls.store')  ?>" method="POST">
                        @csrf
                        @method("POST")
                        <tr>
                            <td>
                            <input size='90' name="url" placeholder="Vul hier een url in die u wil verkorten"  autocomplete="off" required>
                            </td>
                        </tr>
                       <tr>
                            <td>
                                <input type="submit" value="Aanmaken">
                            </td>
                       </tr>         
                    </form>   
                </table>
            </div>
        </div>
    </div>
</x-app-layout>