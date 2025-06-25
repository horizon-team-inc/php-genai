# PHP GenAI

A clean PHP wrapper for Google's Generative AI (GenAI) API, providing easy access to embedding generation, content generation, and other AI capabilities.

> **Requires [PHP 8.3+](https://php.net/releases/)**

## Features

- ✅ **Embeddings** - Generate embeddings for text with various task types
- ✅ **Batch Processing** - Process multiple texts in a single request
- ✅ **Similarity Calculations** - Built-in cosine similarity calculations
- ✅ **Multi-provider Support** - Works with both Gemini Developer API and Vertex AI
- 🚧 **Content Generation** - Coming soon
- 🚧 **Chat Functionality** - Coming soon
- 🚧 **Function Calling** - Coming soon
- 🚧 **File Handling** - Coming soon

## Installation

Install via Composer:

```bash
composer require horizonllc/php-genai
```

## Quick Start

### Basic Embedding Generation

```php
use PhpGenAI\Client;
use PhpGenAI\Enums\Model;
use PhpGenAI\Enums\TaskType;

// Initialize client with your API key
$client = Client::create('your-google-ai-api-key');

// Generate a single embedding
$embedding = $client->embeddings()->embed(
    'Hello, world!',
    Model::TEXT_EMBEDDING_004,
    TaskType::SEMANTIC_SIMILARITY
);

echo "Embedding dimensions: " . $embedding->getDimensionality() . "\n";
print_r($embedding->getValues());
```

### Batch Embeddings

```php
// Generate multiple embeddings at once
$texts = [
    'I love programming',
    'PHP is awesome',
    'Machine learning is cool'
];

$batchResponse = $client->embeddings()->embedBatch($texts);

foreach ($texts as $index => $text) {
    $embedding = $batchResponse->getEmbedding($index);
    echo "Text: {$text} - Dimensions: {$embedding->getDimensionality()}\n";
}
```

### Similarity Comparison

```php
$embedding1 = $client->embeddings()->embed('I enjoy coding');
$embedding2 = $client->embeddings()->embed('I love programming');

$similarity = $embedding1->cosineSimilarity($embedding2);
echo "Similarity: " . round($similarity, 4) . "\n";
```

### Using Vertex AI

```php
// For Vertex AI instead of Developer API
$client = Client::createForVertexAI(
    'your-project-id',
    'us-central1',  // location
    'your-access-token'
);

$embedding = $client->embeddings()->embed('Your text here');
```

## Available Models

- `Model::TEXT_EMBEDDING_004` - Latest text embedding model
- `Model::EMBEDDING_001` - Previous generation model

## Task Types

- `TaskType::RETRIEVAL_QUERY` - For search queries
- `TaskType::RETRIEVAL_DOCUMENT` - For documents to be searched
- `TaskType::SEMANTIC_SIMILARITY` - For similarity comparisons
- `TaskType::CLASSIFICATION` - For text classification
- `TaskType::CLUSTERING` - For clustering tasks
- `TaskType::QUESTION_ANSWERING` - For Q&A tasks
- `TaskType::FACT_VERIFICATION` - For fact checking

## Testing

Run the test suite:

```bash
composer test
```

## Code Quality

Keep code clean with Pint:
```bash
composer lint
```

Run refactors with Rector:
```bash
composer refactor
```

Static analysis with PHPStan:
```bash
composer analyse
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

⚗️ Run static analysis using **PHPStan**:
```bash
composer test:types
```

✅ Run unit tests using **PEST**
```bash
composer test:unit
```

🚀 Run the entire test suite:
```bash
composer test
```

**Skeleton PHP** was created by **[Nuno Maduro](https://twitter.com/enunomaduro)** under the **[MIT license](https://opensource.org/licenses/MIT)**.
