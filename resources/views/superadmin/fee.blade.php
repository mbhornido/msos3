<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSOS | Shipping Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/super.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="msos-container">
        @include('superadmin.header')

        <main class="msos-main-content">
            <div class="msos-profile">
                <div class="msos-profile-content">
                    <img src="./images/COTLogo.png" alt="Logo">
                    <div>
                        <p>Alliance of Coders</p>
                        <p>Super</p>
                    </div>
                </div>
            </div>

            <div class="msos-all-content">
                <header class="msos-header">
                    <div class="msos-logo">Shipping Status</div>
                </header>

                {{-- <div class="msos-content">
                    <h3 class="msos-title">Add Shipping Status</h3>
                    <form action="{{url('add_fee')}}" method="post" class="msos-form">
                        @csrf
                        <div class="unique-form-group">
                            <input 
                                type="number" 
                                name="fee" 
                                placeholder="Enter fee price" 
                                class="unique-input-text">
                        </div>
                        <div class="unique-form-group">
                            <input 
                                type="submit" 
                                value="Add Fee" 
                                class="unique-submit-button">
                        </div>
                    </form>
                </div> --}}

                <div class="msos-content">
                    <h3 class="msos-title">Shipping Fees</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $fee)
                            <tr>
                                <td>₱{{ number_format($fee->general_fee, 2) }}</td>
                                <td>
                                    <a 
                                        class="msos-update-btn" 
                                        href="{{url('edit_fee', $fee->id)}}">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <br><br><br>
                @if(isset($editFee))
                <div class="msos-content">
                    <h3 class="msos-title">Update Shipping Fee</h3>
                    <form action="{{url('update_fee', $editFee->id)}}" method="post" class="msos-form">
                        @csrf
                        <div class="unique-form-group">
                            <input 
                                type="number" 
                                name="fee" 
                                value="{{$editFee->general_fee}}" 
                                placeholder="Enter updated fee price" 
                                class="unique-input-text">
                        </div>
                        <div class="unique-form-group">
                            <input 
                                type="submit" 
                                value="Update Fee" 
                                class="unique-submit-button">
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </main>
    </div>

    <!-- JS Files -->
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
