<!--  
====================================
Author  :   Bank Muamalat Indonesia
Date    :   28 Septemebr 2018
Page    :   'perorangan-form.php'
====================================
-->



<section>
<!-- Step Wizard Icon & Progress -->
<div id="exampleValidator" class="wizard">
    <ul class="wizard-steps" role="tablist">
        <?php 
            foreach ($step as $step) {
                echo 
                "
                <li class='".$step->active."' role='tab'>
                    <i class='".$step->icon."'></i>
                    <p>".$step->step_name."</p>
                </li>
                ";
            }
        ?>
    </ul>
<!-- /End Step Wizard Icon & Progress -->

    <form action="<?php echo base_url(). 'perorangan/simpanData_1'; ?>" method="post" id="validation" class="form-horizontal">
        <div>
            <div class="box">
                <div class="box-body">
                    <div class="wizard-pane active" role="tabpanel">
                        <div class="form-group">  
                            <div class="col-md-6" style="padding: 10px">
                                <span>Segmentasi*</span>
                                <select class="select2" id="frm_001" name="frm_001">
                                    <option selected="selected">Pilih</option>
                                    <?php foreach ($segment as $segment) {
                                    echo "
                                            <option value='".$segment->id_segment."'>".$segment->segment."</option> 
                                        ";
                                    } ?>                                
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Jenis Akad Pembiayaan*</span>
                                <select class="select2" id="frm_003" name="frm_003" xxx="xxx">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Perihal*</span>
                                <select class="form-control select2" id="frm_002" name="frm_002" xxx="xxx">
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Tujuan Penggunaan*</span>
                                <select class="form-control select2" id="frm_004" name="frm_004" xxx="xxx">
                                    <option selected="selected">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Produk Pembiayaan*</span>
                                <select class="form-control select2" id="frm_005" name="frm_005" xxx="xxx">
                                    <option selected="selected">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Kode Produk*</span>
                                <select class="form-control select2" id="frm_006" name="frm_006" xxx="xxx">
                                    <option selected="selected">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Komite Level*</span>
                                <select class="form-control select2" id="frm_007" name="frm_007" xxx="xxx">
                                    <option selected="selected">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Tanggal Pengajuan Pembiayaan*</span>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" class="form-control pull-right" id="frm_008" name="frm_008" xxx="xxx">
                                </div>
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>No. Akad*</span>
                                <input type="text" class="form-control" id="frm_009" name="frm_009" placeholder="Silahkan Isi" xxx="xxx">
                            </div>
                            <div class="col-md-6" style="padding: 10px">
                                <span>Tanggal Akad*</span>
                                <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" class="form-control pull-right" id="frm_010" name="frm_010" xxx="xxx">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-body">
                    <div class="wizard-pane" role="tabpanel">
                        <div class="form-group">
                        <?php
                            foreach ($list2 as $list) {
                                if ($list->type == 'input') 
                                {
                                    echo "
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."'>
                                    </div>";
                                }
                                elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                                {
                                    $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                                    echo "
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <select class='form-control' id='".$list->id_list."'>
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
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <select class='form-control' id='".$list->id_list."'>
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
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <div class='input-group date'>
                                          <div class='input-group-addon'>
                                            <i class='fa fa-calendar'></i>
                                          </div>
                                          <input type='text' class='form-control pull-right' id='".$list->id_list."'>
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

            <div class="box">
                <div class="box-body">
                    <div class="wizard-pane" role="tabpanel">
                        <div class="form-group">
                        <?php
                            foreach ($list3 as $list) {
                                if ($list->type == 'input') 
                                {
                                    echo "
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."'>
                                    </div>";
                                }
                                elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                                {
                                    $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                                    echo "
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <select class='form-control' id='".$list->id_list."'>
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
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <select class='form-control' id='".$list->id_list."'>
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
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <div class='input-group date'>
                                          <div class='input-group-addon'>
                                            <i class='fa fa-calendar'></i>
                                          </div>
                                          <input type='text' class='form-control pull-right' id='".$list->id_list."'>
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

            <div class="box">
                <div class="box-body">
                    <div class="wizard-pane" role="tabpanel">
                        <div class="form-group">
                        <?php
                            foreach ($list4 as $list) {
                                if ($list->type == 'input') 
                                {
                                    echo "
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <input type='text' class='form-control' id='".$list->id_list."' placeholder='".$list->placeholder."'>
                                    </div>";
                                }
                                elseif ($list->type == 'option' && $list->chain_flag != 'yes') 
                                {
                                    $drop_record = $this->db->query("SELECT * FROM tbl_dropdown_list WHERE kategori = '".$list->link_tbl."'");
                                    echo "
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <select class='form-control' id='".$list->id_list."'>
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
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <select class='form-control' id='".$list->id_list."'>
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
                                    <div class='col-md-6' style='padding: 10px'>
                                        <span>".$list->list."</span>
                                        <div class='input-group date'>
                                          <div class='input-group-addon'>
                                            <i class='fa fa-calendar'></i>
                                          </div>
                                          <input type='text' class='form-control pull-right' id='".$list->id_list."'>
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

        </div>
    </form>
</div>
</section>

<script type="text/javascript">
        (function() {
          $('#exampleValidator').wizard({
            onInit: function() {
              $('#validation').formValidation({
                framework: 'bootstrap',
                fields: {
                  username: {
                    validators: {
                      notEmpty: {
                        message: 'The username is required'
                      },
                      stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                      },
                      regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                      }
                    }
                  },
                  email: {
                    validators: {
                      notEmpty: {
                        message: 'The email address is required'
                      },
                      emailAddress: {
                        message: 'The input is not a valid email address'
                      }
                    }
                  },
                  password: {
                    validators: {
                      notEmpty: {
                        message: 'The password is required'
                      },
                      different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                      }
                    }
                  }
                }
              });
            },
            validator: function() {
              var fv = $('#validation').data('formValidation');
              var $this = $(this);
              // Validate the container
              fv.validateContainer($this);
              var isValidStep = fv.isValidContainer($this);
              if (isValidStep === false || isValidStep === null) {
                return false;
              }
              return true;
            },
            onFinish: function() {
              $('#validation').submit();
              alert('finish');
            }
          });
        })();
      </script>