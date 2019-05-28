<!--  
====================================
Author  :   Bank Muamalat Indonesia
Date    :   28 Septemebr 2018
Page    :   'perorangan-form.php'
====================================
-->


<section>
      <h3>
        Perorangan
        <small><i> - Individual</i></small>
      </h3>
      <hr>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Form</li>
        <li class="active">Perorangan</li>
      </ol>
</section>

<!-- ini digunakan untuk script_3.php ------------------------------------------------------------------->
<input type="hidden" id="kabupaten" name="kabupaten" value=''>
<input type="hidden" id="kecamatan" name="kecamatan" value=''>
<input type="hidden" id="kelurahan" name="kelurahan" value=''>
<input type="hidden" id="kodepos" name="kodepos" value=''>
<!-- ini digunakan untuk script_3.php ------------------------------------------------------------------->

<form action="<?php echo base_url(). 'perorangan/simpanData'; ?>" method="post" name="form1">
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
                    foreach ($list1 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase'></textarea>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        echo "
                                        <option value='".$drop->id_list."'>".$drop->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        echo "
                                        <option class = '".$dropx->id_segment."' value='".$dropx->id_list."'>".$dropx->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                </div>
                            </div>
                            ";
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-next" >Next</button>
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
                        <button type="button" class="btn btn-next">Next</button>
                    </div>

                    <?php
                    foreach ($list2 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase'></textarea>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        echo "
                                        <option value='".$drop->id_list."'>".$drop->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        echo "
                                        <option class = '".$dropx->id_segment."' value='".$dropx->id_list."'>".$dropx->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                </div>
                            </div>
                            ";
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
                        <button type="button" class="btn btn-next">Next</button>
                    </div>

                    <?php
                    foreach ($list3 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase'></textarea>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        echo "
                                        <option value='".$drop->id_list."'>".$drop->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        echo "
                                        <option class = '".$dropx->id_segment."' value='".$dropx->id_list."'>".$dropx->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                </div>
                            </div>
                            ";
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
                        <button type="button" class="btn btn-next">Next</button>
                    </div>

                    <?php
                    foreach ($list4 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase'></textarea>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        echo "
                                        <option value='".$drop->id_list."'>".$drop->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        echo "
                                        <option class = '".$dropx->id_segment."' value='".$dropx->id_list."'>".$dropx->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                </div>
                            </div>
                            ";
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
                        <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
                    </div>

                    <?php
                    foreach ($list5 as $list) {
                        if ($list->type == 'input' && $list->input_type == 'text') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' ".$list->required_flag." style='text-transform:uppercase'>
                            </div>
                            ";
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' ".$list->required_flag." style='text-transform:uppercase'></textarea>
                                </div>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $drop) 
                                    {
                                        echo "
                                        <option value='".$drop->id_list."'>".$drop->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag == 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM $list->link_tbl");
                            echo "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                    <option selected='selected'>".$list->placeholder."</option>";
                                    ?>
                                    <?php foreach ($drop_record->result() as $dropx) {
                                        echo "
                                        <option class = '".$dropx->id_segment."' value='".$dropx->id_list."'>".$dropx->list."</option>
                                        "   ;
                                    }
                                echo "  
                                </select>
                            </div>
                            ";
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' ".$list->required_flag.">
                                </div>
                            </div>
                            ";
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-buttons">
            <button type="button" class="btn btn-previous">Previous</button>
            <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
        </div>
    </fieldset>
    <!-- END STEP 5 -->
</form>
