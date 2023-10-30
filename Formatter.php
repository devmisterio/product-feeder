<?php

/**
 * Class Formatter
 *
 * The `Formatter` class is responsible for formatting data using a specified formatter implementing `FormatterInterface`.
 */
class Formatter {
    /**
     * @var FormatterInterface The formatter used for data formatting.
     */
    private FormatterInterface $formatter;

    /**
     * Formatter constructor.
     *
     * @param FormatterInterface $formatter The formatter to use for formatting.
     */
    function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;    
    }

    /**
     * Format an array of data using the specified formatter.
     *
     * @param array $data The data to be formatted.
     *
     * @return string The formatted data as a string.
     */
    function format(array $data): string
    {
        return $this->formatter
            ->generate($data)
            ->getFormattedData();
    }

}