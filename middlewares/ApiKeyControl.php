<?php

/**
 * Class ApiKeyControl
 *
 * This class is responsible for handling API authentication based on an API key.
 */
class ApiKeyControl
{
    /**
     * Handle API key authentication.
     *
     * This method checks the provided API key and verifies the company's existence.
     */
    public function handle(): void
    {
        // Get the 'Authentication-Token' header to extract the API key.
        $authToken = getallheaders()['Authentication-Token'] ?? null;
        if (!$authToken) {
            resolve_response(responseBody: ['message' => 'Authentication Token Is Required In Request Header']);
        }

        // Create a CompanyService instance to interact with company-related data.
        $companyService = new CompanyService();

        // Check if the provided API key exists in the company records.
        $companyIsExist = $companyService->getCompanyByApiKey($authToken);

        // If the company does not exist or the API key is invalid, return an error response.
        if (!$companyIsExist) {
            resolve_response(getallheaders()['Accept'], ['message' => 'Invalid Authentication Token']);
        }
    }
}