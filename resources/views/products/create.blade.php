<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Product</title>
</head>
<body>
  <h1>Add New Product</h1>

  <form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="product_id">Product ID:</label>
    <input type="text" name="product_id" id="product_id" required>
    @error('product_id')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    @error('name')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" rows="4" required></textarea>
    @error('description')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>
    @error('price')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <label for="stocks">Stocks:</label>
    <input type="number" name="stocks" id="stocks" required>
    @error('stocks')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit">Add Product</button>
  </form>
</body>
</html>
