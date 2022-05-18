<?php

namespace Kasper334\PeopleforceSdk\Endpoints;

use Kasper334\PeopleforceSdk\Helpers;

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
     * @var BaseEndpoint[]
     */
    protected $subEndpoints = [];

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
        if (\property_exists($this, $name)) { // if we have *property* with endpoint path specified
            return $this->$name(...$arguments); // call the corresponding endpoint *method*
        }

        throw new \Exception("Method \"{$name}\" not found");
    }

    /**
     * @throws \Exception
     */
    public function __get($name)
    {
        if (\array_key_exists($name, $this->subEndpoints) && \is_subclass_of($this->subEndpoints[$name], self::class)) {
            return new $this->subEndpoints[$name]($this->apiKey);
        }

        throw new \Exception("Property \"{$name}\" not found");
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

        $query = Helpers::buildQuery($params);

        if (getenv('APP_ENV') === 'testing') {
            $workingDir = getcwd();
            $fileName = str_replace('/', '_', trim($endpoint, '/'));
            $mockData = file_get_contents("$workingDir/tests/mocks/$fileName.json");

            $payload = \json_decode($mockData, true);
        } else {
            $response = $this->httpClient->request($method, self::API_BASE . $endpoint, compact('headers', 'query'));

            $payload = \json_decode($response->getBody()->getContents(), true);
        }

        $data = $payload['data'] ?? $payload;

        if (!isset($params['page']) && isset($payload['metadata']['pagination']['pages'])) {
            $pagination = $payload['metadata']['pagination'];

            // fetch all data from other pages
            for ($i = ($pagination['page'] + 1); $i <= $pagination['pages']; $i++) {
                $additionalData = $this->request($method, $endpoint, \array_merge($params, ['page' => $i]));

                $data = \array_merge($data, $additionalData);
            }
        }

        return $data;
    }

    /**
     * Transform raw API response into entities
     * @return mixed
     */
    abstract protected function transform(array $rawData);
}
