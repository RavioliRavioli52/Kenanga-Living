<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenanga Living - Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
</head>

<body>

    {{-- Navbar --}}
    @include('homepage.partials.navbar')

    <!-- Header -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contact & Location</h1>
            <p>Informasi kontak dan lokasi Usaha Kenanga Living</p>
        </div>
    </div>

    <!-- MAP -->
    <div id="mapid" style="width:100%; height:350px;"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- MAP SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            var lat = -6.8166;
            var lng = 107.6186;

            var map = L.map('mapid').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup(
                    '<b>Kenanga Living</b><br>' +
                    'Jl. Kenanga V No.22<br>' +
                    'Lembang, Bandung Barat<br><br>' +
                    '<a href="https://www.google.com/maps?q=' + lat + ',' + lng + '" ' +
                    'target="_blank" class="btn btn-success btn-sm">' +
                    'Buka di Google Maps</a>'
                )
                .openPopup();

            map.scrollWheelZoom.disable();
        });
    </script>

    <!-- CONTACT INFO -->
    <div class="container py-5">
        <div class="row text-center">

            <div class="col-md-3 mb-4">
                <i class="fa fa-map-marker fa-3x text-success mb-3"></i>
                <h5>Alamat</h5>
                <p>
                    Jl. Kenanga V No.22<br>
                    Lembang, Bandung Barat<br>
                    Jawa Barat 40391
                </p>
            </div>

            <div class="col-md-3 mb-4">
                <i class="fa fa-phone fa-3x text-success mb-3"></i>
                <h5>Telepon</h5>
                <p>
                    <a href="tel:081320578707" class="text-decoration-none">
                        0813-2057-8707
                    </a>
                </p>
            </div>

            <div class="col-md-3 mb-4">
                <i class="fab fa-whatsapp fa-3x text-success mb-3"></i>
                <h5>WhatsApp</h5>
                <p>
                    <a href="https://wa.me/6281320578707" target="_blank"
                        class="text-decoration-none">
                        Chat WhatsApp
                    </a>
                </p>
            </div>

            <div class="col-md-3 mb-4">
                <i class="fa fa-envelope fa-3x text-success mb-3"></i>
                <h5>Email</h5>
                <p>
                    <a href="mailto:info@kenangaliving.com" class="text-decoration-none">
                        info@kenangaliving.com
                    </a>
                </p>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">
                &copy; 2025 Kenanga Living | Created by Kelompok 4
            </p>
        </div>
    </footer>

    <!-- JS -->
    <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/templatemo.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
