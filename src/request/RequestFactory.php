<?php
namespace aksi0\novaposhta\request;

use aksi0\novaposhta\converters\ConverterFactory;
use aksi0\novaposhta\http\ClientFactory;
use Yii;
use yii\base\InvalidConfigException;

class RequestFactory
{
    /**
     * Create request object
     * @return \aksi0\novaposhta\request\RequestInterface
     * @throws InvalidConfigException
     */
    public function create()
    {
        $name = 'novaPoshta';
        $components = Yii::$app->getComponents();
        if (empty($components[$name]) || empty($components[$name]['api_key'])) {
            throw new InvalidConfigException('The "api_key" of component should be specified');
        }
        $converterFactory = new ConverterFactory();
        $converter = $converterFactory->create();
        $clientFactory = new ClientFactory();
        $request = Yii::createObject(Request::class, [
            $converter,
            $clientFactory,
            $components['novaposhta']['api_key']
        ]);
        return $request;
    }
}