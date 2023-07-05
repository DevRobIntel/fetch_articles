# Fetch Articles

The "Fetch Articles" project is a Laravel command-line application that allows you to fetch and display articles from the dev.to API in real-time. It provides a convenient way to stay up-to-date with the latest content from dev.to within your Laravel project.

## Features

- Fetch articles from the dev.to API
- Display articles in a tabular format
- Customize the number of articles fetched
- Filter articles based on comments count
- Display article title, publish date, comments count, and author username

## Setup Instructions

1. Clone the repository:

git clone https://github.com/your-username/fetch_articles.git


2. Install the dependencies using Composer:

cd fetch_articles
composer install


3. Set up your dev.to API credentials:
   - Rename the `.env.example` file to `.env`.
   - Open the `.env` file and provide your dev.to API credentials.

4. Run the `fetch_articles` command:

php artisan fetch_articles


5. Customize the command options:
   - Use the `--limit` option to specify the number of articles to fetch.
   - Use the `--has_comments_only` option to filter articles with comments only.

That's it! You can now use the "Fetch Articles" command to retrieve and display dev.to articles in your Laravel project.

For more information and advanced usage, please refer to the project documentation or the source code.

## License

This project is licensed under the [MIT License](LICENSE).

