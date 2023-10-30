<?php

/**
 * Class JsonFormatter
 *
 * The `JsonFormatter` class implements the `FormatterInterface` to format data into JSON format.
 */
class JsonFormatter implements FormatterInterface {

    /**
     * @var string The formatted data in JSON format.
     */
    private string $formattedData;

    /**
     * Generate JSON formatted data based on the given array.
     *
     * @param array $data The data to format into JSON.
     *
     * @return FormatterInterface An instance of the JSON formatter.
     */
    public function generate(array $data): FormatterInterface
    {
        $this->formattedData = json_encode($data, true);
        return $this;
    }

    /**
     * Get the JSON formatted data as a string.
     *
     * @return string The JSON formatted data as a string.
     */
    public function getFormattedData(): string
    {
        return $this->formattedData;
    }
}