<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Details</title>
</head>
<body>
  <h1>Product Details</h1>

  <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
  <p><strong>Name:</strong> {{ $product->name }}</p>
  <p><strong>Description:</strong> {{ $product->description }}</p>
  <p><strong>Price:</strong> {{ $product->price }}</p>
  <p><strong>Stocks:</strong> {{ $product->stocks }}</p>

  <a href="{{ route('products.index') }}">Back to List</a>
</body>
</html>
