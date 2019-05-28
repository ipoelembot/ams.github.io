<form action="<?php echo base_url();?>perorangan/simpanData_1" method="post">
    <!-- STEP 1 -->
    <fieldset style="margin-bottom: 30px; display: block;">
        <div class="box box-warning ">
            <div class="box-body">
                <div class="wizard-pane" role="tabpanel">
                    <div class="form-group">
                    
                            
                            <div class="col-md-6" style="padding: 5px">
                                <label style="font-size: 12px">No. Akad</label>
                                <input class="form-control" id="frm_001" name="frm_001" placeholder="" required="required" style="text-transform:uppercase" type="text">
                            </div>
                            

                            
                    </div>
                </div>
            </div>
        </div>

    </fieldset>
        <!-- END STEP 1 -->
    <button type="submit" class="btn btn-default">Submit</button>
</form>







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
                        if ($list->type == 'input') 
                        {
                            echo 
                            "
                            <div class='col-md-".$list->col_length."' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."' required='".$list->required_flag."' style='text-transform:uppercase'>
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
                                  <textarea class='form-control' rows='2' id='".$list->id_list."' style='resize: none'></textarea>
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
                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' required='".$list->required_flag."'>
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
                        if ($list->type == 'input') 
                        {
                            echo 
                            "
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' required='".$list->required_flag."'>
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
                    <br>   
                          <div class="box-group" id="accordion">
                            
                            <div class="panel">
                              <div class="box-header">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    Data Agunan Primary
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                  <?php
                                    foreach ($list4 as $list) {
                                        if ($list->type == 'input') 
                                        {
                                            echo 
                                            "
                                            <div class='col-md-6' style='padding: 5px'>
                                                <label style='font-size: 12px'>".$list->list."</label>
                                                <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."' required='".$list->required_flag."' style='text-transform:uppercase'>
                                            </div>
                                            ";
                                        }
                                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                                        {
                                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                                            echo "
                                            <div class='col-md-6' style='padding: 5px'>
                                                <label style='font-size: 12px'>".$list->list."</label>
                                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                                            <div class='col-md-6' style='padding: 5px'>
                                                <label style='font-size: 12px'>".$list->list."</label>
                                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                                            <div class='col-md-6' style='padding: 5px'>
                                                <label style='font-size: 12px'>".$list->list."</label>
                                                <div class='input-group date'>
                                                  <div class='input-group-addon'>
                                                    <i class='fa fa-calendar'></i>
                                                  </div>
                                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' required='".$list->required_flag."'>
                                                </div>
                                            </div>
                                            ";
                                        }
                                    }

                                    ?>
                                </div>
                              </div>
                            </div>
                            <!------------ Tab Tambah Agunan Ke 2 ------------->
                            <div class="panel box box-danger">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <i class="fa fa-plus"></i> Tambah Agunan
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                  wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                  eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                  assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                  nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                  farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                  labore sustainable VHS.
                                </div>
                              </div>
                            </div>

                            <!------------ Tab Tambah Agunan Ke 3 ------------->
                            <div class="panel box box-success">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <i class="fa fa-plus"></i> Tambah Agunan
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                  wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                  eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                  assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                  nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                  farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                  labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                          </div>
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
                        if ($list->type == 'input') 
                        {
                            echo 
                            "
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."' required='".$list->required_flag."' style='text-transform:uppercase'>
                            </div>
                            ";
                        }
                        elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                        {
                            $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                            echo "
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <select class='select2' id='".$list->id_list."' required='".$list->required_flag."'>
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
                            <div class='col-md-6' style='padding: 5px'>
                                <label style='font-size: 12px'>".$list->list."</label>
                                <div class='input-group date'>
                                  <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                  </div>
                                  <input type='text' class='form-control pull-right' id='".$list->id_list."' required='".$list->required_flag."'>
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
            <button type="submit" name="save" class="btn btn-primary btn-submit" >Submit</button>
        </div>    

    </fieldset>
    <!-- END STEP 5 -->




    <?php
        echo 'Ini adalah' . $segment;
        echo "<br>";
        echo 'Ini adalah' . $perihal;
        echo "<br>";
        echo 'Ini adalah' . $jenis_akad;                        
        echo "<br>";
        echo 'Ini adalah' . $tujuan_penggunaan;             
        echo "<br>";
        echo 'Ini adalah' . $produk_pembiayaan;     
        echo "<br>";
        echo 'Ini adalah' . $kode_produk;                   
        echo "<br>";
        echo 'Ini adalah' . $komite_level;                          
        echo "<br>";
        echo 'Ini adalah' . $tgl_pengajuan;                 
        echo "<br>";
        echo 'Ini adalah' . $no_akad;                       
        echo "<br>";
        echo 'Ini adalah' . $tgl_akad; 
?>

