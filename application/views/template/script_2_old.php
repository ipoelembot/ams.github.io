<script>
    $(document).ready(function(){ 
    $('.select2').select2({
      dropdownAutoWidth : true,
      
      width: 'auto'
    })
    $("#frm_001").change(function(){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_002").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url('perorangan/listPerihal'); ?>", // Isi dengan url/path file php yang dituju
        data: {id_segment : $("#frm_001").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil

          // lalu munculkan kembali combobox masing-masing yang terkait dengan segmentasi
          $("#frm_002").html(response.list_perihal).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
  <script>
    $(document).ready(function(){ 
    $("#frm_001").change(function(){ 
      $("#frm_004").hide(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('step1_con/listTujuanPenggunaan'); ?>", 
        data: {id_segment : $("#frm_001").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 

          $("#frm_004").html(response.list_tujuanpenggunaan).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>
  <script>
    $(document).ready(function(){ 
    $("#frm_001").change(function(){ 
      $("#frm_003").hide(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('step1_con/listAkad'); ?>", 
        data: {id_segment : $("#frm_001").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 

          $("#frm_003").html(response.list_akad).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>
  <script>
    $(document).ready(function(){ 
    $("#frm_001").change(function(){ 
      $("#frm_005").hide(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('step1_con/listProduk'); ?>", 
        data: {id_segment : $("#frm_001").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 

          $("#frm_005").html(response.list_produk).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>
  <script>
    $(document).ready(function(){ 
    $("#frm_001").change(function(){ 
      $("#frm_006").hide(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('step1_con/listKodeProduk'); ?>", 
        data: {id_segment : $("#frm_001").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 

          $("#frm_006").html(response.list_kodeproduk).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>
  <script>
    $(document).ready(function(){ 
    $("#frm_001").change(function(){ 
      $("#frm_007").hide(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('step1_con/listKomite'); ?>", 
        data: {id_segment : $("#frm_001").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 

          $("#frm_007").html(response.list_komite).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>


  <script>
    $(function () {
      $('#report_tables').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })

  </script>
  <script>
    $('#frm_008').datepicker({
      autoclose: true
    })
    $('#frm_010').datepicker({
      autoclose: true
    })
  </script>
  <script>
    <?php
      foreach ($list as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
  </script>
  <script>
    <?php
      foreach ($list2 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list3 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list4 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list5 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list6 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list7 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <!-- List Kabupaten -->
    <script>
      $(document).ready(function(){ 
      $("#frm_028").change(function(){ 
        $("#frm_029").hide(); 
      
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('perorangan/listKabupaten'); ?>", 
          data: {provinsi_id : $("#frm_028").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 

            $("#frm_029").html(response.list_kabupaten).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
        });
      });
    });
    </script>

    <!-- List Kecamatan -->
    <script>
      $(document).ready(function(){ 
      $("#frm_029").change(function(){ 
        $("#frm_030").hide(); 
      
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('perorangan/listKecamatan'); ?>", 
          data: {kabupaten_id : $("#frm_029").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 

            $("#frm_030").html(response.list_kecamatan).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
        });
      });
    });
    </script>

    <!-- List Kelurahan -->
    <script>
      $(document).ready(function(){ 
      $("#frm_030").change(function(){ 
        $("#frm_031").hide(); 
      
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('perorangan/listKelurahan'); ?>", 
          data: {kecamatan_id : $("#frm_030").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 

            $("#frm_031").html(response.list_kelurahan).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
        });
      });
    });
    </script>

    <!-- List Kodepos -->
    <script>
      $(document).ready(function(){ 
      $("#frm_031").change(function(){ 
        $("#frm_032").hide(); 
      
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('perorangan/listKodepos'); ?>", 
          data: {kelurahan_id : $("#frm_031").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 

            $("#frm_032").html(response.list_kodepos).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
        });
      });
    });
    </script>

    <!-- List Jenis Agunan based on Segmentasi -->
    <script>
    $(document).ready(function(){ 
    $("#frm_001").change(function(){ 
      $("#frm_094").hide(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('step1_con/listAgunan'); ?>", 
        data: {id_segment : $("#frm_001").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 

          $("#frm_094").html(response.list_agunan).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>
