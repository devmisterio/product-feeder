<?php

/**
 * Class CompanyRepository
 *
 * The `CompanyRepository` class is responsible for database operations related to companies.
 */
class CompanyRepository extends BaseRepository
{
    /**
     * Find a company by its API key.
     *
     * @param string $apiKey The API key of the company to find.
     *
     * @return array|bool An associative array representing the company if found, or false if not found.
     */
    public function findCompanyByApiKey(string $apiKey): array|bool
    {
        try {
            $query = "SELECT * FROM companies WHERE api_key = :apiKey";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':apiKey', $apiKey);
            $stmt->execute();

            // Return the first row (if found) as an associative array, or null if not found.
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exception) {
            var_dump($exception->getMessage());die();
        }
    }
}
