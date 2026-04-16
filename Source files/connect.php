<?php
$spojenie=mysqli_connect("localhost", "root", "", "system_kniznic");
if (!$spojenie):
    echo "Spojenie s DB sa nepodarilo !";

endif;