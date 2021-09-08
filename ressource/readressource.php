<?php
$sql = "SELECT * FROM ressource WHERE fk_user=" . $_SESSION['user'];

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td colspan="10"><?= $row['ressource_name'] ?> <br> <?= $row['ressource_type'] ?>

                <span style="float:right">
           <button type="button" class="btn btn-info btn-sm mx-1 editbtn" id="<?= $row['id_ressource'] ?>">Edit</button>
           <span style="display:none"><?= $row['id_ressource'] ?></span>
           <span style="display:none"><?= $row['ressource_name'] ?></span>
           <span style="display:none"><?= $row['ressource_type'] ?></span>
           <span style="display:none"><?= $row['ressource_status'] ?></span>

            <button type="button" class="btn btn-danger btn-sm mx-1 deletebtn"
                    id="<?= $row['id_ressource'] ?>">Del.</button>

   </span>
            </td>

            <!-- <?php if ($project_before != 0) { ?>
    <td colspan="<?= $project_before ?>"></td>
 <?php } ?>
<?php if ($project_duration != 0){ ?>
    <td colspan="<?= $project_duration ?>" style="background-color: <?= $row['project_color'] ?>; cursor: pointer; ">
    
    <?php
            $result2 = $connect->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    ?>
<span style="border: 1px solid black; padding: 2px; margin: 2px;" ><?= $row2['name_resProject'] ?></span>
<span style="border: 1px solid black; padding: 2px; margin: 2px;"><?= $row2['quantity_resProject'] ?></span>

<?php ;
                }
            } ?> -->
            <!--       <div class="d-flex align-content-start flex-wrap">


            <span style="border: 1px solid black; padding: 2px; margin: 2px;">Bruno</span>
            <span style="border: 1px solid black; padding: 2px; margin: 2px;">Jean Maxime</span>
            <span style="border: 1px solid black;padding: 2px; margin: 2px;">Bernard</span>
            <span style="border: 1px solid black; padding: 2px; margin: 2px;">Thierry</span>
            <span style="border: 1px solid black; padding: 2px; margin: 2px;">Jean Michel</span>
            <span style="border: 1px solid black; padding: 2px; margin: 2px;">Philippe Lucas</span>

            </div> -->
            <!--     </td>
<?php } ?>
<?php if ($project_after > 0) { ?>
    <td colspan="<?= $project_after ?>"></td>
 <?php } ?> -->

        </tr>

        <?php ;
    }
} else {
    echo "No result";
}

?>


