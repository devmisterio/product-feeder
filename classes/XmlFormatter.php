<?php

/**
 * Class XmlFormatter
 *
 * The `XmlFormatter` class implements the `FormatterInterface` to format data into XML format.
 */
class XmlFormatter implements FormatterInterface {

    /**
     * @var string The formatted data in XML format.
     */
    private string $formattedData;

    /**
     * Generate XML formatted data based on the given array.
     *
     * @param array $data The data to format into XML.
     *
     * @return FormatterInterface An instance of the XML formatter.
     */
    public function generate(array $data): FormatterInterface
    {
        $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><data></data>");
        $this->arrayToXml($data, $xml);
        $this->formattedData = $xml->asXML();
        return $this;
    }

    /**
     * Get the XML formatted data as a string.
     *
     * @return string The XML formatted data as a string.
     */
    public function getFormattedData(): string
    {
        return $this->formattedData;
    }

    /**
     * Convert an array to XML format.
     *
     * @param array $data The data to convert.
     * @param SimpleXMLElement $xml The XML element to append to.
     */
    private function arrayToXml(array $data, SimpleXMLElement $xml): void
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $item = $xml->addChild('item');
                $item->addChild('id', htmlspecialchars($value['id']));
                $item->addChild('name', htmlspecialchars($value['name']));
                $item->addChild('price', htmlspecialchars($value['price']));
                $item->addChild('category', htmlspecialchars($value['category']));
            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }
    }
}
