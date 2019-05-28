<script>
  $(document).ready(function(){ 
      $("#sek_eko").change(function(){ 
        $("#sub_sek_eko").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/list_subsektor'); ?>", 
          data: {id_list : $("#sek_eko").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#sub_sek_eko").html(response.list_sub_sek).show();
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
      $("#sub_sek_eko").change(function(){ 
        $("#kode_sek_eko").hide();
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('form/list_kodesubsektor'); ?>", 
          data: {id_list : $("#sub_sek_eko").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 
            $("#kode_sek_eko").html(response.list_kode_sub_sek).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
      });
    });
  });
</script>