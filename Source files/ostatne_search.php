<div>
    <?php
    $sql2 = MySQLi_Query($spojenie,"SELECT id_kniznice, nazov_kniznice FROM kniznica");
    ?>

    <Ul>
        <?php
        while($zaznam2=mysqli_fetch_array($sql2))
        ?>
        <li onclick="kniznica(<?php echo $zaznam2['id_kniznice']?>)"><?php echo $zaznam2['nazov_kniznice']?></li>
    </Ul>
</div>