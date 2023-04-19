<?php 
require("includes/header.php");
?>
<form method="post" action="save-bug.php">
    <fieldset>
        <label for="bugName">Bug Name: </label>
        <input id="bugName" name="bugName"/>
    </fieldset>
    <fieldset>
        <label for="bugDescription">Bug bugDescription: </label>
        <textarea name="bugDescription" id="bug bugDescription"></textarea>
    </fieldset>
    <fieldset>
        <label for="bugType">Bug Name: </label>
        <select name="bugType" id="bugType">
            <?php 

            require("includes/db.php");

            $sql = "SELECT * FROM bug_types";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            
            $types = $cmd->fetchAll();

            forEach($types as $type){
                echo '<option value="' . $type['bugId'] . '">' .
                $type['bugType'] . '</option>';

            }
            ?>
        </select>
    </fieldset>
    <fieldset>
        <label for="solution">Bug Name: </label>
        <textarea id="solution" name="solution"></textarea>
    </fieldset>
    <button type="submit">Submit</button>

</form>