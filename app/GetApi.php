<?php

namespace app;
use GuzzleHttp\Client;

class ApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getData()
    {
        $url = 'https://www.latvijasbanka.lv/vk/ecb.xml';
        $response = $this->client->request('GET', $url);
        $result = simplexml_load_string($response->getBody()->getContents());

        foreach ($result->Currencies->Currency as $record) {
            var_dump($record);
        }
    }
}