<?php

/**
 * Class ProductService
 *
 * The `ProductService` class acts as an intermediary between the controller and the product repository. It handles
 * business logic related to products and utilizes the `ProductRepository` for database operations.
 */
class ProductService
{
    /**
     * @var ProductRepository The repository for product-related database operations.
     */
    private ProductRepository $productRepository;

    /**
     * Constructor for creating a `ProductService` instance.
     */
    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    /**
     * Retrieve all products from the database.
     *
     * @return array|bool An array of associative arrays representing products, or false if an error occurs.
     */
    public function getAllProducts(): bool|array
    {
        return $this->productRepository->getAll();
    }
}
