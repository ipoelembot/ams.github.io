<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <?php
            foreach ($step as $step) 
            {
                if ($step->step_id <> 1) {
                    $disabled = "disabled='disabled'";
                } else $disabled = "";
                if ($step->step_id == 1) 
                {
                echo 
                "
                <div class='stepwizard-step' style='color:black'>
                    <a href='#step-".$step->step_id."' type='button' class='btn btn-primary btn-circle' ".$disabled."><i class='".$step->icon." warna' ></i></a>
                    <p>".$step->nama_step."</p>
                </div>
                ";
                } else {
                echo 
                "
                <div class='stepwizard-step'>
                    <a href='#step-".$step->step_id."' type='button' class='btn btn-default btn-circle' ".$disabled."><i class='".$step->icon." warna'></i></a>
                    <p>".$step->nama_step."</p>
                </div>
                ";  
                }
            }
        ?>
    </div>
</div>