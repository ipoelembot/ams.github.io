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
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' required='".$list->required_flag."' style='text-transform:uppercase'>
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' required='".$list->required_flag."' style='text-transform:uppercase'></textarea>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' required='".$list->required_flag."' style='text-transform:uppercase'>
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' required='".$list->required_flag."' style='text-transform:uppercase'></textarea>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' required='".$list->required_flag."' style='text-transform:uppercase'>
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' required='".$list->required_flag."' style='text-transform:uppercase'></textarea>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' required='".$list->required_flag."' style='text-transform:uppercase'>
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' required='".$list->required_flag."' style='text-transform:uppercase'></textarea>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."'  required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event)' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'input' && $list->input_type == 'number' && $list->format_number == 'yes') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' name='".$list->id_list."' placeholder='".$list->placeholder."' onkeypress='return isNumberKey(event2)' required='".$list->required_flag."' style='text-transform:uppercase'>
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' name='".$list->id_list."' style='resize: none' required='".$list->required_flag."' style='text-transform:uppercase'></textarea>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                <select class='form-control select2' style='width: 100%;' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' name='".$list->id_list."' required='".$list->required_flag."'>
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





<form name="myForm" action="/action_page.php" onsubmit="return validateForm()" method="post">
<!-- <input type="text" name="fname"> -->
<select name="fname">
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
</select>
<input type="submit" value="Submit">
</form>


<script>
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>





<!-- Step 4 -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th colspan="2">Data Agunan</th>
    </tr>
    <tr>
  <tbody>

    <?php
      $l = 0;
      foreach ($list4 as $list) {
        if ($list->type != 'sparate') {
          echo 
          "<tr>
                <td width='25%'>".$list->list."</td>
                <td width='75%'>".$data4[$l]."</td>
           </tr>
          ";
          $l++;
        }
      }
    ?>

  </tbody>
</table>
<!-- End Step 4 -->

<!-- Step 5 -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th colspan="2">Profil Penjamin</th>
    </tr>
    <tr>
  <tbody>

    <?php
      $m = 0;
      foreach ($list5 as $list) {
        if ($list->type != 'sparate') {
          echo 
          "<tr>
                <td width='25%'>".$list->list."</td>
                <td width='75%'>".$data5[$m]."</td>
           </tr>
          ";
          $m++;
        }
      }
    ?>

  </tbody>
</table>
<!-- End Step 5 -->


            var a = document.getElementsByTagName("select")[38].id;
            var b = document.getElementsByTagName("select")[39].id;
            var c = document.getElementsByTagName("select")[40].id;
            var d = document.getElementsByTagName("select")[41].id;
            var e = document.getElementsByTagName("select")[42].id;
            var f = document.getElementsByTagName("select")[47].id; // ini sementara di-bypass karena kosong
            var g = document.getElementsByTagName("select")[49].id;
            var h = document.getElementsByTagName("select")[50].id;
            var i = document.getElementsByTagName("select")[51].id;
            var j = document.getElementsByTagName("select")[52].id;
            var k = document.getElementsByTagName("select")[53].id;

            if ((a == "frm_088") /*&& (b == "frm_089") && (c == "frm_090") && (d == "frm_091") && (e == "frm_092") &&
                (f == "frm_100") && (g == "frm_112") && (h == "frm_113") && (i == "frm_114") && (j == "frm_115") &&
                (k == "frm_116") */){
                next_step = true;
            }