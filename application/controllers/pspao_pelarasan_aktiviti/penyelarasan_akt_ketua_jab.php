<!-- page: penyelarasan aktiviti ketua jabatan, by seri idayu, 19092013 -->



<?php 
  $attributes = array(
                      'class' => 'form-horizontal no-margin', 
                      'name'  => 'penyelarasan_akt_pp',
                      'id'    => 'penyelarasan_akt_pp',
                     );
                echo form_open('penyelarasan_akt/penyelarasan_akt_pp',$attributes);
?>



<!-- div panel penyelarasan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Maklumat PSPA(O)
        </div>
      </div>
       

      <form class="form-horizontal no-margin">                
      <div class="widget-body">
                      
      

      <!-- row tahun mula, hingga START -->
      <div class="control-group">
        <label class="control-label">
          Tempoh Mula
        </label>
        <div class="controls">
          <label>
            <div class="input-append">
              <input type="text"placeholder="22/12/12" disabled/>
            </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
              
          Hingga&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
          <div class="input-append">
            <input type="text"  placeholder="21/12/13" disabled/>
          </div>
          </label>
        </div>
      </div>
      <!-- row tahun mula, hingga END -->   



      <!-- row kementerian, jabatan/agensi START -->
      <div class="control-group">
        <label class="control-label">
          Kementerian
        </label>
        <div class="controls">
          <label>
            <div class="input-append">
              <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" disabled >
            </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
        
          Jabatan/Agensi&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="input-append">
            <input class="input-large" type="text" placeholder="Jabatan Kerja Raya" disabled> 
          </div>
          </label>                 
        </div>
      </div>
      <!-- row kementerian, jabatan/agensi END -->



      <!-- row negeri, daerah START -->
      <div class="control-group">
        <label class="control-label">
          Negeri
        </label>
        <div class="controls">
          <label>
            <div class="input-append">
              <input class="input-large" type="text" placeholder="Selangor" disabled>
            </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;                   
                          
          Daerah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
          <div class="input-append">
            <input class="input-large" type="text" placeholder="Shah Alam" disabled> 
          </div>
          </label>             
        </div>
      </div>
      <!-- row negeri, daerah END -->


      
      <!-- row premis START -->                    
      <div class="control-group">
        <label class="control-label">
          Premis
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Sekolah" disabled>                   
        </div>
      </div>
      <!-- row premis END -->     
                          
                      
      </div>
    </div>
  </div>
</div>
<!-- div panel penyelarasan END -->
                 


<!-- agihan peruntukan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Agihan Peruntukan
        </div>
      </div> 
                      
      <div class="widget-body">
                          
      <div class="control-group">
        <label class="control-label control-label_2" for="kementerian">
          Mohon (RM)
        </label>
        <div class="controls controls_2">
          <input class="input-large" type="text" placeholder="900000000.00" disabled>
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label control-label_2" for="kementerian">
          Terima (RM)
        </label>
        <div class="controls controls_2">
          <input class="input-large" type="text" placeholder="890000000.00" disabled>
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label control-label_2" for="kementerian">
          Peruntukan Yang Belum Diagihkan (RM)]
        </label>
        <div class="controls controls_2">
          <input class="input-large" type="text" placeholder="890000000.00" disabled>
        </div>
      </div> 

      </div>

    </div>
  </div>
</div>
<!-- agihan peruntukan END -->



<!-- maklumat agihan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Sila Kemaskini Maklumat Berikut
        </div>
      </div> 
           
      <div class="widget-body">


        <!-- tab pelan START -->  
        <ul class="nav nav-tabs no-margin myTabBeauty">
          <li class="active">
            <a data-toggle="tab" href="#profile" data-original-title="">
              PTRA
            </a>
          </li>
          <li class="">
            <a data-toggle="tab" href="#profile" data-original-title="">
              POPA
            </a>
          </li>
          <li class="">
            <a data-toggle="tab" href="#profile" data-original-title="">
              PNPA
            </a>
          </li>
          <li class="">
            <a data-toggle="tab" href="#profile" data-original-title="">
              PPUN
            </a>
          </li>
          <li class="">
            <a data-toggle="tab" href="#profile" data-original-title="">
              PLA
            </a>
          </li>
        </ul>
        <!-- tab pelan END --> 



         
        <!-- table skop START -->
        <div class="tab-content" id="myTabContent">
          <div id="home" class="tab-pane fade active in">
            <table class="table table-condensed table-striped table-bordered table-hover no-margin">
              

              <thead>
                <tr>
                  <th width="13%" rowspan="2" class="hidden-phone" style="width:13%">
                    Skop
                  </th>
                  <th width="15%" rowspan="2" class="hidden-phone" style="width:15%">
                    Aktiviti
                  </th>
                  <th width="15%" rowspan="2" class="hidden-phone" style="width:15%">
                    Butiran Aktiviti
                  </th>
                  <th width="10%" rowspan="2" class="hidden-phone" style="width:10%">
                    Objek Sebagai / Kepala Peruntukan
                  </th>
                  <th colspan="3" class="hidden-phone" style="width:10%">
                    Jumlah Kos (RM)
                  </th>
                </tr>
                
                <tr>
                  <th width="10%" class="hidden-phone" style="width:10%">
                    Mohon
                  </th>
                  <th width="10%" class="hidden-phone" style="width:10%">
                    Terima
                  </th>
                  <th width="10%" class="hidden-phone" style="width:10%">% 
                    Yang Diterima
                  </th>
                </tr>
              </thead>

              
              <tbody>
                <tr>
                  <td rowspan="2" class="hidden-phone">
                    Kerja Tanah
                  </td>
                  <td rowspan="2" class="hidden-phone">
                    Aktiviti 1
                  </td>
                  <td class="hidden-phone">
                    Butiran Aktiviti 1
                  </td>
                  <td class="hidden-phone">
                    14000
                  </td>
                  <td class="hidden-phone">
                    100,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text"  name="" id="" value="4000900.00" disabled>
                  </td>
                  <td class="hidden-phone">
                    90
                  </td>
                </tr>

                <tr>
                  <td class="hidden-phone">
                    Butiran Aktiviti  2
                  </td>
                  <td class="hidden-phone">
                    22000
                  </td>
                  <td class="hidden-phone">
                    300,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="1200900.00" name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    86
                  </td>
                </tr>

                <tr>
                  <td rowspan="5" class="hidden-phone">
                    Struktur
                  </td>
                  <td rowspan="3" class="hidden-phone">
                    Aktiviti 1
                  </td>
                  <td class="hidden-phone">
                    Butiran Aktiviti  3
                  </td>
                  <td class="hidden-phone">
                    23000
                  </td>
                  <td class="hidden-phone">
                    620,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="3005900.00" name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    97
                  </td>
                </tr>

                <tr>
                  <td class="hidden-phone">
                    Butiran Aktiviti  4
                  </td>
                  <td class="hidden-phone">
                    27000
                  </td>
                  <td class="hidden-phone">
                    392,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="3452220.00" name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    79
                  </td>
                </tr>
                      
                <tr>
                  <td class="hidden-phone">
                    Butiran Aktiviti  5
                  </td>
                  <td class="hidden-phone">
                    32000
                  </td>
                  <td class="hidden-phone">
                    220,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="564000.00"  name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    88
                  </td>
                </tr>
                      
                <tr>
                  <td rowspan="2" class="hidden-phone">
                    Aktiviti 2
                  </td>
                  <td class="hidden-phone">
                    Butiran Aktiviti 6
                  </td>
                  <td class="hidden-phone">
                    28000
                  </td>
                  <td class="hidden-phone">
                    19,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="5490900.00"  name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                      90
                  </td>
                </tr>
                      
                <tr>
                  <td class="hidden-phone">
                    Butiran Aktiviti 7
                  </td>
                  <td class="hidden-phone">
                    51000
                  </td>
                  <td class="hidden-phone">
                    34,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="4000900.00" name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    92
                  </td>
                </tr>
                      
                <tr>
                  <td rowspan="2" class="hidden-phone">
                    Kerja Luar Bandar
                  </td>
                  <td rowspan="2" class="hidden-phone">
                    Aktiviti 1
                  </td>
                  <td class="hidden-phone">
                    Butiran Aktiviti 8
                  </td>
                  <td class="hidden-phone">
                    32000
                  </td>
                  <td class="hidden-phone">
                    100,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text" value="10000900.00" name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    80
                  </td>
                </tr>
                      
                <tr>
                  <td class="hidden-phone">
                    Butiran Aktiviti 9
                  </td>
                  <td class="hidden-phone">
                    26000
                  </td>
                  <td class="hidden-phone">
                    23,000.00
                  </td>
                  <td class="hidden-phone">
                    <input class="input-small" type="text"value="4000900.00"  name="" id="" disabled/>
                  </td>
                  <td class="hidden-phone">
                    70
                  </td>
                </tr>

                <tr bgcolor="#FFCC00">
                  <td colspan="4" class="hidden-phone">
                    <strong>
                      Jumlah Keseluruhan
                    </strong>
                  </td>
                  <td class="hidden-phone">
                    <strong>
                      900000000.00
                    </strong>
                  </td>
                  <td class="hidden-phone">
                    <strong>
                      <input class="input-small" type="text"  name="" id="" value="890000000.00" disabled/>
                    </strong>
                  </td>
                  <td class="hidden-phone">
                    <strong>
                      100
                    </strong>
                  </td>
                </tr>
              </tbody>

            </table>
          </div>
        </div>  
                       
      </div>
    </div>
  </div>
</div>
<!-- maklumat agihan END -->






<!-- panel catatan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Catatan
        </div>
      </div> 
                      
      <div class="widget-body">
        <div class="">
          <textarea class="input-block-level" placeholder="Catatan ..." style="height: 100px">
          </textarea>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- panel catatan END -->





<!-- panel ulasan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Ulasan
        </div>
      </div> 
                      
      <div class="widget-body">
        <div class="">
          <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px">
          </textarea>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- panel ulasan END -->

                 


<!-- button START -->
<div class="next-prev-btn-container ">
  <div class="widget-body" align="right">
    <a class="btn btn-success input-top-margin" href="#" id="hantar">
      Lulus
    </a>
  </div>
</div>
<!-- button END -->
                 

<?php  echo form_close();?>





<!-- ALERT script START -->
<script type="text/javascript">
  //Alertify JS
  
  $ = function (id) 
  {
    return document.getElementById(id);
  },
   

  reset = function ()
  {
    $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
    
    alertify.set(
    {
      labels: 
      {
        ok: "OK",
        cancel: "Tidak"
      },
      delay: 5000,
      buttonReverse: false,
      buttonFocus: "ok"
    });
  };
      
     
  $("hantar").onclick = function () 
  {
    reset();
        
    alertify.confirm("Adakah ingin menghantar Pelan Penyelarasan Aktiviti ini?", function (e) 
    {
      if (e) 
      {
        window.location ="<?php echo site_url('penyelarasan_akt/senarai_penyelarasan_akt') ?>";
      } 
      else 
      {
        //alertify.error("");
      }
    });
    
    return false;
  };
      
      
  $("simpan").onclick = function () 
  {
    reset();
      
    alertify.confirm("Adakah ingin menyimpan Pelan Pemulihan / Ubah Suai / Naik Taraf Aset ini?", function (e)
    {
      if (e) 
      {
        document.forms["summary_ppun"].submit();
        
        alertify.success("Anda klik ya");
      } 
      else 
      {
        alertify.error("Anda klik tidak");
      }
    });
    
    return false;
  };
    

</script>
<!-- ALERT script END -->











     