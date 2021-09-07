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
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getAll(array $params = [])
    {
        $response = $this->request('GET', $this->{__FUNCTION__}, $params);

        $items = [];
        foreach ($response as $item) {
            $items[] = $this->transform($item);
        }

        return $items;
    }

    /**
     * @param int $id
     * @return mixed
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
     * @param string $method
     * @param string $endpoint
     * @param array $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request(string $method, string $endpoint, array $params = [])
    {
        $headers = [
            'X-API-KEY' => $this->apiKey
        ];

        // needed to implement custom query builder because of PeopleForce's inability to parse encoded square brackets
        $query = implode('&', \array_map(static function ($value, string $name) {
            return \is_array($value)
                ? implode('&', \array_map(static function ($subvalue) use ($name) {
                    return urlencode($name) . '[]=' . urlencode($subvalue);
                }, $value))
                : urlencode($name) . '=' . urlencode($value);
        }, $params, \array_keys($params)));

        $response = $this->httpClient->request($method, self::API_BASE . $endpoint, compact('headers', 'query'));

        return \json_decode($response->getBody()->getContents(), true)['data']; // fixme
    }

    /**
     * Transform raw API response into entities
     * @return mixed
     */
    abstract protected function transform(array $rawData);
}
