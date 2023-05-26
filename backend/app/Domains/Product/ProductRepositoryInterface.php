<?php

namespace App\Domains\Product;

interface ProductRepositoryInterface
{
    public function save(Product $product);
    public function findById($id): ?Product;
    public function findAll(): array;
    public function update(Product $product);
    public function delete(Product $product);
}
