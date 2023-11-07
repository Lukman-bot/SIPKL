<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
</head>
<body>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product['name'] }} </li>
        @endforeach
    </ul>
</body>
</html>