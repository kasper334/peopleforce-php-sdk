<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

abstract class BaseEndpoint
{
    public const API_BASE = 'https://app.peopleforce.io/api/public/v1';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = new \GuzzleHttp\Client();
    }

    /**
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        if (!\property_exists($this, $name)) {
            throw new \Exception("Method \"{$name}\" not found");
        }

        return $this->$name(...$arguments);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getAll()
    {
        return $this->request('GET', $this->{__FUNCTION__});
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function get(int $id)
    {
        $response = $this->request('GET', str_replace('{id}', $id, $this->{__FUNCTION__}));
        return $this->transform($response);
    }

    // todo post

    // todo put

    // todo delete

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request(string $method, string $endpoint, array $options = [])
    {
        $response = $this->httpClient
            ->request($method, self::API_BASE . $endpoint, [
                'headers' => [
                    'X-API-KEY' => $this->apiKey,
                ]
            ]);

        return \json_decode($response->getBody()->getContents(), true)['data']; // fixme
    }

    /**
     * Transform raw API response into entities
     * @return mixed
     */
    abstract protected function transform(array $rawData);
}
