<?php

namespace ZWay\Api;

class ApiService
{
    protected $access_token;
    protected $clientId;
    protected $clientSecret;

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @param string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $endpoint
     * @return mixed
     * @throws \Exception
     */
    public function get(string $endpoint)
    {
        $cookie_file_path = $this->getCookie();

        $url = $this->getUrl($endpoint);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Authentication: Bearer ' . $this->access_token
        ]);
        $response = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $json = json_decode($response);
        if ($code == 401 || (strlen($response) > 500 && !is_object($json))) {
            throw new \Exception('z-way auth faled');
        }

        return $json;
    }

    public function auth($code): void
    {
        $postinfo = json_encode([
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret,
            "code" => $code
        ]);

        $ch = curl_init();
        $url = $this->getUrl('/token');

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);

        $response = curl_exec($ch);
        $json = json_decode($response);
        if (isset($json->access_token, $this->token_type) && $this->token_type =='bearer') {
            $this->access_token = $json->access_token;
        }
    }


    /**
     * @param string $endpoint
     *
     * @return string
     */
    protected function getUrl(string $endpoint): string
    {
        return 'https://find.z-wave.me' . $endpoint;
    }
}
