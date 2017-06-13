<?php
namespace aksi0\novaposhta;

use aksi0\novaposhta\request\RequestFactory;

/**
 * Class NovaPoshta
 * @package aksi0\novaposhta
 */
class NovaPoshta
{
    private $request;

    public function _construct()
    {
        $request = new RequestFactory();
        $this->request = $request->create();
    }

    public function address()
    {
        return new Address($this->request);
    }
}