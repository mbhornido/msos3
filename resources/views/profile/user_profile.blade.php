<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MSOS | Profile</title>
  <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

  <link rel="stylesheet" href="{{ asset('css/css_file.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .toast {
      z-index: 99;
    }

    .lhide{
      display: none;
    }
  </style>
</head>
<body> 

<div class="container">
  <!-- Include Headers -->
  @include('includers.mobile_back_header')
  @include('includers.user_header')

  <div class="order-container">
    <!-- Sidebar -->
    <div class="order-sidebar hide">
      <div class="order-profile">
        <div class="order-profile-pic">
            <img  src="{{ $user->logo && file_exists(public_path('logo/' . $user->logo)) ? asset('logo/' . $user->logo) : asset('images/default.png') }}"  alt="M" />
          
        </div>
        <div class="order-profile-info">
          <p class="order-username">{{ $user->name ?? 'User Name' }}</p>
          <a href="#" class="order-edit-profile"><i class="fa-solid fa-pen"></i> Edit Profile</a>
        </div>
      </div>
      <hr>
      <nav class="order-nav">
            <a href="{{url('profile_edit')}}" class="order-nav-item active"><i class="fa-regular fa-user"></i> My Account</a>
            <a href="{{url('order_status')}}" class="order-nav-item"><i class="fa-solid fa-table-list"></i> My Purchase</a>
            <a href="{{url('update_password')}}" class="order-nav-item"><i class="fa-solid fa-lock"></i> Password</a>
            
            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}" class="order-nav-item logout-form" >
                @csrf
                <a class="logout-link"  style="color: black;" href="{{ route('logout') }}"
                onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </form>
        </nav>


    </div>
    
    <!-- Main Content -->
    <div class="profile-container">
      <h1 class="profile-title">My Profile</h1>
      <p class="profile-subtitle">Manage and protect your account</p>
      <hr>

      <form method="post" action="{{ url('profile_user') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="profile-content">
          <!-- Left Side Form -->
          <div class="profile-form">
            <label for="name" class="profile-label">Name</label>
            <input type="text" id="name" name="name" class="profile-input" placeholder="Enter your name" value="{{ old('name', $user->name) }}" required>

            <label for="email" class="profile-label">Email</label>
            <input type="email" id="email" name="email" class="profile-input" value="{{ old('email', $user->email) }}" required>

                            <div class="form-group lhide">
                                <label for="shop_name">Shop Name</label>
                                <input type="text" name="shop_name" id="shop_name" class="form-control" placeholder="Castilo" value="{{ old('shop_name', $user->shop_name) }}" >
                            </div>
                       

                        
                            <div class="form-group lhide">
                                <label for="college">Department</label>
                                <select name="college" id="college" class="form-control">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->department_name }}" {{ old('college', $user->college) == $department->department_name ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        


            <label for="phone" class="profile-label">ID Number</label>
            <input type="number" id="phone" name="phone" class="profile-input" placeholder="Enter your ID Number" value="{{ old('phone', $user->phone) }}"  maxlength="7" 
            oninput="if(this.value.length > 7) this.value = this.value.slice(0, 7);" 
             required>

            <label for="address" class="profile-label">Address</label>
            <select name="address" id="address" class="profile-input">
              @foreach ($sections as $section)
                <option value="{{ $section->section_name }}" {{ old('address', $user->address) == $section->section_name ? 'selected' : '' }}>
                  {{ $section->section_name }}
                </option>
              @endforeach
            </select>
          </div>
          
          <!-- Right Side Profile Image -->
          <div class="profile-image-section">
            <div class="profile-image">

              <img id="blah" src="{{ $user->logo && file_exists(public_path('logo/' . $user->logo)) ? asset('logo/' . $user->logo) : asset('images/default.png') }}"  alt="M" width="50" />

            </div>
            <label for="imgInp" class="profile-image-btn">Upload Image</label>
            <input type="file" id="imgInp" name="logo" class="profile-input" accept="image/*" onchange="previewImage(event)">
          </div>
        </div>

        <button type="submit" class="profile-save-btn">Save</button>
      </form>
    </div>
  </div>

  <br><br><br>
  <div class="d_hide">
    <br><br><br>
</div>
<footer class="floating-footer">
    <div class="footer-links">
        <a href="{{url('dashboard')}}" class="active">
            <i class="fa-solid fa-house"></i>
            <p class="footer_p">Home</p>
        </a>
        <a href="{{url('seller_department')}}">
            <i class="fa-solid fa-shop"></i>
            <p class="footer_p" >Shops</p>

        </a>
        <a href="{{url('profile_edit')}}">
            <i class="fa-solid fa-circle-info"></i>
            <p class="footer_p">About</p>

        </a>
        <a href="{{url('user_page')}}">
            <i class="fa-solid fa-user"></i>
            <p class="footer_p">User</p>

        </a>
    </div>
</footer>
</div>

<!-- Toastr Notifications -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Success notification
        @if(session('success'))
            toastr.success("{{ session('success') }}", "Success", {
                closeButton: true,
                progressBar: true,
                timeOut: "5000"
            });
        @endif

        // Error notifications (from validation errors)
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}", "Error", {
                    closeButton: true,
                    progressBar: true,
                    timeOut: "5000"
                });
            @endforeach
        @endif
    });
</script>
</body>
</html>
