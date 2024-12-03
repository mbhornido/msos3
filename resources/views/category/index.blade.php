<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-adsense-account" content="ca-pub-6444619677143056">
    <link rel="shortcut icon" href="{{asset('images/download2.png')}}" type="image/svg+xml">
    <title>Categories and Product Count</title>
</head>
<body>
    <h1>Categories and Total Products</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Total Products</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->products_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
