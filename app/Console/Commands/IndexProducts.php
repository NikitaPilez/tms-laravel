<?php

namespace App\Console\Commands;

use App\Models\Product;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

class IndexProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create products index';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->build();

        $products = Product::all();

        foreach ($products as $product) {
            $client->index([
                'index' => 'products',
                'id' => $product->id,
                'body' => $product->toArray()
            ]);
        }
    }
}
