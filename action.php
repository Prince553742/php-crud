<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'classes/database.php';
require_once 'classes/playlist.php';

$database = new Database();
$db = $database->getConnection();
$playlist = new Playlist($db);

if (isset($_POST['add_song'])) {
    $artist = $_POST['artist'];
    $title  = $_POST['title'];
    $year   = $_POST['year'];

    if ($playlist->addSong($artist, $title, $year)) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if ($playlist->deleteSong($id)) {
        header("Location: index.php?status=deleted");
    }
    exit();
}
?>