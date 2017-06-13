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
    private $_address;

    public function __construct()
    {
        $this->_request = new RequestFactory();
    }

    /**
     * Returns all cities
     *
     * @return Address
     */
    public function getAddress()
    {
        if(!$this->_address) {
            $this->_address = new Address($this->_request);
            return $this->_address;
        } else {
            return $this->_address;
        }
    }
}