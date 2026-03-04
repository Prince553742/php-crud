<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap</title>
        <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
        <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="d-flex justify-content-center align-items-center bg-light vh-100 vw-100">
                <form class="d-flex flex-column justify-content-center align-items-center g-2">
                    <div>
                        <label for="Artist" class="form-label pb-2">Artist Name</label>
                        <input type="text" class="form-control mb-5" id="artist" name="artist" placeholder="Artist Name">
                    </div>

                    <div>
                        <label for="title" class="form-label pb-2">Song Title</label>
                        <input type="text" class="form-control mb-5" id="title" name="title" placeholder="Song Title">
                    </div>

                    <div>
                        <label for="year" class="form-label pb-2">Year of Published</label>
                        <input type="number" class="form-control mb-5" id="year" name="year" placeholder="Year of Published">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>