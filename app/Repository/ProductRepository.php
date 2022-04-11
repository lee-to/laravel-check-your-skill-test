<?php

namespace App\Repository;

use App\Models\Item;

class ProductRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Item();
    }

    /**
     * @param array $data
     * @return Item
     */
    public function create(array $data): Item
    {
        $product = new Item();
        $product->load($data);
        $product->save();

        return $product;
    }

    /**
     * @param Item $product
     * @param array $data
     * @return Item
     */
    public function update(Item $product, array $data): Item
    {
        $product->load($data);
        $product->save();

        return $product;
    }

    /**
     * @param array $data
     */
    public function deleteItems(array $ids): void
    {
        Item::whereIn('id', $ids)->delete();
    }
}