<?php

namespace ZWayApi;

use GuzzleHttp\Client as HttpClient;
use ZWayApi\Exception\BadResponseException;

/**
 * Class NewClient
 * @package ZWayApi
 */
class NewClient
{
    /** @var HttpClient */
    protected $httpClient;
    /** @var string */
    protected $baseUrl;
    /** @var string */
    protected $username;
    /** @var string */
    protected $password;

    /**
     * Client constructor.
     * @param $baseUrl
     * @param null $username
     * @param null $password
     * @param HttpClient|null $httpClient
     */
    public function __construct($baseUrl, $username = null, $password = null, HttpClient $httpClient = null)
    {
        $this->baseUrl = $baseUrl;
        $this->username = $username;
        $this->password = $password;
        $this->httpClient = $httpClient ?: new HttpClient;
    }

    /**
     * @param $command
     * @return mixed
     * @throws BadResponseException
     */
    public function run($command)
    {
        $response = $this->request("Run/{$command}");

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            if ($data === null) {
                throw new \RuntimeException('Cannot decode API response');
            }

            return $data;
        } else {
            throw new BadResponseException($response);
        }
    }

    /**
     * @param $path
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function request($path)
    {
        return $this->httpClient->get(
            "{$this->baseUrl}/{$path}",
            [
                'headers' => $this->getAuthHeaders($this->username, $this->password)
            ]
        );
    }

    /**
     * @param $username
     * @param $password
     * @return array
     */
    protected function getAuthHeaders($username, $password)
    {
        $headers = [];
        if ($username && $password) {
            $headers = [
                'Authorization' => 'Basic ' . base64_encode($username . ':' . $password)
            ];
        }

        return $headers;
    }

    /**
     * @return array
     * @throws BadResponseException
     */
    public function inspectQueue()
    {
        $response = $this->request("InspectQueue");

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            if ($data === null) {
                throw new \RuntimeException('Cannot decode API response');
            }

            $jobs = [];

            $jobFactory = new Factory\QueueJobFactory;

            foreach ($data as $jobData) {
                $jobs[] = $jobFactory->create($jobData);
            }

            return $jobs;
        } else {
            throw new BadResponseException($response);
        }
    }

    /**
     * @param \DateTime|null $timestamp
     * @return DataUpdate|ZWay
     * @throws BadResponseException
     */
    public function data(\DateTime $timestamp = null)
    {
        $path = "Data";
        if ($timestamp) {
            $path .= "/{$timestamp->format('U')}";
        }

        $response = $this->request($path);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            if ($data === null) {
                throw new \RuntimeException('Cannot decode API response');
            }

            if ($timestamp) {
                return (new Factory\DataUpdateFactory)->create($data);
            } else {
                return (new Factory\ZWayFactory)->create($data);
            }
        } else {
            throw new BadResponseException($response);
        }
    }
}
