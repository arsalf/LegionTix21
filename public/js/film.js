$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = [];
    var type = "GET";
    var ajaxurl = 'https://imdb-api.com/en/API/Search/k_1q09gcv7/eternals';
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function(data) {
            console.log(data.results);
            for (i in data.results) {
                $('#demo').append(
                    `<img src=` + data.results[i].image + `>` +
                    `<p>` + data.results[i].title + `</p>`
                );
            }
        },
        error: function(data) {
            alert(data.statusText);
            $('#demo').html(data);
            console.log(data);
        }
    });
});