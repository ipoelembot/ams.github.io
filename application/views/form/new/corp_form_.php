<!--
==========================================================
============= CORPORATE FORM NEW APPLICATION =============
==========================================================
-->

<!-- Menampilkan Request URL - Segmentasi -->
<?php $segment = $_GET['new']; ?>
<?php $idx = $_GET['idx']; ?>

<!-- Judul 
<div style="font-size: 18px; padding-left: 40px; padding-right: 40px">
	Form Pengajuan Baru - <?php echo ucfirst($segment); ?>
	<hr>
</div>
-->
<div style="margin: 15px;" id="">
    
    <!-- Form Pengajuan Baru -->

    <div style="margin: 30px">
        <h3 class="page-title">
            Form Pengajuan Baru <small><?php echo ucfirst($segment); ?></small>
        </h3>
        <hr style="height: 3px; width: 100%; background-color: #FBB117; border: 0px">
        
        <h5>Step Pengisian Pengajuan Baru</h5>
        <br>

        <div id="smartwizard">
                <!--<div class="stepwizard-row setup-panel">-->
                    <ul>
                    <?php  
                        foreach ($step as $step) 
                        {
                            if ($step->step_id == 1) 
                            {
                                echo 
                                "<li>
                                    <a href='#step-".$step->step_id."'>".$step->step_id."<br><small>".$step->nama_step."</small></a>
                                </li>
                                ";
                            } else 
                            {
                                echo 
                                "<li>
                                    <a href='#step-".$step->step_id."' disable='disable'>".$step->step_id."<br><small>".$step->nama_step."</small></a>
                                </li>
                                ";
                            }
                        }
                    ?>
                <!--</div>-->
                    </ul>
            

            <hr>
            <div style="margin: 10px">
                <form role="form" action="<?php echo base_url('form/simpannon'); ?>" method="post" class="mt-repeater form-horizontal" id="submit-form">
                    <div class="form-wizard">
                        <div class="form-body">
                            <div class="tab-content">
                                <h5 style="color: #4AAAB2"><i>*) Mandatory. Pastikan Data Yang Diinput Benar</i></h5>
                                <br>
                                <!-- Tab 1 Untuk Step 1 -->
                                <div class="row setup-content" id="step-1" style="margin-bottom: 20px">
                                    <?php
                                    foreach ($form1 as $list_form) {
                                        if ($list_form->type == 'text') {
                                            if ($list_form->required_flag == null) {
                                                    $req = '';
                                                } else {
                                                    $req = ' *';
                                                }
                                            echo 
                                            "
                                                <div style='padding:5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <input style='font-size:12px' type='text' class='form-control' id='".$list_form->id_list."'>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");
                                            $drop = $list_drop->result();
                                            $count = count($drop);
                                            
                                            if ($count == 1) {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            } elseif ($count > 1) 
                                            {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                        <option selected='selected'>Pilih</option>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            }
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->default == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl."");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                            <option selected='selected'>Pilih</option>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                        }
                                        elseif ($list_form->type == 'date') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <div class='input-group date'>
                                                        <div class='input-group-addon'>
                                                            <i class='fa fa-calendar'></i>
                                                        </div>
                                                        <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."'>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'textarea') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list.$req."</label>
                                                    <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."'></textarea>
                                                </div>
                                            ";
                                        }
                                    }
                                    ?>
                                    <div>
                                        <button style="margin-top: 40px" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        <hr>
                                    </div>
                                </div>
                                
                                <!-- Tab 2 Untuk Step 2 -->
                                <div class="row setup-content" id="step-2" style="margin-bottom: 20px">
                                    <?php
                                    foreach ($form2 as $list_form) {
                                        if ($list_form->type == 'text') {
                                            if ($list_form->required_flag == null) {
                                                    $req = '';
                                                } else {
                                                    $req = ' *';
                                                }
                                            echo 
                                            "
                                                <div style='padding:5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <input style='font-size:12px' type='text' class='form-control' id='".$list_form->id_list."'>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");
                                            $drop = $list_drop->result();
                                            $count = count($drop);
                                            
                                            if ($count == 1) {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            } elseif ($count > 1) 
                                            {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                        <option selected='selected'>Pilih</option>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            }
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->default == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl."");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                            <option selected='selected'>Pilih</option>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'date') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <div class='input-group date'>
                                                        <div class='input-group-addon'>
                                                            <i class='fa fa-calendar'></i>
                                                        </div>
                                                        <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."'>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'textarea') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list.$req."</label>
                                                    <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."'></textarea>
                                                </div>
                                            ";
                                        }
                                    }
                                    ?>
                                    <div>
                                        <button style="margin-top: 40px" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        <hr>
                                    </div>
                                </div>

                                <!-- Tab 3 Untuk Step 3 -->
                                <div class="row setup-content" id="step-3" style="margin-bottom: 20px">
                                    <?php
                                    foreach ($form3 as $list_form) {
                                        if ($list_form->type == 'text') {
                                            if ($list_form->required_flag == null) {
                                                    $req = '';
                                                } else {
                                                    $req = ' *';
                                                }
                                            echo 
                                            "
                                                <div style='padding:5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <input style='font-size:12px' type='text' class='form-control' id='".$list_form->id_list."'>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");
                                            $drop = $list_drop->result();
                                            $count = count($drop);
                                            
                                            if ($count == 1) {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            } elseif ($count > 1) 
                                            {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                        <option selected='selected'>Pilih</option>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            }
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->default == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl."");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                            <option selected='selected'>Pilih</option>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'date') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <div class='input-group date'>
                                                        <div class='input-group-addon'>
                                                            <i class='fa fa-calendar'></i>
                                                        </div>
                                                        <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."'>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'textarea') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list.$req."</label>
                                                    <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."'></textarea>
                                                </div>
                                            ";
                                        }
                                    }
                                    ?>
                                    <div>
                                        <button style="margin-top: 40px" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        <hr>
                                    </div>
                                </div>

                                <!-- Tab 4 Untuk Step 4 -->
                                <div class="row setup-content" id="step-4" style="margin-bottom: 20px">
                                    <?php
                                    foreach ($form4 as $list_form) {
                                        if ($list_form->type == 'text') {
                                            if ($list_form->required_flag == null) {
                                                    $req = '';
                                                } else {
                                                    $req = ' *';
                                                }
                                            echo 
                                            "
                                                <div style='padding:5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <input style='font-size:12px' type='text' class='form-control' id='".$list_form->id_list."'>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");
                                            $drop = $list_drop->result();
                                            $count = count($drop);
                                            
                                            if ($count == 1) {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            } elseif ($count > 1) 
                                            {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                        <option selected='selected'>Pilih</option>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            }
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->default == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl."");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                            <option selected='selected'>Pilih</option>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'date') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <div class='input-group date'>
                                                        <div class='input-group-addon'>
                                                            <i class='fa fa-calendar'></i>
                                                        </div>
                                                        <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."'>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'textarea') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list.$req."</label>
                                                    <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."'></textarea>
                                                </div>
                                            ";
                                        }
                                    }
                                    ?>
                                    <div>
                                        <button style="margin-top: 40px" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        <hr>
                                    </div>
                                </div>

                                <!-- Tab 5 Untuk Step 5 -->
                                <div class="row setup-content" id="step-5" style="margin-bottom: 20px">
                                    <?php
                                    foreach ($form6 as $list_form) {
                                        if ($list_form->type == 'text') {
                                            if ($list_form->required_flag == null) {
                                                    $req = '';
                                                } else {
                                                    $req = ' *';
                                                }
                                            echo 
                                            "
                                                <div style='padding:5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <input style='font-size:12px' type='text' class='form-control' id='".$list_form->id_list."'>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");
                                            $drop = $list_drop->result();
                                            $count = count($drop);
                                            
                                            if ($count == 1) {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            } elseif ($count > 1) 
                                            {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                        <option selected='selected'>Pilih</option>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            }
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->default == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl."");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                            <option selected='selected'>Pilih</option>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'date') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <div class='input-group date'>
                                                        <div class='input-group-addon'>
                                                            <i class='fa fa-calendar'></i>
                                                        </div>
                                                        <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."'>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'textarea') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list.$req."</label>
                                                    <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."'></textarea>
                                                </div>
                                            ";
                                        }
                                    }
                                    ?>
                                    <div>
                                        <button style="margin-top: 40px" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        <hr>
                                    </div>
                                </div>

                                <!-- Tab 6 Untuk Step 6 -->
                                <div class="row setup-content" id="step-6" style="margin-bottom: 20px">
                                    <?php
                                    foreach ($form7 as $list_form) {
                                        if ($list_form->type == 'text') {
                                            if ($list_form->required_flag == null) {
                                                    $req = '';
                                                } else {
                                                    $req = ' *';
                                                }
                                            echo 
                                            "
                                                <div style='padding:5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <input style='font-size:12px' type='text' class='form-control' id='".$list_form->id_list."'>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." WHERE id_segment like '%".$idx."%' ORDER BY sort ASC");
                                            $drop = $list_drop->result();
                                            $count = count($drop);
                                            
                                            if ($count == 1) {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            } elseif ($count > 1) 
                                            {
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                        <option selected='selected'>Pilih</option>
                                                ";
                                                        foreach ($drop as $drop) 
                                                        {
                                                            echo 
                                                            "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                            ";
                                                        }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            }
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->default == 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl." ORDER BY sort");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'select' && $list_form->chain_flag <> 'Y') {
                                            $list_drop = $this->db->query("SELECT * FROM ".$list_form->link_tbl."");
                                            $drop = $list_drop->result();
                                                echo 
                                                "
                                                    <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                        <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                        <select style='font-size:12px' class='form-control select2me' id='".$list_form->id_list."'>
                                                            <option selected='selected'>Pilih</option>
                                                ";
                                                
                                                foreach ($drop as $drop) {
                                                    echo 
                                                    "
                                                            <option value='".$drop->id_list."'>".$drop->list."</option>
                                                    ";
                                                }
                                                echo 
                                                "
                                                        </select>
                                                    </div>
                                                ";
                                            
                                        }
                                        elseif ($list_form->type == 'date') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list."<span class='required'>".$req."</span></label>
                                                    <div class='input-group date'>
                                                        <div class='input-group-addon'>
                                                            <i class='fa fa-calendar'></i>
                                                        </div>
                                                        <input style='font-size:12px' class='form-control form-control-inline input-medium date-picker' size='16' type='text' id='".$list_form->id_list."'>
                                                    </div>
                                                </div>
                                            ";
                                        }
                                        elseif ($list_form->type == 'textarea') {
                                            echo 
                                            "
                                                <div style='padding: 5px;' class='col-md-".$list_form->col_length."'>
                                                    <label style='font-size:12px'>".$list_form->list.$req."</label>
                                                    <textarea rows='2' style='resize: none; font-size:12px' class='form-control' id='".$list_form->id_list."'></textarea>
                                                </div>
                                            ";
                                        }
                                    }
                                    ?>
                                    <div>
                                        <button style="margin-top: 40px" class="btn btn-primary nextBtn btn-md pull-right" type="button" >Submit</button>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>