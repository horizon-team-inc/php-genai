<?php

namespace PhpGenAI;

use PhpGenAI\Http\HttpClient;

class Client
{
    protected HttpClient $httpClient;

    public function __construct(string $apiKey)
    {
        $this->httpClient = new HttpClient($apiKey);
    }

    /*
    public function embeddings(): EmbeddingService
    {
        return new EmbeddingService($this->httpClient);
    }
    */

    /*
    public function generativeModel(ModelType $model): GenerativeModel
    {
        // To be implemented
    }
    */
}
