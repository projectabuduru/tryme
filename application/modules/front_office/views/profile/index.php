<?php echo $this->load->view('profile/header');?>
                        <div class="col-md-12 col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane active" id="dashboard">
                                    <h3>Dashboard </h3>
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                </div>
                            </div>
                        </div>
<?php echo $this->load->view('profile/footer');?>
<!-- main-content-wrap end -->

<script>
    $("#kota").hide();
    $(function(){
       $('.province').select2({
           minimumInputLength: 3,
           allowClear: true,
           placeholder: 'masukkan nama propinsi',
           ajax: {
              dataType: 'json',
              url: '<?php echo base_url('profile/province');?>',
              delay: 800,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      }).on('select2:select', function (evt) {
         var data = $(".province option:selected").text();
         var province_id = $(this).val();
         var urllnya = '<?php echo base_url('profile/city/');?>'+province_id;
         console.log(urllnya);
         $.ajax({
             type: "GET",
             url: urllnya,
             dataType: "json",
             success: function (response) {
                //  console.log(response);
                // var json = JSON.parse(response);
                // console.log(response);
                var html = '';
                $.each(response, function (key, value) { 
                     html += '<option value="'+value.id+'">'+value.text+'<option>';
                });
                $("#kota").show();
                $(".kota").html(html);
             }
         });
      });

      //data alamat
    //   global.init_table('.data-alamat-user','<?php echo base_url('front_office/Profile/get_data_alamat');?>');

        var urll_add_alamat = '<?php echo base_url('profile/add/alamat');?>';
        var cls_add_alamat = '.frm-add-alamat';
        var buton_add_alamat = '.buton-add-alamat';
        global.init_form_add(cls_add_alamat, buton_add_alamat, urll_add_alamat);

        

 });

    // var table;
    // $(document).ready(function() {
 
    //     //datatables
    //     table = $('#data-alamat-user').DataTable({ 
 
    //         "processing": true, 
    //         "serverSide": true, 
    //         "order": [], 
             
    //         "ajax": {
    //             "url": "<?php echo base_url('front_office/profile/get_data_alamat')?>",
    //             "type": "POST"
    //         },
 
             
    //         "columnDefs": [
    //         { 
    //             "targets": [ 0 ], 
    //             "orderable": false, 
    //         },
    //         ],
 
    //     });
 
    // });
</script>