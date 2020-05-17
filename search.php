<?php include("base.php")?>
<header class="mb-2">
    <div class="jumbotron">
        <div class="container d-flex justify-content-center py-5">
            <div class="text-center">
                <h1 class="mb-3">Spotify API <small>search</small></h1>
                <form action="#" class="d-flex" id="form">
                    <input id="formInput" class="form-control mr-2" type="text">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</header>
<section mb-2>
    <div class="container" id="result">
    </div>
</section>
<script>
$(document).ready(function() {
    $('form').on('submit', function() {
        var url = $('input:text').val();
        $.ajax({
            url: "https://api.spotify.com/v1/albums/" + url + "?market=ES",
            type: "GET",
            data: "name",
            dataType: "json",
            success: function(data) {
                displayData(data)
                console.log(data);
            },
            error: function(data) {
                displayData(data)
                console.log(data);
            },
            beforeSend: setHeader
        });
    });

    function displayData(data) {
        $(result).html("<h1>" + (data.name) + "</h1>");
    }
});

function setHeader(xhr) {
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('Authorization',
        'Bearer BQBf7NP2RTjrpSY6PmuaDCCR6O8H5hUPV-_M4gFbEd--9WTNaiXeLWdvkm-egJAV8g0x_456oR1PJKR7vwzh0OkpaTsNHcowQcqcWvzqQlpXgutqtLeRsvpdt_iPJxLof2OWq4TH4f3tIc36gHlo0kj1mIh6GJgy1CQX97W7X9OYun01bKXH4mNkvqMfuhreJm-jBd5oKu4v-7jcIB-U7uafJEVmvYQZZG6LK09P-julH6t-gmOmnUq99A3UoOZm3-dOI0AMKYHjLRDyI6L6Unz4vljHXvZh'
    );
}
</script>
<?php include("base_bottom.php")?>