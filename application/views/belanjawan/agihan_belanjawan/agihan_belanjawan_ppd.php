<!--main container-->
<div class="main-container">
    <?php
    $attributes = array(
        'class' => 'form-horizontal no-margin',
        'name' => 'agihan_belanjawan_pp_sah',
        'id' => 'agihan_belanjawan_pp_sah',
    );
    echo form_open('belanjawan/agihan_belanjawan/agihan_belanjawan_pp_sah', $attributes);
    ?>
    <!--start div panel PNPA -->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat PSPA(O)
                    </div>
                </div>
                <div class="widget-body">

                    <div class="control-group">
                        <label class="control-label" for="report_range1">
                            Tahun Mula
                        </label>
                        <div class="controls">
                            <label>
                                <input type="text" placeholder="2010" disabled/>
                                Hingga
                                <input type="text" placeholder="2011" disabled/>
                            </label>
                        </div>
                    </div>   

                    <div class="control-group">
                        <label class="control-label">Kementerian</label>
                        <div class="controls">
                            <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" disabled> </div>
                    </div>



                    <div class="control-group">
                        <label class="control-label">PSPA(O)</label>
                        <div class="controls">
                            <input class="input-large" type="text" placeholder="PSPA00001" disabled />                   
                        </div>
                    </div>


                    <!--end panel PNPA -->
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Agihan Belanjawan
                    </div>
                </div> 

                <div class="widget-body">
                    <div class="control-group">
                        <label class="control-label" for="kementerian">Tahun</label>
                        <div class="controls">
                            <input class="input-large" type="text" placeholder="2011" disabled />
                        </div>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="control-group">
                        <label class="control-label" for="kementerian">Mohon (RM)</label>
                        <div class="controls">
                            <input class="input-large" type="text" placeholder="<?php echo($jum_kos_mohon); ?>" readonly="readonly" value="<?php echo($jum_kos_mohon); ?>" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="kementerian">Terima (RM)</label>
                        <div class="controls">
                            <input class="input-large" type="text" placeholder="<?php echo($jum_kos_terima); ?>" value="85000.00<?php //echo($jum_kos_terima); ?>" readonly="readonly"  />
                        </div>
                    </div>
                </div>

                <!--end panel agihan -->
            </div>
        </div>
    </div>


    <!--START panel 2-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan
                    </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                        <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="<?php echo($jum_kos_terima); ?>" value="<?php echo($jum_kos_terima); ?>" readonly="readonly" id="amt_jum_kos_terima" />
                            <input class="input-small" type="hidden" value="<?php echo($jum_kos_terima); ?>" id="txt_base_amount" name="txt_base_amount"  />
                        </div>
                    </div>
                </div>
                <!--table-->
                <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left">    
                            <thead>
                                <tr>
                                    <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                                    <th width="15%" class="hidden-phone" style="width:30%">Kementerian </th>
                                    <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                                    <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>

                            </thead>
                            <tbody>
                                <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) :  ?>


                                <tr>
                                    <td align="left">1<?php //echo $i++;                   ?></td>
                                    <td>Kementerian Kerja Raya</td>
                                    <td><?php echo($jum_kos_terima); ?></td>
                                    <td>
                                        <input class="input-small" type="text" value="" id="txt_amt_allocation" name="txt_amt_allocation" onchange="calculate_amount(this.value, this.id)" onkeypress="return isNumber(event)"  />

                                    </td>
                                </tr>
                                <?php //echo form_close(); ?>
                                <?php //endforeach; ?>
                                <?php //endif;  ?>
                            </tbody>
                        </table>
                        <!--END table-->
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
                <!--/.END table section-->
            </div>
        </div>
    </div>
    <!--END panel 2-->

    <!--START panel 2-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan
                    </div>
                </div>
                <!--table-->
                <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                            <thead>
                                <tr>
                                    <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                                    <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi</th>
                                    <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                                    <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>

                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($agihan)) : foreach ($agihan as $rec) :
                                        ?>


                                        <tr>
                                            <td align="left"><?php echo $i++; ?></td>
                                            <td>
                                                <?php
                                                if ($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi))
                                                    foreach ($get_namajab_agensi as $rr)
                                                        echo $rr->nama_jab_agensi;
                                                ?>
                                            </td>
                                            <td><?php echo $rec->jum_kos_mohon; ?></td>
                                            <td><input class="input-small" type="text" name="data_amount[]" id="data_amount<?php echo($i); ?>" onchange="grand_total(this.value)" onkeypress="return isNumber(event)" /></td>
                                        </tr>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <!--END table-->
                        <div class="clearfix">
                        </div>

                    </div>
                </div>
            </div>
            <!--/.END table section-->
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<!--END panel 2-->


<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Catatan
                </div>
            </div>
            <div class="widget-body">

                <div class="">
                    <textarea class="input-block-level" placeholder="" style="height: 100px"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<!--buttons--> 
<div class="widget-body" align="right">
    <a class="btn btn-success input-top-margin" href="#" id="hantar">
        Hantar
    </a>
</div> 
<!--/.END buttons--> 

<?php //echo '<pre>'; print_r($this->session->all_userdata()); echo '</pre>';    ?>

</div>  
<!--/.END main-container--> 


<script type="text/javascript">
                                            //Alertify JS
                                            $ = function(id) {
                                                return document.getElementById(id);
                                            },
                                                    reset = function() {
                                                $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
                                                alertify.set({
                                                    labels: {
                                                        ok: "Ya",
                                                        cancel: "Tidak"
                                                    },
                                                    delay: 5000,
                                                    buttonReverse: false,
                                                    buttonFocus: "ok"
                                                });
                                            };


                                            $("hantar").onclick = function() {
                                                reset();
                                                alertify.confirm("Adakah anda pasti untuk hantar?", function(e) {
                                                    if (e) {

                                                        window.location = "<?php echo site_url('belanjawan/agihan_belanjawan') ?>";

                                                    } else {
                                                        alertify.error("");
                                                    }
                                                });
                                                return false;
                                            };

                                            $("pembetulan").onclick = function() {
                                                reset();
                                                alertify.confirm("Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi. ", function(e) {
                                                    if (e) {
                                                        alertify.success("Notofikasi Pembetulan telah dihantar");
                                                    }
                                                    else {
                                                        alertify.error("");
                                                    }
                                                });
                                                return false;
                                            };


                                            function calculate_amount(value, name) {

                                                init_amount = parseInt($("#amt_jum_kos_terima").val());
                                                init_min_amt = parseInt(value);
                                                init_base_amount = parseInt($("#txt_base_amount").val());

                                                if (init_min_amt > init_base_amount) {

                                                    //alert("Now allow to enter " + init_min_amt + " this amount");
                                                    $("#" + name).val("");
                                                    $("#amt_jum_kos_terima").val(init_base_amount.toFixed(2));

                                                } else {
                                                    retuen_calculate_amount(init_base_amount, init_min_amt);
                                                }

                                                dis_amt = distribute_amount();
                                                //alert(init_min_amt);
                                                if (dis_amt !== 0) {
                                                    //alert("aaaa" + init_min_amt);
                                                    if(isNaN(init_min_amt) == true){
                                                        //alert("nan num");
                                                        recalc_amt = dis_amt;
                                                    }else{
                                                        //alert("nan num val" + init_min_amt);
                                                        recalc_amt = init_min_amt + dis_amt;
                                                    }                                                    
                                                    //alert(init_min_amt + " : " + dis_amt + " : " + recalc_amt + init_base_amount);
                                                    final_base_amount = init_base_amount - recalc_amt;
                                                    //alert(final_base_amount);
                                                    $("#amt_jum_kos_terima").val(final_base_amount.toFixed(2));
                                                }
                                            }


                                            function retuen_calculate_amount(init_base_amount, init_min_amt) {

                                                //alert("Base : " + init_base_amount + " : Ini amt " + init_min_amt);
                                                //exit;                                      

                                                if (init_min_amt !== 'NaN' && init_base_amount !== 'NaN') {
                                                    final_min_val = init_base_amount - init_min_amt;
                                                    $("#amt_jum_kos_terima").val(final_min_val.toFixed(2));
                                                } else {
                                                    alert("bbbbb");
                                                    $("#amt_jum_kos_terima").val(init_base_amount.toFixed(2));
                                                }

                                            }


                                            function isNumber(evt) {
                                                evt = (evt) ? evt : window.event;
                                                var charCode = (evt.which) ? evt.which : evt.keyCode;
                                                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                                    return false;
                                                }
                                                return true;
                                            }

                                            function grand_total() {

                                                var sum = 0;
                                                var cost = document.getElementsByName('data_amount[]');

                                                for (var i = 0; i < cost.length; i++)
                                                {
                                                    if (cost[i].value !== '') {

                                                        //alert(typeof parseFloat(cost[i].value));
                                                        data_val = parseFloat(cost[i].value);
                                                        sum = sum + data_val;
                                                    }
                                                }

                                                init_min_amt = parseInt($("#txt_amt_allocation").val());
                                                if(isNaN(init_min_amt) == true){
                                                    sub_total_distributed = sum;
                                                }else{
                                                    sub_total_distributed = init_min_amt + sum;
                                                }
                                                
                                                init_base_amount = parseInt($("#txt_base_amount").val());

                                                final_min_val = init_base_amount - sub_total_distributed;

                                                $("#amt_jum_kos_terima").val(final_min_val.toFixed(2));

                                            }


                                            function distribute_amount() {

                                                var sum = 0;
                                                var cost = document.getElementsByName('data_amount[]');

                                                for (var i = 0; i < cost.length; i++)
                                                {
                                                    if (cost[i].value !== '') {

                                                        //alert(typeof parseFloat(cost[i].value));
                                                        data_val = parseFloat(cost[i].value);
                                                        sum = sum + data_val;
                                                    }
                                                }

                                                return sum;

                                            }




</script>