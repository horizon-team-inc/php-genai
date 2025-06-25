# Quick Start Guide - PHP GenAI

## Installation

```bash
composer require horizonllc/php-genai
```

## Get Your API Key

1. **For Gemini Developer API:**
   - Visit [Google AI Studio](https://makersuite.google.com/app/apikey)
   - Create a new API key

2. **For Vertex AI:**
   - Set up a Google Cloud project
   - Enable the Vertex AI API
   - Get an access token via `gcloud auth print-access-token`

## Basic Usage

### 1. Initialize the Client

```php
<?php

require_once 'vendor/autoload.php';

use PhpGenAI\Client;

// Using Gemini Developer API
$client = Client::create('your-api-key-here');

// Or using Vertex AI
$client = Client::createForVertexAI(
    'your-project-id',
    'us-central1',
    'your-access-token'
);
```

### 2. Generate Embeddings

```php
use PhpGenAI\Enums\Model;
use PhpGenAI\Enums\TaskType;

// Single text embedding
$embedding = $client->embeddings()->embed(
    'Hello, world!',
    Model::TEXT_EMBEDDING_004,
    TaskType::SEMANTIC_SIMILARITY
);

echo "Dimensions: " . $embedding->getDimensionality() . "\n";
print_r($embedding->getValues());
```

### 3. Batch Processing

```php
// Multiple texts at once
$texts = [
    'I love programming',
    'PHP is awesome', 
    'AI is fascinating'
];

$batchResponse = $client->embeddings()->embedBatch($texts);

foreach ($texts as $index => $text) {
    $embedding = $batchResponse->getEmbedding($index);
    echo "{$text}: {$embedding->getDimensionality()} dimensions\n";
}
```

### 4. Similarity Comparison

```php
$embedding1 = $client->embeddings()->embed('I enjoy coding');
$embedding2 = $client->embeddings()->embed('I love programming');

$similarity = $embedding1->cosineSimilarity($embedding2);
echo "Similarity: " . round($similarity, 4) . "\n";
```

## Available Models

- `Model::TEXT_EMBEDDING_004` - Latest embedding model (recommended)
- `Model::EMBEDDING_001` - Previous generation model

## Task Types

Choose the appropriate task type for best results:

- `TaskType::RETRIEVAL_QUERY` - For search queries
- `TaskType::RETRIEVAL_DOCUMENT` - For documents to be searched
- `TaskType::SEMANTIC_SIMILARITY` - For similarity comparisons
- `TaskType::CLASSIFICATION` - For text classification
- `TaskType::CLUSTERING` - For clustering tasks
- `TaskType::QUESTION_ANSWERING` - For Q&A applications
- `TaskType::FACT_VERIFICATION` - For fact checking

## Error Handling

```php
use PhpGenAI\Exceptions\AuthenticationException;
use PhpGenAI\Exceptions\ApiException;

try {
    $embedding = $client->embeddings()->embed('Test text');
} catch (AuthenticationException $e) {
    echo "Authentication failed: " . $e->getMessage();
} catch (ApiException $e) {
    echo "API error: " . $e->getMessage();
}
```

## What's Next?

This library currently supports **embeddings**. Coming soon:

- 🚧 **Content Generation** - Text generation with Gemini models
- 🚧 **Chat Functionality** - Conversational AI
- 🚧 **Function Calling** - Let AI call your PHP functions
- 🚧 **Multimodal Support** - Images, audio, video inputs

See [ROADMAP.md](ROADMAP.md) for the complete development plan.

## Need Help?

- Check the [examples/](examples/) directory for more code samples
- Read the [README.md](README.md) for detailed documentation
- Open an issue for bugs or feature requests
