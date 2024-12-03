<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
</head>
<body>
    <h1>Admin</h1>
    <a href="welcome">asd</a>


    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <input type="submit" value="Logout">
                        </form>
</body>
</html>