<!-- list Step 1 -->
<script>
    $(document).ready(function(){ 
    var base_url = "<?php echo base_url(); ?>";
    var id = $('#id').val();
    var isNull = $('#isNull').val();
    var x = $('#frm_001 :selected').text();
    if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_002").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: base_url + 'mds/listPerihalEdit/' + id + '/' + isNull,
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
    }
  });
  </script>

<script>
    $(document).ready(function(){ 
    var base_url = "<?php echo base_url(); ?>";
    var id = $('#id').val();
    var isNull = $('#isNull').val();
    var x = $('#frm_001 :selected').text();
    if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_003").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: base_url + 'mds/listAkadEdit/' + id + '/' + isNull,
        data: {id_segment : $("#frm_001").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil

          // lalu munculkan kembali combobox masing-masing yang terkait dengan segmentasi
          $("#frm_003").html(response.list_akad).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    }
  });
  </script>

<script>
    $(document).ready(function(){ 
    var base_url = "<?php echo base_url(); ?>";
    var id = $('#id').val();
    var isNull = $('#isNull').val();
    var x = $('#frm_001 :selected').text();
    if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_004").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: base_url + 'mds/listTujuanPenggunaanEdit/' + id + '/' + isNull,
        data: {id_segment : $("#frm_001").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil

          // lalu munculkan kembali combobox masing-masing yang terkait dengan segmentasi
          $("#frm_004").html(response.list_tujuanpenggunaan).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    }
  });
  </script>

<script>
    $(document).ready(function(){ 
    var base_url = "<?php echo base_url(); ?>";
    var id = $('#id').val();
    var isNull = $('#isNull').val();
    var x = $('#frm_001 :selected').text();
    if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_005").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: base_url + 'mds/listProdukEdit/' + id + '/' + isNull,
        data: {id_segment : $("#frm_001").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil

          // lalu munculkan kembali combobox masing-masing yang terkait dengan segmentasi
          $("#frm_005").html(response.list_produk).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    }
  });
  </script>

<script>
    $(document).ready(function(){ 
    var base_url = "<?php echo base_url(); ?>";
    var id = $('#id').val();
    var isNull = $('#isNull').val();
    var x = $('#frm_001 :selected').text();
    if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_006").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: base_url + 'mds/listKodeProdukEdit/' + id + '/' + isNull,
        data: {id_segment : $("#frm_001").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil

          // lalu munculkan kembali combobox masing-masing yang terkait dengan segmentasi
          $("#frm_006").html(response.list_kodeproduk).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    }
  });
  </script>

<script>
    $(document).ready(function(){ 
    var base_url = "<?php echo base_url(); ?>";
    var id = $('#id').val();
    var isNull = $('#isNull').val();
    var x = $('#frm_001 :selected').text();
    if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_007").hide(); // Sembunyikan dulu combobox masing-masing yang terkait dengan segmentasi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: base_url + 'mds/listKomiteEdit/' + id + '/' + isNull,
        data: {id_segment : $("#frm_001").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil

          // lalu munculkan kembali combobox masing-masing yang terkait dengan segmentasi
          $("#frm_007").html(response.list_komite).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    }
  });
  </script>
<!-- End list Step 1 -->

  <!-- List Kabupaten -->
    <script>
    $(document).ready(function(){ 
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val();
      var isNull = $('#isNull').val();
      var x = $('#frm_028 :selected').text();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_029").hide(); 
      
        $.ajax({
          type: "POST", 
          url: base_url + 'mds/listKabupatenEdit/' + id + '/' + isNull,
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
      };
    });
    </script>
    <script>
      $(document).ready(function(){ 
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val();
      var isNull = $('#isNull').val();
      var x = $('#frm_028 :selected').text();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_080").hide();
      
        $.ajax({
          type: "POST", 
          url: base_url + 'mds/listProyekEdit/' + id + '/' + isNull,
          data: {provinsi_id : $("#frm_028").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 

            $("#frm_080").html(response.list_proyek).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
        });
      };
    });
    </script>
    <script>
      $(document).ready(function(){
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val(); 
      var isNull = $('#isNull').val();
      var x = $('#frm_028 :selected').text();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_102").hide();
      
        $.ajax({
          type: "POST", 
          url: base_url + 'mds/listLokasiAgunanEdit/' + id + '/' + isNull,
          data: {provinsi_id : $("#frm_028").val()}, 
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ 

            $("#frm_102").html(response.list_lokasi_agunan).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { 
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
          }
        });
      };
    });
    </script>

    <!-- List Kecamatan -->
    <script>
      $(document).ready(function(){ 
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val();
      var isNull = $('#isNull').val();
      var x = $('#kabupaten').val();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_030").hide();
      
        $.ajax({
          type: "POST", 
          url: base_url + 'mds/listKecamatanEdit/' + id + '/' + isNull,
          data: {kabupaten_id : $('#kabupaten').val()}, 
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
      };
    });
    </script>

    <!-- List Kelurahan -->
    <script>
      $(document).ready(function(){ 
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val();
      var isNull = $('#isNull').val();
      var x = $('#kecamatan').val();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_031").hide();
      
        $.ajax({
          type: "POST", 
          url: base_url + 'mds/listKelurahanEdit/' + id + '/' + isNull,
          data: {kecamatan_id : $("#kecamatan").val()}, 
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
      };
    });
    </script>

    <!-- List Kodepos -->
    <script>
      $(document).ready(function(){ 
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val();
      var isNull = $('#isNull').val();
      var x = $('#kelurahan').val();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_032").hide();
      
        $.ajax({
          type: "POST", 
          url: base_url + 'mds/listKodeposEdit/' + id + '/' + isNull,
          data: {kelurahan_id : $("#kelurahan").val()}, 
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
      };
    });
    </script>

    <!-- List Jenis Agunan based on Segmentasi -->
    <script>
    $(document).ready(function(){ 
      var base_url = "<?php echo base_url(); ?>";
      var id = $('#id').val();
      var isNull = $('#isNull').val();
      var x = $('#frm_001 :selected').text();
      if (x != ""){ // Ketika user mengganti atau memilih data segmentasi
      $("#frm_094").hide();
    
      $.ajax({
        type: "POST", 
        url: base_url + 'mds/listAgunanEdit/' + id + '/' + isNull,
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
    };
  });
  </script>