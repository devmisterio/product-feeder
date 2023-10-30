<?php

/**
 * Class ProductRepository
 *
 * The `ProductRepository` class is responsible for database operations related to products.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Retrieve all products from the database.
     *
     * @return array|bool An array of associative arrays representing products, or false if an error occurs.
     */
    public function getAll(): bool|array
    {
        $query = "SELECT * FROM products";
        $result = $this->db->query($query);

        if ($result === false) {
            // An error occurred during the database query.
            return false;
        }

        // Return all rows as an array of associative arrays.
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
