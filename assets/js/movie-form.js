jQuery(document).ready(function ($) {
    $('#fetch-data').on('click', function () {
        const source = $('#data-source').val();
        const movieId = $('#movie-id').val();

        if (!source || !movieId) {
            alert('Please select a source and enter a movie ID.');
            return;
        }

        $.post(ajaxurl, {
            action: 'fetch_movie_data',
            source: source,
            movie_id: movieId,
        }, function (response) {
            $('#movie-title').val(response.Title || '');
            $('#movie-year').val(response.Year || '');
            $('#movie-rated').val(response.Rated || '');
            $('#movie-released').val(response.Released || '');
            $('#movie-runtime').val(response.Runtime || '');
            $('#movie-genre').val(response.Genre || '');
            $('#movie-director').val(response.Director || '');
            $('#movie-writer').val(response.Writer || '');
            $('#movie-actors').val(response.Actors || '');
            $('#movie-plot').val(response.Plot || '');
            $('#movie-language').val(response.Language || '');
            $('#movie-country').val(response.Country || '');
            $('#movie-awards').val(response.Awards || '');
            $('#movie-poster').val(response.Poster || '');
            $('#movie-metascore').val(response.Metascore || '');
            $('#movie-imdbRating').val(response.imdbRating || '');
            $('#movie-imdbVotes').val(response.imdbVotes || '');
            $('#movie-dvd').val(response.DVD || '');
            $('#movie-boxoffice').val(response.BoxOffice || '');
            $('#movie-production').val(response.Production || '');
            $('#movie-website').val(response.Website || '');
        });
    });
});
