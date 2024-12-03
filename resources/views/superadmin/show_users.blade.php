<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>All Users</h1>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Shop Name</th>
                <th>View Shop</th>
                <th>College</th>
                <th>Logo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->shop_name }}</td>
                    <td>{{ $user->view_shop }}</td>
                    <td>{{ $user->college }}</td>
                    <td>
                        <img src="{{ asset('logo/' . $user->logo) }}" alt="Logo">
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="{{ url('user_edit', $user->id) }}">Edit</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
