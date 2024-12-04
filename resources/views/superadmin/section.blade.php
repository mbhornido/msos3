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
                        <p>Alliance of Coders</p>
                        <p>Super</p>
                    </div>
                </div>
            </div>
            <div class="msos-all-content">
                <header class="msos-header">
                    <div class="msos-logo">Section List</div>
                    {{-- <button class="msos-add-category-btn"><i class="fas fa-plus"></i> Add Category</button> --}}
                </header>
                <div class="msos-content">
                    <form action="{{url('add_section')}}" method="post" >
                        @csrf
                        <div class="unique-form-group">
                            <input type="text" name="section" placeholder="Enter section" class="unique-input-text">
                        </div>
                        <br>
                        <div class="unique-form-group">
                            <input type="submit" value="Add Section" class="unique-submit-button">
                        </div>
                    </form>
                    
                </div>

                <br>
                <div class="msos-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Section Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->section_name}}</td>

                                <td>
                                    <a  class="msos-delete-btn" href="{{url('delete_section',$data->id)}}"
                                    onclick="confirmation(event)"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
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
