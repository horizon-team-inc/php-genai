<?php

namespace PhpGenAI\Http;

use GuzzleHttp\Client as GuzzleClient;

class HttpClient
{
    protected GuzzleClient $client;
    protected string $apiKey;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
        $this->client = new GuzzleClient([
            'base_uri' => "https://generativelanguage.googleapis.com/v1beta/",
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }
}
