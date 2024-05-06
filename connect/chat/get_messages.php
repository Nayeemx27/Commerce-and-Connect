<?php
include '../config/config.php';

// Fetch messages from the database
$sql = "SELECT * FROM chat_messages ORDER BY timestamp ASC";
$result = $conn->query($sql);

if ($result === false) {
   die("Error executing the query: " . $conn->error);
}

if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      $user = ($row["username"]);
      $message = ($row["message"]);
      $ts = ($row["timestamp"]);

      echo '<div class="message my-3 bg-light border rounded rounded-4  ps-2">' . $ts . '</br><strong> ' . $user . ' : </strong> ' . $message . '</div>';
   }
}

$conn->close();
?>
