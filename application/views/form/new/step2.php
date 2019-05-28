<!-- =================================================== -->
<!-- Kontent Untuk Step 2 atau Step Data Data Perusahaan -->
<!-- =================================================== -->

<div class="row setup-content" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3 class="block">Data Perusahaan <small style="font-size: 11px; color: #4AAAB2"><i>*) Mandatory. Harus Diisi!!</i></small></h3>
            <hr>
            <div class="col-md-12">
                <button class="btn btn-primary nextBtn btn-sm pull-right" type="button" style="margin-bottom: 20px">Next</button>
            </div>
            <?php
            foreach ($form2 as $list_form) {

                /* -- Parameter Inisial Bintang (*) Untuk Field Mandatory -- */
                if ($list_form->required_flag == 'required') {$req = ' *';} else {$req = '';}

                /* -- Parameter Untuk Function Class Div -- */
                if ($list_form->flag_switch == 'Y') {$class_function = $list_form->id_switch." tab".$list_form->step."function col-md-".$list_form->col_length;} else {$class_function = "col-md-".$list_form->col_length;}

                /* -- Parameter Field Select Option --*/
                if ($list_form->type == 'select' && $list_form->default == 'Y') {
                    $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");}
                elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                    $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");} 
                elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                    $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");}

                    $drop = $list_drop->result();
                    $count = count($drop);

                /* -- Parameter Field Disabled --*/    
                if ($count <> 1) {$disabled = '';} else {$disabled = 'disabled';}

                /* -- Function untuk automasi menampilkan sparator ribuan pada field number -- */
                if ($list_form->class_type_number == 'Y') {$classNumber = '';} else {$classNumber = '';}

                /* == Function untuk field hanya bisa diinput angka saja == */
                if ($list_form->type_text == 'number') {$onkeypress = "onkeypress='isInputNumber(event)'";} else {$onkeypress = "";}
                    
                /* -- Array Form Field dari table -- */
                if ($list_form->type == 'text') 
                {
                    echo 
                    "<div style='padding:5px;' class='form-group col-md-".$list_form->col_length."'>
                        <label style='font-size:12px'>".$list_form->list."<span class='required' style='color:red'>".$req."</span></label>
                        <input style='font-size:12px; text-transform:uppercase;' required='".$list_form->required_flag."' type='text' class='form-control ".$classNumber."' id='".$list_form->id_list."' name='".$list_form->id_list."' ".$onkeypress.">
                    </div>";
                }
                elseif ($list_form->type == 'select') 
                {
                    echo 
                    "<div style='padding: 5px;' class='form-group ".$class_function."'>
                        <label style='font-size:12px'>".$list_form->list."<span class='required' style='color:red'>".$req."</span></label>
                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."' name='".$list_form->id_list."' ".$disabled."  required='".$list_form->required_flag."'>";
                            if ($list_form->default == 'Y') {
                                echo 
                                "";
                            } else {echo "<option selected='selected' value=''>Pilih</option>";}
                            
                        foreach ($drop as $drop) 
                        {
                            echo "<option value='".$drop->id_list."'>".$drop->list."</option>";
                        }
                    echo 
                        "</select>
                    </div>";
                }
                elseif ($list_form->type == 'date') {
                    echo 
                    "
                        <div style='padding: 5px;' class='form-group ".$class_function."'>
                            <label style='font-size:12px'>".$list_form->list."<span class='required' style='color:red'>".$req."</span></label>
                            <div class='input-group date'>
                                <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                </div>
                                <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."' name='".$list_form->id_list."' required='".$list_form->required_flag."'>
                            </div>
                        </div>
                    ";
                }
                elseif ($list_form->type == 'textarea') {
                    echo 
                    "
                        <div style='padding: 5px;' class='form-group ".$class_function."'>
                            <label style='font-size:12px'>".$list_form->list."<span class='required' style='color:red'>".$req."</label>
                            <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."' name='".$list_form->id_list."' required='".$list_form->required_flag."'></textarea>
                        </div>
                    ";
                }

                }
            ?>
        <div class="col-md-12">
            <button class="btn btn-primary nextBtn btn-sm pull-right" type="button" style="margin-top: 30px; margin-bottom: 50px">Next</button>
        </div>
    </div>
</div>
</div>