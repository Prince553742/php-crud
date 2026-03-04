<?php
class Playlist {
    private $conn;
    private $table = "playlist";
    public function __construct($db) {
        $this->conn = $db;
    }

    public function updateSong($id, $artist, $title, $year) {
    $query = "UPDATE " . $this->table . " SET artist = ?, title = ?, year = ? WHERE songid = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ssii", $artist, $title, $year, $id);
    return $stmt->execute();
    }

    public function getSongById($id) {
    $query = "SELECT * FROM " . $this->table . " WHERE songid = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    }

    public function addSong($artist, $title, $year) {
        $query = "INSERT INTO " . $this->table . " (artist, title, year) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $artist, $title, $year);
        return $stmt->execute();
    }

    public function getSongs() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY songid DESC";
        return $this->conn->query($query);
    }

    public function deleteSong($id) {
        $query = "DELETE FROM " . $this->table . " WHERE songid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>