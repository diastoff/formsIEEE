<?php
$db = parse_url('postgres://kigumqkx:ZqtNYkmTbjWke_j3pKvdy3r7kYD2KhIB@kesavan.db.elephantsql.com/kigumqkx');

$servername = $db["host"];
$username = $db["user"];
$password = $db["pass"];
$dbname = ltrim($db["path"], '/');

// Create connection
$conn = pg_connect("host=$servername dbname=$dbname user=$username password=$password");

// Check connection
if (!$conn) {
  die("Connection failed: " . pg_last_error());
}

// Function to safely insert data into the database
function safeInsert($conn, $nome, $email, $ra, $tel, $genero, $registro, $capitulo, $campus) {
  // Prepare and bind
  $result = pg_prepare($conn, "my_query", 'INSERT INTO voluntarios (nome, email, ra, tel, genero, registro, capitulo, campus) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)');
  
  // Execute the statement
  $result = pg_execute($conn, "my_query", array($nome, $email, $ra, $tel, $genero, $registro, $capitulo, $campus));

  // Check the result
  if ($result === FALSE) {
    echo "Error: " . pg_last_error($conn);
  } else {
    echo "New record created successfully";
  }
}
?>
