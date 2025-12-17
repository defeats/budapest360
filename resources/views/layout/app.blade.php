<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budapest360</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layout.header')

    <main class="content-wrapper">
        @yield('content')
    </main>

    @include('layout.footer')

    <script>
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        const userDropdown = document.querySelector('.user-dropdown');

        if(mobileBtn) {
            mobileBtn.addEventListener('click', () => {
                navLinks.classList.toggle('active');
                mobileBtn.classList.toggle('open');
            });
        }
        
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');
        }
    </script>
</body>
</html>