<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
                        <div
                            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">IP Information</h5>
                            <div class="flex items-baseline text-gray-900 dark:text-white">
                                <span class="text-3xl font-semibold"></span>
                                <span class="text-5xl font-extrabold tracking-tight">IP: {{ $history->ip }}</span>
                                <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400"></span>
                            </div>
                            <ul role="list" class="space-y-5 my-7">
                                <li class="flex space-x-3 items-center">
                                    <span
                                        class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Continent:
                                        {{ $history->continentName }}</span>
                                </li>
                                <li class="flex space-x-3">
                                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                        City: {{ $history->city }}</span>
                                </li>
                                <li class="flex space-x-3">
                                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
                                        Capital: {{ $history->capital }}</span>
                                </li>
                                <li class="flex space-x-3">
                                    <span
                                        class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Postal
                                        Code: {{ $history->postalCode }}</span>
                                </li>
                                <li class="flex space-x-3 decoration-gray-500">
                                    <span class="text-base font-normal leading-tight text-gray-500">Latitud:
                                        {{ $history->latitude }}</span>
                                </li>
                                <li class="flex space-x-3 decoration-gray-500 mb-5">
                                    <span class="text-base font-normal leading-tight text-gray-500">Longuitud:
                                        {{ $history->longitude }}</span>
                                </li>
                                <li>
                                    <a href="{{ url()->previous() }}"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Go
                                        Back</a>
                                    <a href="{{ route('dashboard') }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Go
                                        Search</a>
                                </li>
                            </ul>
                        </div>
                        <!-- ... -->
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <h4 class="mb-2 text-xl font-medium text-gray-500 dark:text-gray-400">IP Geolocalization
                            </h4>
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // center of the map
    var center = [{{ $history->longitude }}, {{ $history->latitude }}];

    // Create the map
    var map = L.map('map').setView(center, 3);

    // Set up the OSM layer
    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(map);
    // show the scale bar on the lower left corner
    L.control.scale({
        imperial: true,
        metric: true
    }).addTo(map);
    // add a marker in the given location
    L.marker(center).addTo(map);
</script>
