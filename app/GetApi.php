<?php

namespace app;

use GuzzleHttp\Client;

class GetApi
{
    private Client $client;

    private array $currencies;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function getValues(): array
    {
        $url = 'https://www.latvijasbanka.lv/vk/ecb.xml';
        $response = $this->client->request('GET', $url);
        $result = simplexml_load_string($response->getBody()->getContents());

        foreach ($result->Currencies->Currency as $record) {
            $this->currencies[] = new Currency(
                (string)$record->ID,
                (float)$record->Rate
            );
        }
        return $this->currencies;
    }

    public function convert(float $amount, string $toCurrency): ?float
    {
        $this->getValues();
        /** @var Currency $currency */
        $result = 0;
        foreach($this->currencies as $currency) {
            if($toCurrency == $currency->getId()) {
                $result = $amount * $currency->getRate();
            }
        }
        return $result;
    }
}