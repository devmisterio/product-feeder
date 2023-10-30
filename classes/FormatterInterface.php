<?php

/**
 * Interface FormatterInterface
 *
 * The `FormatterInterface` interface defines the contract for formatting data into various output formats.
 */
interface FormatterInterface {
    /**
     * Generate formatted data based on the given array.
     *
     * @param array $data The data to format.
     *
     * @return FormatterInterface An instance of the formatter implementing this interface.
     */
    public function generate(array $data) : FormatterInterface;

    /**
     * Get the formatted data as a string.
     *
     * @return string The formatted data as a string.
     */
    public function getFormattedData(): string;
}