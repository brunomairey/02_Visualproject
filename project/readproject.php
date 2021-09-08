<?php
$sql = "SELECT * FROM project WHERE fk_user=" . $_SESSION['user'];

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $project_before = $row['starting_week'];
        if ($project_before >= 45 && $project_before <= 56) {
            $project_before -= 45;

        } elseif ($project_before > 0 && $project_before <= 17) {
            $project_before += 8;

        } else {
            echo " i is outside of the field";
        }


        $project_duration = $row['project_duration'];
        $project_before_and_duration = $project_duration + $project_before;
        $project_after = 26 - $project_before_and_duration;
        if ($project_before_and_duration >= 26) {
            $project_duration = 26 - $project_before;
        } ?>

        <tr>
            <td colspan="10"><?= $row['project_name'] ?>

                <span style="float:right">
           <button type="button" class="btn btn-info btn-sm mx-1 editbtn" id="<?= $row['id_project'] ?>">Edit</button>
           <span style="display:none"><?= $row['id_project'] ?></span>
           <span style="display:none"><?= $row['project_name'] ?></span>

           <?php
           $i = $row['starting_week'];
           if ($i >= 45) {
               $year = " - 2020";
           } else {
               $year = " - 2021";
           } ?>

           <span style="display:none"><?= $row['starting_week'] . $year ?></span>
           <span style="display:none"><?= $row['project_duration'] ?></span>
           <span style="display:none"><?= $row['nb_ressource'] ?></span>
           <span style="display:none"><?= $row['project_color'] ?></span>

            <button type="button" class="btn btn-danger btn-sm mx-1 deletebtn"
                    id="<?= $row['id_project'] ?>">Del.</button>

   </span>
            </td>

            <?php if ($project_before != 0) { ?>
                <td colspan="<?= $project_before ?>"></td>
            <?php } ?>
            <?php if ($project_duration != 0) { ?>
                <td colspan="<?= $project_duration ?>"
                    style="background-color: <?= $row['project_color'] ?>; cursor: pointer; ">

                    <!--  <?php
                    $result2 = $connect->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
                            ?>
<span style="border: 1px solid black; padding: 2px; margin: 2px;" ><?= $row2['name_resProject'] ?></span>
<span style="border: 1px solid black; padding: 2px; margin: 2px;"><?= $row2['quantity_resProject'] ?></span>
style="display:none"
<?php ;
                        }
                    } ?> -->

                </td>
            <?php } ?>
            <?php if ($project_after > 0) { ?>
                <td colspan="<?= $project_after ?>"></td>
            <?php } ?>
        </tr>

        <?php ;
    }
} else {
    echo "No result";
}

?>


