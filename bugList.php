<?php
require("includes/header.php");

//add a link to add a bug
echo '<a href="add-bug.php">Add a new bug</a>';
echo '<table>
<thead>
<th>Bug Name</th>
<th>Bug Description</th>
<th>Bug Type</th>
<th>Bug Solution</th>
</thead>';

//connect to db
require("includes/db.php");

//create query
$sql = "SELECT b.bugName,b.bugDescription,bt.bugType,b.solution FROM bugs b INNER JOIN bug_types bt ON b.bugType=bt.bugId;";

//create command 
$cmd = $db->prepare($sql);

$cmd->execute();

$bugs = $cmd->fetchAll();

forEach($bugs as $bug){
    echo '<tr>
    <td>' . $bug['bugName'] .'</td>'.
    '<td>' . $bug['bugDescription'] .'</td>'.
    '<td>' . $bug['bugType'] . '</td>'.
    '<td>' . $bug['solution'] .'</td>'.
    '</tr>';
}
echo '</table>';

?>

