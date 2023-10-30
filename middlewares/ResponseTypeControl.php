<?php

/**
 * Class ResponseTypeControl
 *
 * This class is responsible for controlling and validating the response type based on the 'Accept' header.
 */
class ResponseTypeControl
{
    /**
     * An array containing valid response types, e.g., 'application/xml' and 'application/json'.
     */
    const VALID_RESPONSE_TYPES = [RESPONSE_TYPE_XML, RESPONSE_TYPE_JSON];

    /**
     * Handle response type validation.
     *
     * This method checks the 'Accept' header to ensure it matches one of the valid response types.
     * If the response type is unsupported, it will return an error message.
     */
    public function handle(): void
    {
        // Get the 'Accept' header to determine the requested response type.
        $responseType = getallheaders()['Accept'] ?? null;
        if (!$responseType) {
            resolve_response(responseBody: ['message' => 'Accept Key Is Required In Request Header']);
        }

        // Check if the response type is in the list of valid response types.
        if (!in_array($responseType, self::VALID_RESPONSE_TYPES)) {
            echo "Unsupported Response Type";
            exit();
        }
    }
}