<!-- =================================== STEP 1 =================================== -->
<script>
  $(document).ready(function(){ 
      $("#provinsi_proyek").change(function(){ 
        $("#kab_kota_proyek").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKabupaten'); ?>", 
          data: {id_list : $("#provinsi_proyek").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kab_kota_proyek").html(response.list_kab).show();
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
      $("#kab_kota_proyek").change(function(){ 
        $("#kecamatan_proyek").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKecamatan'); ?>", 
          data: {id_list : $("#kab_kota_proyek").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kecamatan_proyek").html(response.list_kec).show();
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
      $("#kecamatan_proyek").change(function(){ 
        $("#kelurahan_proyek").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkelurahan'); ?>", 
          data: {id_list : $("#kecamatan_proyek").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kelurahan_proyek").html(response.list_kel).show();
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
      $("#kelurahan_proyek").change(function(){ 
        $("#kodepos_proyek").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKodepos'); ?>", 
          data: {id_list : $("#kelurahan_proyek").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kodepos_proyek").html(response.list_kodepos).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
      });
    });
  });
</script>
<!-- ================================================================================= -->
<!-- ==================================== STEP 2 ===================================== -->
<script>
  $(document).ready(function(){ 
      $("#provinsi").change(function(){ 
        $("#kota_kab").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKabupaten'); ?>", 
          data: {id_list : $("#provinsi").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kota_kab").html(response.list_kab).show();
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
      $("#kota_kab").change(function(){ 
        $("#kecamatan").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKecamatan'); ?>", 
          data: {id_list : $("#kota_kab").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kecamatan").html(response.list_kec).show();
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
      $("#kecamatan").change(function(){ 
        $("#kelurahan").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkelurahan'); ?>", 
          data: {id_list : $("#kecamatan").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kelurahan").html(response.list_kel).show();
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
      $("#kelurahan").change(function(){ 
        $("#kodepos").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkodepos'); ?>", 
          data: {id_list : $("#kelurahan").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kodepos").html(response.list_kodepos).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
      });
    });
  });
</script>
<!-- ================================================================================= -->
<!-- ==================================== STEP 3 ===================================== -->
<script>
  $(document).ready(function(){ 
      $("#provinsi_pengurus").change(function(){ 
        $("#kota_kab_pengurus").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKabupaten'); ?>", 
          data: {id_list : $("#provinsi_pengurus").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kota_kab_pengurus").html(response.list_kab).show();
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
      $("#kota_kab_pengurus").change(function(){ 
        $("#kecamatan_pengurus").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKecamatan'); ?>", 
          data: {id_list : $("#kota_kab_pengurus").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kecamatan_pengurus").html(response.list_kec).show();
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
      $("#kecamatan_pengurus").change(function(){ 
        $("#kelurahan_pengurus").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkelurahan'); ?>", 
          data: {id_list : $("#kecamatan_pengurus").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kelurahan_pengurus").html(response.list_kel).show();
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
      $("#kelurahan_pengurus").change(function(){ 
        $("#kodepos_pengurus").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkodepos'); ?>", 
          data: {id_list : $("#kelurahan_pengurus").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kodepos_pengurus").html(response.list_kodepos).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
      });
    });
  });
</script>
<!-- ================================================================================= -->
<!-- ==================================== STEP 6 ===================================== -->
<script>
  $(document).ready(function(){ 
      $("#provinsi_agunan").change(function(){ 
        $("#kota_agunan").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKabupaten'); ?>", 
          data: {id_list : $("#provinsi_agunan").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kota_agunan").html(response.list_kab).show();
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
      $("#kota_agunan").change(function(){ 
        $("#kec_agunan").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listKecamatan'); ?>", 
          data: {id_list : $("#kota_agunan").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kec_agunan").html(response.list_kec).show();
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
      $("#kec_agunan").change(function(){ 
        $("#kel_agunan").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkelurahan'); ?>", 
          data: {id_list : $("#kec_agunan").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kel_agunan").html(response.list_kel).show();
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
      $("#kel_agunan").change(function(){ 
        $("#kodepos_agunan").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/listkodepos'); ?>", 
          data: {id_list : $("#kel_agunan").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kodepos_agunan").html(response.list_kodepos).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
      });
    });
  });
</script>