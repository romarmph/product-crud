<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'product_id',
    'name',
    'description',
    'price',
    'stocks',
  ];

  /**
   * Get the transactions for the product.
   */
  public function transactions()
  {
    return $this->hasMany(Transaction::class);
  }
}
