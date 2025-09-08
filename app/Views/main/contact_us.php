<main class="w-full mx-auto mt-14 md:mt-24 py-1">
    <div class="container mx-auto py-1 my-7 md:my-14 p-5">
        <div class="text-center mb-4 md:mb-14">
            <h1 class="text-3xl font-bold">Hubungi Kami</h1>
            <!-- Bouncing dots -->
            <div class="flex justify-center gap-2 mt-3 h-5">
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:0ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:200ms]"></span>
                <span class="w-3 h-3 bg-blue-600 rounded-full animate-bounce [animation-delay:400ms]"></span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-10">
            <div class="border rounded-md shadow-sm p-4 z-10">
                <div id="map" class="relative w-full h-[500px] rounded shadow"></div>
            </div>
            <div class="border rounded-md shadow-sm p-5">
                <h2 class="text-2xl font-bold">Informasi Kontak</h2>
                <div class="text-base">
                    <div class="flex flex-1 items-center gap-2 mt-4">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Jl. Lamongrejo No.77, Krajan, Jetis, Kec. Lamongan,
                            Kabupaten Lamongan, Jawa Timur 62214</p>
                    </div>
                    <div class="flex flex-1 items-center gap-2 mt-4">
                        <i class="fa-solid fa-phone"></i>
                        <p>(0322) 314 999</p>
                    </div>
                    <div class="flex flex-1 items-center gap-2 mt-4">
                        <i class="fa-solid fa-fax"></i>
                        <p>(0322) 324 999</p>
                    </div>
                    <div class="flex flex-1 items-center gap-2 mt-4">
                        <i class="fa-solid fa-envelope"></i>
                        <p>bank.madinah@gmail.com</p>
                    </div>
                    <div class="flex flex-1 items-center gap-2 mt-4">
                        <i class="fa-solid fa-globe"></i>
                        <p>bprsmadinahlamongan.co.id</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([-7.1165784, 112.4151586], 14);
        // Layer Peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);

        // Data Lokasi dari PHP
        const locations = <?= json_encode($locations) ?>;

        locations.forEach(loc => {
            L.marker([loc.latitude, loc.longitude])
                .addTo(map)
                .bindTooltip(loc.name, {
                    permanent: true, // supaya selalu kelihatan
                    direction: 'top', // posisi label di atas marker
                    offset: [0, -10] // jarak dari marker
                })
                .openTooltip(); // langsung buka tooltip
        });
    });
</script>