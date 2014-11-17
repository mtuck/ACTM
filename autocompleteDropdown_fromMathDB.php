<?php

$conn = new mysqli('localhost', 'abrown', 'serverpw6', 'mathdb') 
or die ('Cannot connect to db');

    $result = $conn->query("select id, name from schools");
    
    echo "<html>";
    echo "<body>";
    echo "<datalist id="schools" name='id'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $id = $row['id'];
                  $name = $row['name']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
                 
}

    echo "</datalist>";
    echo "</body>";
    echo "</html>";
?>