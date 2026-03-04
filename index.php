<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'classes/database.php';
require_once 'classes/playlist.php';

$dbObj = new Database();
$db = $dbObj->getConnection();
$playlist = new Playlist($db);
$songs = $playlist->getSongs(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song CRUD</title>
    <link rel="stylesheet" href="bootstrap-5.3.8-dist/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white">
    <div class="container py-5">
        <div class="row justify-content-center">
            
            <div class="col-md-5">
                <form action="action.php" method="POST" class="border border-white p-5 rounded shadow-lg">
                    <h2 class="text-center mb-4">Add New Song</h2>
                    
                    <div class="mb-3">
                        <label class="form-label">Artist Name</label>
                        <input type="text" class="form-control p-3" name="artist" placeholder="e.g. Queen" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Song Title</label>
                        <input type="text" class="form-control p-3" name="title" placeholder="e.g. Bohemian Rhapsody" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Year Published</label>
                        <input type="number" class="form-control p-3" name="year" placeholder="1975" required>
                    </div>

                    <button type="submit" name="add_song" class="btn btn-light btn-lg w-100">Add Song</button>
                </form>
            </div>

            <div class="col-md-12 mt-5">
                <h2 class="text-center mb-4">My Playlist</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-hover border border-secondary">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Artist</th>
                                <th>Song Title</th>
                                <th>Year</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($songs && $songs->num_rows > 0): ?>
                                <?php while($row = $songs->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['songid']; ?></td>
                                    <td><?php echo $row['artist']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['year']; ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?php echo $row['songid']; ?>" class="btn btn-sm btn-outline-warning me-2">Update</a>
                                        
                                        <a href="action.php?delete=<?php echo $row['songid']; ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No songs found in playlist.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>