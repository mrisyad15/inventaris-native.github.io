<?php
$limit = 10;
?>

<form method="post">
    <?php
    for ($i = 1; $i <= $limit; $i++) {
        ?>

        <input name="anything[]" type="text" /><br>

    <?php } ?>
    <input type="hidden" name="op" value="sent" />
    <input type="submit"  value="submit" />
</form>

<?php
if (!empty($_POST["op"])) {

    for ($i = 1; $i <= $limit; $i++) {
        if (strlen($_POST["anything"][$i]) !== 0) {
            ?>
            <p>The value of the <?php echo $i; ?> text field is: <?php echo $_POST["anything"][$i]; ?>
                <?php
            } else {
                ?>
            <p><?php echo $i; ?> was not set.</p>
            <?php
        }
    }
}
?>