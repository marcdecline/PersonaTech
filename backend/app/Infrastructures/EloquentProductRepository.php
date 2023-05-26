<?php

namespace App\Infrastructures;

use App\Domains\Product\Product;
use App\Domains\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product)
    {
        return DB::table('products')->insert([
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice()
        ]);
    }

    public function findById($id): ?Product
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (!$product) {
            return null;
        }
        return new Product($product->id, $product->name, $product->description, $product->price);
    }

    public function findAll(): array
    {
        // Transforma cada registro de la base de datos en un objeto Product y los devuelve como un array
        return array_map(function ($product) {
            return new Product($product->id, $product->name, $product->description, $product->price);
        }, DB::table('products')->get()->all());
    }

    public function update(Product $product)
    {
        return DB::table('products')->where('id', $product->getId())->update([
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice()
        ]);
    }

    public function delete(Product $product)
    {
        return DB::table('products')->where('id', $product->getId())->delete();
    }
}
