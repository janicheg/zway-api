<?php

namespace ZWay\Api;

class ApiService
{
    protected $id;
    protected $username;
    protected $password;
    protected $cookiePath;

    public function __construct($id, $username, $password, $cookiePath)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->cookiePath = $cookiePath;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
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

        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $response = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $json = json_decode($response);
        if ($code == 401 || (strlen($response) > 500 && !is_object($json))) {
            $this->login();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $response = curl_exec($ch);
            $json = json_decode($response);
        }

        return $json;
    }

    protected function getCookie()
    {
        $cookieFile =  $this->getCookieFileName();
        if (!file_exists($cookieFile)) {
            $this->login();
        }
        if (!file_exists($cookieFile)) {
            throw new \Exception('cannot login');
        }

        return $cookieFile;
    }

    public function login()
    {
        $username = $this->id . '/' . $this->username;
        $cookieFile = $this->getCookieFileName();
        if (file_exists($cookieFile)) {
            unlink($cookieFile);
        }
        $postinfo = "act=login&login=$username&pass=$this->password";

        $ch = curl_init();
        $url = $this->getUrl('/zboxweb');

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);

        curl_exec($ch);
    }

    public function getCookieFileName()
    {
        return $this->cookiePath . '/' .$this->id . '_cookie';
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
