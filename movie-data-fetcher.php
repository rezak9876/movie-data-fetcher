<?php
 /*
 Plugin Name: Movie Data Fetcher
 Description: A plugin to fetch and fill movie data from external sources like IMDb or TMDb.
 Version: 1.0
 Author: Your Name
 */
 
 if (!defined('ABSPATH')) {
     exit;
 }
 
 add_action('admin_menu', 'movie_data_fetcher_menu');
 function movie_data_fetcher_menu() {
     add_menu_page(
         'Movie Data Fetcher',
         'Movie Data Fetcher',
         'manage_options',
         'movie-data-fetcher',
         'movie_data_fetcher_page',
         'dashicons-video-alt',
         20
     );
 }
 
 function movie_data_fetcher_page() {
     ?>
     <div class="wrap">
        <h1>Movie Data Fetcher</h1>
        <form id="movie-data-form">
            <!-- Basic Fields -->
            <h3>Movie Information</h3>
            <label for="movie-title">Title:</label>
            <input type="text" id="movie-title" name="movie-title" style="width: 100%;"><br><br>

            <label for="movie-year">Year:</label>
            <input type="text" id="movie-year" name="movie-year" style="width: 100%;"><br><br>

            <label for="movie-rated">Rated:</label>
            <input type="text" id="movie-rated" name="movie-rated" style="width: 100%;"><br><br>

            <label for="movie-released">Released:</label>
            <input type="text" id="movie-released" name="movie-released" style="width: 100%;"><br><br>

            <label for="movie-runtime">Runtime:</label>
            <input type="text" id="movie-runtime" name="movie-runtime" style="width: 100%;"><br><br>

            <label for="movie-genre">Genre:</label>
            <input type="text" id="movie-genre" name="movie-genre" style="width: 100%;"><br><br>

            <label for="movie-director">Director:</label>
            <input type="text" id="movie-director" name="movie-director" style="width: 100%;"><br><br>

            <label for="movie-writer">Writer:</label>
            <input type="text" id="movie-writer" name="movie-writer" style="width: 100%;"><br><br>

            <label for="movie-actors">Actors:</label>
            <input type="text" id="movie-actors" name="movie-actors" style="width: 100%;"><br><br>

            <label for="movie-plot">Plot:</label>
            <textarea id="movie-plot" name="movie-plot" rows="5" style="width: 100%;"></textarea><br><br>

            <label for="movie-language">Language:</label>
            <input type="text" id="movie-language" name="movie-language" style="width: 100%;"><br><br>

            <label for="movie-country">Country:</label>
            <input type="text" id="movie-country" name="movie-country" style="width: 100%;"><br><br>

            <label for="movie-awards">Awards:</label>
            <input type="text" id="movie-awards" name="movie-awards" style="width: 100%;"><br><br>

            <label for="movie-poster">Poster URL:</label>
            <input type="text" id="movie-poster" name="movie-poster" style="width: 100%;"><br><br>

            <!-- Advanced Fields -->
            <h3>Advanced Information</h3>
            <label for="movie-metascore">Metascore:</label>
            <input type="text" id="movie-metascore" name="movie-metascore" style="width: 100%;"><br><br>

            <label for="movie-imdbRating">IMDb Rating:</label>
            <input type="text" id="movie-imdbRating" name="movie-imdbRating" style="width: 100%;"><br><br>

            <label for="movie-imdbVotes">IMDb Votes:</label>
            <input type="text" id="movie-imdbVotes" name="movie-imdbVotes" style="width: 100%;"><br><br>

            <label for="movie-dvd">DVD Release:</label>
            <input type="text" id="movie-dvd" name="movie-dvd" style="width: 100%;"><br><br>

            <label for="movie-boxoffice">Box Office:</label>
            <input type="text" id="movie-boxoffice" name="movie-boxoffice" style="width: 100%;"><br><br>

            <label for="movie-production">Production:</label>
            <input type="text" id="movie-production" name="movie-production" style="width: 100%;"><br><br>

            <label for="movie-website">Website:</label>
            <input type="text" id="movie-website" name="movie-website" style="width: 100%;"><br><br>

            <!-- Fetch Section -->
            <h3>Fetch Movie Data</h3>
            <label for="data-source">Source:</label>
            <select id="data-source" name="data-source">
                <option value="imdb">IMDb</option>
                <option value="tmdb">TMDb</option>
            </select><br><br>

            <label for="movie-id">Movie ID:</label>
            <input type="text" id="movie-id" name="movie-id"><br><br>

            <button type="button" id="fetch-data">Fetch Data</button>
        </form>
    </div>
     <?php
 }
 
 add_action('admin_enqueue_scripts', 'movie_data_fetcher_scripts');
 function movie_data_fetcher_scripts() {
     wp_enqueue_script('movie-data-fetcher-script', plugin_dir_url(__FILE__) . 'assets/js/movie-form.js', ['jquery'], null, true);
 }
 
 add_action('wp_ajax_fetch_movie_data', 'fetch_movie_data');
 function fetch_movie_data() {
     $source = $_POST['source'];
     $movie_id = $_POST['movie_id'];
 
     $data = [];
 
     if ($source === 'imdb') {
         $data = fetch_imdb_data($movie_id);
     } elseif ($source === 'tmdb') {
         $data = fetch_tmdb_data($movie_id);
     }
 
     wp_send_json($data);
 }
 
 function fetch_imdb_data($movie_id) {
    return [
        'Title' => 'Inception',
        'Year' => '2010',
        'Rated' => 'PG-13',
        'Released' => '16 Jul 2010',
        'Runtime' => '148 min',
        'Genre' => 'Action, Adventure, Sci-Fi',
        'Director' => 'Christopher Nolan',
        'Writer' => 'Christopher Nolan',
        'Actors' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page',
        'Plot' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
        'Language' => 'English, Japanese, French',
        'Country' => 'United States, United Kingdom',
        'Awards' => 'Won 4 Oscars. 157 wins & 220 nominations total',
        'Poster' => 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3MjMyNl5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg',
        'Ratings' => [
            ['Source' => 'Internet Movie Database', 'Value' => '8.8/10'],
            ['Source' => 'Rotten Tomatoes', 'Value' => '87%'],
            ['Source' => 'Metacritic', 'Value' => '74/100']
        ],
        'Metascore' => '74',
        'imdbRating' => '8.8',
        'imdbVotes' => '2,435,456',
        'imdbID' => 'tt1375666',
        'Type' => 'movie',
        'DVD' => '07 Dec 2010',
        'BoxOffice' => '$292,576,195',
        'Production' => 'Syncopy, Warner Bros.',
        'Website' => 'N/A',
        'Response' => 'True'
    ];
}
 
function fetch_tmdb_data($movie_id) {
    return [
        'Title' => 'Inception',
        'Year' => '2010',
        'Rated' => 'PG-13',
        'Released' => '16 Jul 2010',
        'Runtime' => '148 min',
        'Genre' => 'Action, Adventure, Sci-Fi',
        'Director' => 'Christopher Nolan',
        'Writer' => 'Christopher Nolan',
        'Actors' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Elliot Page',
        'Plot' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
        'Language' => 'English, Japanese, French',
        'Country' => 'United States, United Kingdom',
        'Awards' => 'Won 4 Oscars. 157 wins & 220 nominations total',
        'Poster' => 'https://image.tmdb.org/t/p/w500/qmDpIHrmpJINaRKAfWQfftjCdyi.jpg',
        'Ratings' => [
            ['Source' => 'TMDb', 'Value' => '8.8/10'],
            ['Source' => 'Rotten Tomatoes', 'Value' => '87%'],
            ['Source' => 'Metacritic', 'Value' => '74/100']
        ],
        'Metascore' => '74',
        'imdbRating' => '8.8',
        'imdbVotes' => '2,435,456',
        'imdbID' => 'tt1375666',
        'Type' => 'movie',
        'DVD' => '07 Dec 2010',
        'BoxOffice' => '$292,576,195',
        'Production' => 'Syncopy, Warner Bros.',
        'Website' => 'https://www.warnerbros.com/movies/inception',
        'Response' => 'True'
    ];
}
