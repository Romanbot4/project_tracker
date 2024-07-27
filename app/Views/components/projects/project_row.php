<?php
?>

<tr>
    <td><input type="checkbox" name="" id="<?php echo $project->id ?>"></td>
    <th><?php echo $project->id ?></th>
    <td><?php echo $project->title ?></td>
    <td><?php
        echo dateTimePublic($project->endAt)
        ?></td>
    <td><?php echo $project->title ?></td>
    <td><?php echo $project->title ?></td>
</tr>