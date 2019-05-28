<section>
      <h3>
        Edit - Perorangan
        <small><i> - Individual</i></small>
      </h3>
      <hr>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Form</li>
        <li class="active">Perorangan</li>
      </ol>
</section>

<input type="hidden" id="id" name="id" value='<?php echo $id; ?>'>
<input type="hidden" id="isNull" name="isNull" value='<?php echo $isNull; ?>'>

<!-- ini digunakan untuk script_3.php ------------------------------------------------------------------->
<input type="hidden" id="kabupaten" name="kabupaten" value='<?php echo $data2[16]; ?>'>
<input type="hidden" id="kecamatan" name="kecamatan" value='<?php echo $data2[17]; ?>'>
<input type="hidden" id="kelurahan" name="kelurahan" value='<?php echo $data2[18]; ?>'>
<input type="hidden" id="kodepos" name="kodepos" value='<?php echo $data2[19]; ?>'>
<!-- ini digunakan untuk script_3.php ------------------------------------------------------------------->

<form action="<?php echo base_url(). 'mds/update/'.$id; ?>" method="post" id="formedit">
    <div class="wizards" style="margin-bottom: 30px">
        
        <div class="progressbar">
            <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div> <!-- 19.66% -->
        </div>
        <!-- MENAMPILKAN STEP ICON PROGRESS -->
        <?php 
            foreach ($step as $step) {
                echo 
                "
                <div class='form-wizard ".$step->active."'>
                    <div class='wizard-icon'><i class='".$step->icon."'></i></div>
                    <p>".$step->step_name."</p>
                </div>
                ";
            }
        ?>
        <!-- ============================== -->
    </div>
    <hr>
    <!-- STEP 1 -->
    <fieldset style="margin-bottom: 30px">
        <div class="box box-warning ">
            <div class="box-body">
                <div class="wizard-pane" role="tabpanel">
                    <div class="form-group">

                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-next" >Next</button> 
                    </div>

                    <?php
                    $h = 0;
                    foreach ($list1 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase' value='".$data1[$h]."'>
                            </div>
                            ";
                            $h++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase' value='".$data1[$h]."'>
                            </div>
                            ";
                            $h++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase' value='".$data1[$h]."'>
                            </div>
                            ";
                            $h++;
                        }
                        elseif ($list->type == 'sparate') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='box-header with-border' style='padding:5px'>
                                  <h3 class='box-title' style='color:orange'>".$list->list."</h3>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'textbox') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='form-group'>
                                  <label style='font-size: 12px'>".$list->list."</label>
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase' >".$data1[$h]."</textarea>
                                </div>
                            </div>
                            ";
                            $h++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        if ($data1[$h] == $drop->id_list) {
                                            echo "
                                            <option value='".$drop->id_list."' selected='selected'>".$drop->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option value='".$drop->id_list."' >".$drop->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $h++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        if ($data1[$h] == $dropx->id_list) {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' selected='selected'>".$dropx->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' >".$dropx->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $h++;
                        }
                        elseif ($list->type == 'date') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag." value='".$data1[$h]."'>
                                </div>
                            </div>
                            ";
                            $h++;
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-next">Next</button>
        </div>
    </fieldset>
        <!-- END STEP 1 -->

    <!-- STEP 2 -->
    <fieldset style="margin-bottom: 30px">
        <div class="box box-warning ">
            <div class="box-body">
                <div class="wizard-pane" role="tabpanel">
                    <div class="form-group">

                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next" >Next</button> 
                    </div>

                    <?php
                    $i = 0;
                    foreach ($list2 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase' value='".$data2[$i]."'>
                            </div>
                            ";
                            $i++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase' value='".$data2[$i]."'>
                            </div>
                            ";
                            $i++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase' value='".$data2[$i]."'>
                            </div>
                            ";
                            $i++;
                        }
                        elseif ($list->type == 'sparate') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='box-header with-border' style='padding:5px'>
                                  <h3 class='box-title' style='color:orange'>".$list->list."</h3>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'textbox') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='form-group'>
                                  <label style='font-size: 12px'>".$list->list."</label>
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase' >".$data2[$i]."</textarea>
                                </div>
                            </div>
                            ";
                            $i++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        if ($data2[$i] == $drop->id_list) {
                                            echo "
                                            <option value='".$drop->id_list."' selected='selected'>".$drop->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option value='".$drop->id_list."' >".$drop->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $i++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        if ($data2[$i] == $dropx->id_list) {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' selected='selected'>".$dropx->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' >".$dropx->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $i++;
                        }
                        elseif ($list->type == 'date') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag." value='".$data2[$i]."'>
                                </div>
                            </div>
                            ";
                            $i++;
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-previous">Previous</button>
            <button type="button" class="btn btn-next">Next</button>
        </div>
    </fieldset>
        <!-- END STEP 2 -->
    
    <!-- STEP 3 -->
    <fieldset style="margin-bottom: 30px">
        <div class="box box-warning ">
            <div class="box-body">
                <div class="wizard-pane" role="tabpanel">
                    <div class="form-group">

                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next" >Next</button> 
                    </div>

                    <?php
                    $j = 0;
                    foreach ($list3 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase' value='".$data3[$j]."'>
                            </div>
                            ";
                            $j++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase' value='".$data3[$j]."'>
                            </div>
                            ";
                            $j++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase' value='".$data3[$j]."'>
                            </div>
                            ";
                            $j++;
                        }
                        elseif ($list->type == 'sparate') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='box-header with-border' style='padding:5px'>
                                  <h3 class='box-title' style='color:orange'>".$list->list."</h3>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'textbox') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='form-group'>
                                  <label style='font-size: 12px'>".$list->list."</label>
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase' >".$data3[$j]."</textarea>
                                </div>
                            </div>
                            ";
                            $j++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        if ($data3[$j] == $drop->id_list) {
                                            echo "
                                            <option value='".$drop->id_list."' selected='selected'>".$drop->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option value='".$drop->id_list."' >".$drop->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $j++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        if ($data3[$j] == $dropx->id_list) {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' selected='selected'>".$dropx->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' >".$dropx->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $j++;
                        }
                        elseif ($list->type == 'date') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag." value='".$data3[$j]."'>
                                </div>
                            </div>
                            ";
                            $j++;
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-previous">Previous</button>
            <button type="button" class="btn btn-next">Next</button>
        </div>
    </fieldset>
        <!-- END STEP 3 -->
    <!-- STEP 4 -->
    <fieldset style="margin-bottom: 30px">
        <div class="box box-warning ">
            <div class="box-body">
                <div class="wizard-pane" role="tabpanel">
                    <div class="form-group">

                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next" >Next</button> 
                    </div>

                    <?php
                    $k = 0;
                    foreach ($list4 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase' value='".$data4[$k]."'>
                            </div>
                            ";
                            $k++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase' value='".$data4[$k]."'>
                            </div>
                            ";
                            $k++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase' value='".$data4[$k]."'>
                            </div>
                            ";
                            $k++;
                        }
                        elseif ($list->type == 'sparate') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='box-header with-border' style='padding:5px'>
                                  <h3 class='box-title' style='color:orange'>".$list->list."</h3>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'textbox') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='form-group'>
                                  <label style='font-size: 12px'>".$list->list."</label>
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase' >".$data4[$k]."</textarea>
                                </div>
                            </div>
                            ";
                            $k++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        if ($data4[$k] == $drop->id_list) {
                                            echo "
                                            <option value='".$drop->id_list."' selected='selected'>".$drop->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option value='".$drop->id_list."' >".$drop->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $k++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        if ($data4[$k] == $dropx->id_list) {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' selected='selected'>".$dropx->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' >".$dropx->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $k++;
                        }
                        elseif ($list->type == 'date') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag." value='".$data4[$k]."'>
                                </div>
                            </div>
                            ";
                            $k++;
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-previous">Previous</button>
            <button type="button" class="btn btn-next">Next</button>
        </div>
    </fieldset>
        <!-- END STEP 4 -->
    <!-- STEP 5 -->
    <fieldset style="margin-bottom: 30px">
        <div class="box box-warning ">
            <div class="box-body">
                <div class="wizard-pane" role="tabpanel">
                    <div class="form-group">

                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="submit" name="save" class="btn btn-primary btn-submit">Update</button> 
                    </div>

                    <?php
                    $l = 0;
                    foreach ($list5 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase' value='".$data5[$l]."'>
                            </div>
                            ";
                            $l++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase' value='".$data5[$l]."'>
                            </div>
                            ";
                            $l++;
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase' value='".$data5[$l]."'>
                            </div>
                            ";
                            $l++;
                        }
                        elseif ($list->type == 'sparate') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='box-header with-border' style='padding:5px'>
                                  <h3 class='box-title' style='color:orange'>".$list->list."</h3>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'textbox') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <div class='form-group'>
                                  <label style='font-size: 12px'>".$list->list."</label>
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase' >".$data5[$l]."</textarea>
                                </div>
                            </div>
                            ";
                            $l++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        if ($data5[$l] == $drop->id_list) {
                                            echo "
                                            <option value='".$drop->id_list."' selected='selected'>".$drop->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option value='".$drop->id_list."' >".$drop->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $l++;
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option >".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        if ($data5[$l] == $dropx->id_list) {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' selected='selected'>".$dropx->list."</option>
                                            "   ;
                                        }
                                        else {
                                            echo "
                                            <option class = '".$dropx->id_segment."' value='".$dropx->id_list."' >".$dropx->list."</option>
                                            "   ;
                                        }
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                            $l++;
                        }
                        elseif ($list->type == 'date') 
                        {
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag." value='".$data5[$l]."'>
                                </div>
                            </div>
                            ";
                            $l++;
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-previous">Previous</button>
            <button type="submit" name="save" class="btn btn-primary btn-submit">Update</button>
        </div>
    </fieldset>
        <!-- END STEP 5 -->
</form>

<script>
    var Null = document.getElementById("isNull").value;
    var Id = document.getElementById("id").value;
</script>
<script>
    var x = document.getElementById("frm_030").value;

    var a = document.getElementById('frm_094');
    var b = a.options[a.selectedIndex].text;
   
</script>