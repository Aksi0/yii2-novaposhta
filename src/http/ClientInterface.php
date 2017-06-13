<?php
namespace aksi0\novaposhta\http;

use aksi0\novaposhta\request\RequestInterface;

/**
 * Interface ClientInterface
 */
interface ClientInterface
{
    /**
     * Execute http request
     * @param RequestInterface $request
     * @param string $contentType
     * @param string $url
     * @return string
     */
    public function execute(RequestInterface $request, $contentType, $url);
}