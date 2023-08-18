<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::all();
    return view('index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('products.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate input
    $request->validate([
      'product_id' => 'required|unique:products',
      'name' => 'required',
      'description' => 'required',
      'price' => 'required|numeric|min:0',
      'stocks' => 'required|integer|min:0',
    ]);

    // Create the product
    Product::create($request->all());

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
  }


  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    return view('products.show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    return view('products.edit', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    // Validate input
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'price' => 'required|numeric|min:0',
      'stocks' => 'required|integer|min:0',
    ]);

    // Update the product
    $product->update($request->all());

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    // Delete the product
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
  }

  private function generateUniqueInvoiceNumber()
  {
    $invoiceNumber = 'INV' . date('Ymd') . strtoupper(substr(uniqid(), -6));

    // Ensure the invoice number is unique
    while (Transaction::where('invoice_number', $invoiceNumber)->exists()) {
      $invoiceNumber = 'INV' . date('Ymd') . strtoupper(substr(uniqid(), -6));
    }

    return $invoiceNumber;
  }

  /**
   * Purchase a product.
   */
  public function purchase(Request $request, Product $product)
  {
    // Validate input
    $request->validate([
      'quantity' => 'required|integer|min:1',
    ]);

    // Ensure available stocks
    if ($product->stocks < $request->quantity) {
      return redirect()->route('products.index')->with('error', 'Insufficient stocks.');
    }

    // Perform the purchase
    $transaction = new Transaction([
      'invoice_number' => $this->generateUniqueInvoiceNumber(), // Implement this function
      'quantity' => $request->quantity,
    ]);

    $product->transactions()->save($transaction);
    $product->decrement('stocks', $request->quantity);

    return redirect()->route('products.index')->with('success', 'Product purchased successfully.');
  }
}
