<?php
if ($project == null) {
    echo "<tr>"
        . "  <td>&nbsp;</td>"
        . "  <th></th>"
        . "  <td></td>"
        . "  <td></td>"
        . "  <td></td>"
        . "  <td></td>"
        . "</tr>";
    return;
}

?>


<tr>
    <td><input type="checkbox" name="items[]" value="<?php echo $project->id ?>" id="<?php echo $project->id ?>"></td>
    <th><?php echo $project->id ?></th>
    <td><?php echo $project->title ?></td>
    <td><?php
        echo dateTimePublic($project->endAt)
        ?></td>
    <td><?php echo $project->title ?></td>
    <td><?php echo $project->title ?></td>
</tr>