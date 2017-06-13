<?php
namespace aksi0\novaposhta\http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException as GuzzleClientException;
use aksi0\novaposhta\request\RequestInterface;
use Yii;
/**
 * Class Client
 */
class Client implements ClientInterface
{
    /**
     * Concrete client to process http requests
     * @var \GuzzleHttp\Client
     */
    private $client;
    /**
     * @param GuzzleClient $client
     */
    public function __construct(GuzzleClient $client)
    {
        $this->client = $client;
    }
    /**
     * Execute http request
     * @param RequestInterface $request
     * @param string $contentType
     * @param string $url
     * @return string
     * @throws \aksi0\novaposhta\http\ClientException
     */
    public function execute(RequestInterface $request, $contentType, $url)
    {
        $options = [
            'headers' => [
                'content-type' => $contentType
            ],
            'body' => $request->getBody()
        ];
        try {
            $response = $this->client->post($url, $options);
        } catch (GuzzleClientException $e) {
            Yii::error($e->getRequest());
            if ($e->hasResponse()) {
                Yii::error($e->getResponse());
            }
            throw new ClientException($e);
        }
        Yii::trace($response);
        return (string) $response->getBody();
    }
}