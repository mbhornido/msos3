<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User: {{ $user->name }}</h1>
    <form action="{{url('user_update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required><br>

        <label for="shop_name">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name" value="{{ old('shop_name', $user->shop_name) }}"><br>

        <label for="view_shop">View Shop:</label>
        <input type="text" id="view_shop" name="view_shop" value="{{ old('view_shop', $user->view_shop) }}"><br>

        <label for="college">College:</label>
        <input type="text" id="college" name="college" value="{{ old('college', $user->college) }}"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"><br>

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo"><br>
        @if($user->logo)
            <img src="{{ asset('logo/' . $user->logo) }}" alt="Current Logo" style="max-width: 100px;"><br>
        @endif

        <button type="submit">Update User</button>
    </form>
</body>
</html>
