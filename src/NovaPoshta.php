<?php
namespace aksi0\novaposhta;

use aksi0\novaposhta\request\RequestFactory;

/**
 * Class NovaPoshta
 * @package aksi0\novaposhta
 */
class NovaPoshta
{
    public static function address()
    {
        return new Address(new RequestFactory());
    }
}