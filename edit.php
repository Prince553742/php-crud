<?php
require_once 'classes/database.php';
require_once 'classes/playlist.php';

$db = (new Database())->getConnection();
$playlist = new Playlist($db);

$id = $_GET['id'];
$song = $playlist->getSongById($id);

if (isset($_POST['update_song'])) {
    $playlist->updateSong($id, $_POST['artist'], $_POST['title'], $_POST['year']);
    header("Location: index.php?status=updated");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Song</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form method="POST" class="border border-warning p-5 rounded shadow-lg">
                    <h2 class="text-center text-warning mb-4">Edit Song</h2>
                    
                    <div class="mb-3">
                        <label class="form-label">Artist Name</label>
                        <input type="text" name="artist" class="form-control" value="<?php echo $song['artist']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Song Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $song['title']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control" value="<?php echo $song['year']; ?>" required>
                    </div>

                    <button type="submit" name="update_song" class="btn btn-warning w-100">Save Changes</button>
                    <a href="index.php" class="btn btn-link w-100 text-white mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>