<?php

/**
 * Class CompanyService
 *
 * The `CompanyService` class serves as a bridge between the controller and the company repository, focusing on
 * business logic related to companies. It uses the `CompanyRepository` to interact with the database.
 */
class CompanyService
{
    /**
     * @var CompanyRepository The repository for company-related database operations.
     */
    private CompanyRepository $companyRepository;

    /**
     * Constructor to create a `CompanyService` instance.
     */
    public function __construct()
    {
        $this->companyRepository = new CompanyRepository();
    }

    /**
     * Retrieve a company by its API key.
     *
     * @param string $apiKey The API key associated with the company.
     *
     * @return array|bool An associative array representing the company or false if not found.
     */
    public function getCompanyByApiKey(string $apiKey): array|bool
    {
        return $this->companyRepository->findCompanyByApiKey($apiKey);
    }
}
