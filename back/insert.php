<?php
$sql = "INSERT INTO Students (name, lastname, email) VALUES ('Thom', 'Vial', 'thom.v@some.com')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>