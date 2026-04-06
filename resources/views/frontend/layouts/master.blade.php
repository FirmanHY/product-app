<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('frontend.layouts.head')
</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    @include('frontend.layouts.notification')
    <!-- Header -->
    @include('frontend.layouts.header')
    <!--/ End Header -->
    @yield('main-content')

    @include('frontend.layouts.footer')

    <script>
        const PLACEHOLDER = '/images/placeholder.svg';

        function fixImg(img) {
            if (!img.src || img.src === window.location.href || img.getAttribute('src') === '') {
                img.src = PLACEHOLDER;
            }
        }

        document.addEventListener('error', function(e) {
            if (e.target.tagName === 'IMG') {
                e.target.onerror = null;
                e.target.src = PLACEHOLDER;
            }
        }, true);

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('img').forEach(fixImg);
        });
    </script>

</body>

</html>
