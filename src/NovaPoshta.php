<?php
namespace aksi0\novaposhta;

use aksi0\novaposhta\request\RequestFactory;

/**
 * Class NovaPoshta
 * @package aksi0\novaposhta
 */
class NovaPoshta
{
    private $_request;

    public function __construct()
    {
        $this->_request = new RequestFactory();
    }

    /**
     * @return Address
     */
    public function address()
    {
        return new Address($this->_request);
    }
}