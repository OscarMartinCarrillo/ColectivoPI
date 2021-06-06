<x-app-layout>
        <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="m-auto text-3xl font-bold mb-8 mt-4">
                Donde encontrarnos
            </p>
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-200 border-8 border-white shadow-lg">
                    <h1 class="text-center text-4xl font-bold my-3">Nuestra Sede</h1>
                    <div class="px-5 py-10 items-center mx-auto max-h-4/5">
                        <div class="flex flex-col lg:flex-row">
                            <div class="relative h-64 sm:h-80 w-full lg:h-auto lg:w-1/3 xl:w-2/5 flex-none">
                                <div id="mapid" class="w-full h-96 shadow-2xl "></div>
                            </div>
                            <div class="w-full">
                                <div class="p-8">
                                    <div class="m-3">
                                        <div class="grid grid-cols-3">
                                            <div class="row-span-1"><strong>Dirección: </strong></div>
                                            <div class="col-span-2 row-span-1">
                                                <p class="ml-2">Alfahari, 6, <br> 04820 Vélez-Rubio, Almería</p>
                                            </div>
                                            <div class="row-span-2 mt-4"><strong> Horario:</strong></div>
                                            <div class="col-span-2 mt-4">
                                                <p class="ml-2">V 17:00 - 23:00</p>
                                            </div>
                                            <div class="col-span-2">
                                                <p class="ml-2">S 16:00 - 21:00</p>
                                            </div>
                                            <div class="col-span-2 col-start-2">
                                                <p class="ml-2">D 16:00 - 19:00</p>
                                            </div>
                                            <div class="mt-4">
                                                <p class="font-bold">Telefono de <br> contacto:</p>
                                            </div>
                                            <div class="mt-6">681956882</div>
                                        </div>
                                        <div class="m-12">No olvide traer ganas de divertirse, le esperamos.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        var mymap = L.map('mapid').setView([37.646311, -2.076953], 17);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        var marker = L.marker([37.646311, -2.076953]).addTo(mymap);
        marker.bindPopup("<b>Aqui estamos!</b>").openPopup();

    </script>
</x-app-layout>
