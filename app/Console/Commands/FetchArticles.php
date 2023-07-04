<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class FetchArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch_articles 
                            {--limit=5 : The number of articles to fetch}
                            {--has_comments_only : Fetch articles with comments only}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch articles from dev.to API';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $limit = $this->option('limit');
        $hasCommentsOnly = $this->option('has_comments_only');

        $username = $this->ask('Enter the username:');
        $url = "https://dev.to/api/articles?username={$username}";

        $client = new Client();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() === 200) {
            $articles = json_decode($response->getBody(), true);

            if ($hasCommentsOnly) {
                $articles = array_filter($articles, function ($article) {
                    return $article['comments_count'] > 0;
                });
            }

            $articles = array_slice($articles, 0, $limit);

            $tableData = array_map(function ($article) {
                return [
                    'Title' => $article['title'],
                    'Publish Date' => $article['readable_publish_date'],
                    'Comments' => $article['comments_count'],
                    'Username' => $article['user']['username'],
                ];
            }, $articles);

            $headers = ['Title', 'Publish Date', 'Comments', 'Username'];

            $this->table($headers, $tableData);
        } else {
            $this->error('Failed to fetch articles. Please try again later.');
        }
    }
}
