<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>MSOS ADMIN</title>

<link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">

    <link rel="stylesheet" href="{{asset('css_admin/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/animate.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css_admin/new.css')}}">

    <style>
        /* Main chat container */
/* Main chat container */
.admin_chat_main {
    display: flex;            /* Enables Flexbox */
    height: 90vh;            /* Full-screen height */
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;                /* Remove default margin */
}

/* Sidebar for user list */
.chat_container {
    width: 25%;               /* Sidebar width */
    background-color: #2c3e50;
    color: white;
    display: flex;
    flex-direction: column;
    padding: 20px;
    overflow-y: auto;         /* Enable scroll if content overflows */
}

/* Chat message area */
.chat_message {
    flex-grow: 1;             /* Takes remaining width */
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
    overflow-y: auto;         /* Enable scroll if needed */
}

        .chat_container h1, .chat_container h2 {
            margin: 0 0 15px 0;
        }

        .chat_container ul {
            list-style: none;
            padding: 0;
        }

        .chat_container li {
            margin: 10px 0;
        }

        .chat_container a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .chat_container a:hover {
            background-color: #34495e;
        }


        .chat_message p {
            font-size: 1.5em;
            color: #333;
        }

        /* For active chat */
        .active-user {
            background-color: #1abc9c;
        }
    </style>
    
</head>
<body>

@include('includes.admin_header')


<div class="page-wrapper">
        <main class="admin_chat_main">
            <!-- User List Sidebar -->
            <div class="chat_container">
                <h1>Dashboard</h1>
                <h2>Users</h2>
                <ul>
                    @forelse($users as $user)
                        <li>
                            <a href="{{ url('chat', $user->id) }}">{{ $user->name }}</a>
                            <hr>
                        </li>
                    @empty
                        <li>No recent chats available.</li>
                    @endforelse
                </ul>
            </div>
    
            <!-- Chat Message Area -->
            <div class="chat_message">
                <p>Select a user to start a chat</p>
            </div>
        </main>
</div>


<script src="{{ asset('js_admin/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js_admin/feather.min.js') }}"></script>
<script src="{{ asset('js_admin/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js_admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js_admin/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js_admin/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalerts.min.js') }}"></script>
<script src="{{ asset('js_admin/script.js') }}"></script>


</body>
</html>

