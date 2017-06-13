<?php
namespace aksi0\novaposhta\converters;

/**
 * Class ConverterFactory
 */
class ConverterFactory
{
    /**
     * Create format converter
     * @return JsonConverter
     */
    public function create()
    {
        return new JsonConverter();
    }
}