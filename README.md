# Movie Data Fetcher Plugin

A WordPress plugin that allows you to fetch movie data from external sources such as IMDb and TMDb. It provides a form where you can enter the movie ID and select the source to retrieve the movie data and populate the form fields with information like title, year, genre, director, plot, and more.

## Features

- Fetch movie data from IMDb or TMDb.
- Populate movie information in a form including title, year, genre, director, plot, etc.
- Advanced fields like IMDb rating, box office, DVD release, etc.
- Easy to use interface with integration into WordPress admin panel.

## Installation

1. Download the plugin files.
2. Go to your WordPress Admin Panel.
3. Navigate to `Plugins > Add New`.
4. Click `Upload Plugin` and choose the downloaded ZIP file.
5. Activate the plugin from the plugin list.

## Usage

1. After activation, go to the `Movie Data Fetcher` menu in the WordPress Admin Panel.
2. You'll see a form with basic and advanced movie information fields.
3. Select a source (IMDb or TMDb), and enter the Movie ID.
4. Click the `Fetch Data` button to retrieve the movie data and fill in the form fields automatically.

## Development

This plugin fetches movie data using mock functions for IMDb and TMDb. You can replace these functions with real API calls for production use.

### Fetch IMDb Data

This mock function fetches IMDb movie data based on the movie ID.

### Fetch TMDb Data

This mock function fetches TMDb movie data based on the movie ID.

## Enqueue Scripts

The plugin enqueues a custom JavaScript file for handling the movie data form submission. You can customize it according to your needs.

## License

This plugin is released under the [MIT License](LICENSE).
