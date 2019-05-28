<!-- submit step 1 -->
<script type="text/javascript">
    function submitdata()
    {
        var cif = $('#cif').val();
        var no_rek = $('#no_rek').val();
        var nama_perusahaan = $('#nama_perusahaan').val();
        var segment = $('#segment').val();
        var perihal = $('#perihal').val();
        var komite = $('#komite').val();
        var sek_eko = $('#sek_eko').val();
        var sub_sek_eko = $('#sub_sek_eko').val();
        var kode_sek_eko = $('#kode_sek_eko').val();
        var nilai_proyek = $('#nilai_proyek').val();
        
        $.ajax({
            type: 'post',
            url: '<?php echo base_url();?>form/simpanStep1',
            data: {
                cif: cif,
				no_rek: no_rek,
				nama_perusahaan: nama_perusahaan,
				segment: segment,
				perihal: perihal,
				komite: komite,
				sek_eko: sek_eko,
				sub_sek_eko: sub_sek_eko,
				kode_sek_eko: kode_sek_eko,
				nilai_proyek: nilai_proyek
            },
            success: function (response) {
                $('#success_para').html("You data will be saved");
            }
        });

        return false;
    }
</script>