<?php

/**
 * Class ProductController
 *
 * This class represents the product controller.
 */
class ProductController
{
    /**
     * @var ProductService The product service.
     */
    private ProductService $productService;

    /**
     * ProductController constructor.
     *
     * Initializes a new instance of the ProductController class.
     */
    public function __construct()
    {
        $this->productService = new ProductService();
    }

    /**
     * The list method of the ProductController class.
     *
     * Retrieves a list of products and sends the response.
     */
    public function list()
    {
        $products = $this->productService->getAllProducts();
        resolve_response(getallheaders()["Accept"], $products);
    }
}

