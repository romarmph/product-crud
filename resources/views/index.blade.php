<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Table</title>
</head>
<body>
  <!-- Add Product Button -->
  <a href="{{ route('products.create') }}">Add Product</a>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stocks</th>
        <th>Quantity</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stocks }}</td>
        <td></td> <!-- Adjust this column for your specific use case -->
        <td>
          <a href="{{ route('products.show', $product) }}">View</a>
          <a href="{{ route('products.edit', $product) }}">Edit</a>

          <!-- Delete Form -->
          <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
          </form>

          <!-- Purchase Form -->
          <form action="{{ route('products.purchase', $product) }}" method="POST" style="display: inline-block">
            @csrf
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1">
            <button type="submit">Purchase</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
