<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Seller Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/super.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="msos-container">

              
    @include('superadmin.header')


        
        <main class="msos-main-content">
            <div class="msos-profile">
                <div class="msos-profile-content">
                    <img src="./images/COTLogo.png" alt="">
                    <div>
                        <p>{{ Auth::user()->name }}</</p>
                        <p>Super</p>
                    </div>
                </div>
            </div>
            
        </main>
    </div>

        <!-- js files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/sweet.js') }}"></script>
    <script>
        document.querySelectorAll('.msos-dropdown-toggle').forEach(item => {
            item.addEventListener('click', () => {
                const dropdown = item.parentElement;
                dropdown.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
