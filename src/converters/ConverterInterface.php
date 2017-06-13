<?php
namespace aksi0\novaposhta\converters;

/**
 * Interface ConverterInterface
 */
interface ConverterInterface
{
    /**
     * Convert array to specified format
     * @param array $params
     * @return string|false
     */
    public function encode(array $params);
    /**
     * Decode data to array
     * @param string $data
     * @return array
     */
    public function decode($data);
    /**
     * Get content type of current converted data
     * @return string
     */
    public function getContentType();
    /**
     * Get type of concrete format implementation
     * @return string
     */
    public function getType();
}