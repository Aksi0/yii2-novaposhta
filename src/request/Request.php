<?php
namespace aksi0\novaposhta\request;
use aksi0\novaposhta\converters\ConverterInterface;
use aksi0\novaposhta\http\ClientFactory;

/**
 * Class Request
 */
class Request implements RequestInterface
{
    const API_URL = 'https://api.novaposhta.ua/v2.0/json/';
    /**
     * Request data converter
     * @var \aksi0\novaposhta\converters\ConverterInterface
     */
    private $converter;
    /**
     * Factory to create http client
     * @var \aksi0\novaposhta\http\ClientFactory
     */
    private $factory;
    /**
     * API key
     * @var string
     */
    private $apiKey;
    /**
     * Encoded data to need format
     * @var string
     */
    private $body;
    /**
     * Init request object
     * @param ConverterInterface $converter
     * @param ClientFactory $factory
     * @param string $apiKey
     */
    public function __construct(ConverterInterface $converter, ClientFactory $factory, $apiKey)
    {
        $this->converter = $converter;
        $this->factory = $factory;
        $this->apiKey = $apiKey;
    }
    /**
     * @inheritdoc
     */
    public function build($modelName, $calledMethod, array $params)
    {
        $data = [
            'apiKey' => $this->apiKey,
            'modelName' => $modelName,
            'calledMethod' => $calledMethod,
        ];
        if (!empty($params)) {
            $data['methodProperties'] = $params;
        }
        $this->body = $this->converter->encode($data);
        return $this;
    }
    /**
     * @inheritdoc
     */
    public function execute()
    {
        $client = $this->factory->create();
        $response = $client->execute($this, $this->converter->getContentType(), $this->getUrl());
        return $this->converter->decode($response);
    }
    /**
     * @inheritdoc
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
     * Return url to api calls
     * @return string
     */
    protected function getUrl()
    {
        self::API_URL;
    }
}