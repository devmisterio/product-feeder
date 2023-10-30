<?php

/**
 * Constants for specifying types used in resolving paths.
 */
const TYPE_IS_CLASSES = "classes";
const TYPE_IS_LIBS = "libs";
const TYPE_IS_CONTROLLER = "controllers";
const TYPE_IS_REPOSITORY = "repositories";
const TYPE_IS_SERVICE = "services";
const TYPE_IS_MIDDLEWARE = "middlewares";

/**
 * Resolve the path to a specific file based on its type.
 *
 * @param string $file The file name or path.
 * @param string|null $type The type of the file (e.g., TYPE_IS_CLASSES, TYPE_IS_LIBS).
 *
 * @return string The resolved file path.
 */
if (!function_exists("resolve_path")) {
    function resolve_path(string $file, string $type = null): string
    {
        // Define the base directory where the file will be resolved from.
        $baseDir = __DIR__ . DIRECTORY_SEPARATOR . "..";

        // Use a match statement to handle different file types and resolve their paths accordingly.
        return match ($type) {
            TYPE_IS_CLASSES => $baseDir . DIRECTORY_SEPARATOR . TYPE_IS_CLASSES . DIRECTORY_SEPARATOR . $file,
            TYPE_IS_LIBS => __DIR__ . DIRECTORY_SEPARATOR . $file,
            TYPE_IS_CONTROLLER => $baseDir . DIRECTORY_SEPARATOR . TYPE_IS_CONTROLLER . DIRECTORY_SEPARATOR . $file,
            TYPE_IS_REPOSITORY => $baseDir . DIRECTORY_SEPARATOR . TYPE_IS_REPOSITORY . DIRECTORY_SEPARATOR . $file,
            TYPE_IS_SERVICE => $baseDir . DIRECTORY_SEPARATOR . TYPE_IS_SERVICE . DIRECTORY_SEPARATOR . $file,
            TYPE_IS_MIDDLEWARE => $baseDir . DIRECTORY_SEPARATOR . TYPE_IS_MIDDLEWARE . DIRECTORY_SEPARATOR . $file,
            default => $baseDir . DIRECTORY_SEPARATOR . $file,
        };
    }
}

/**
 * Constants for specifying response types.
 */
const RESPONSE_TYPE_JSON = 'application/json';
const RESPONSE_TYPE_XML = 'application/xml';

/**
 * Resolve the response format and send the response.
 *
 * @param string $responseType The desired response type (e.g., RESPONSE_TYPE_JSON, RESPONSE_TYPE_XML).
 * @param array|null $responseBody The response body data.
 */
if (!function_exists("resolve_response")) {
    function resolve_response(string $responseType = RESPONSE_TYPE_JSON, array $responseBody = null): void
    {
        // Initialize a JSON formatter by default.
        $format = new JsonFormatter();

        // Check if the desired response type is XML, and if so, use an XML formatter.
        if ($responseType == RESPONSE_TYPE_XML) {
            $format = new XmlFormatter();
        }

        // Create a formatter based on the response format.
        $formatter = new Formatter($format);

        // Set the response content type.
        header('Content-Type: ' . $responseType);

        // Print the formatted response body and exit.
        print_r($formatter->format($responseBody));
        exit();
    }
}

