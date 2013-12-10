<!-- page: senarai pp popa, by seri, 18092013 -->



<!-- breadcrumb START -->
<div class="widget-body"> 
  <ul class="breadcrumb-beauty">
    <li>
      <a href="<?php echo site_url('main')?>">
        Fungsi
      </a> 
    </li>
    <li>
      <a href="#">
        Perancangan
      </a>  
    </li>
    <li>
      <a href="#">
        Pelan
      </a> 
    </li>
    <li>
      <a href="#">
        PSPA(O)
      </a>   
    </li>
    <li>
      <a href="#">
        POPA
      </a>   
    </li>
  </ul>
</div>

<br/>
<!-- breadcrumb END -->




<!-- div widget-body START -->
<div class="widget-body"> 
  <ul class="nav nav-tabs no-margin myTabBeauty"> 
    <li class=""> 
      <a data-toggle="tab" href="#profile" data-original-title=""> 
        PSPA(O)
      </a> 
    </li> 
    <li class=""> 
      <a data-toggle="tab" href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title=""> 
        PTRA 
      </a> 
    </li> 
    <li class="active"> 
      <a data-toggle="tab" href="" data-original-title=""> 
        POPA 
      </a> 
    </li>
    <li class=""> 
      <a data-toggle="tab" href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>" data-original-title=""> 
        PNPA 
      </a> 
    </li>
    <li class=""> 
      <a data-toggle="tab" href="<?php echo site_url('ppun/senarai_ptf_ppun')?>" data-original-title=""> 
        PPUN 
      </a> 
    </li> 
    <li class=""> 
      <a data-toggle="tab" href="<?php echo site_url('pla/senarai_ptf_pla')?>" data-original-title=""> 
        PLA 
      </a> 
    </li>   
  </ul> 
               
    
    
    
    
  <!-- div tab START -->
  <div class="tab-content" id="myTabContent"> 
    <div id="home" class="tab-pane fade active in">
      <p>  
                    
                    

      <?php 
        $attributes = array(
                            'class' => 'form-horizontal no-margin', 
                            'name'  => 'senarai_pp_popa',
                            'id'    => 'senarai_pp_popa',
                           );
                      echo form_open('popa/senarai_pp_popa',$attributes);
      ?>


    

      <!-- div panel senarai START -->
      <div class="row-fluid">
        <div class="span12">
          <div class="widget">
            <div class="widget-header">
              <div class="title">
                <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                </span> Senarai POPA
              </div> 
            </div> 
                
            
            <!-- table section START -->              
            <div class="widget-body">
              <div id="dt_example" class="example_alt_pagination">
                <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                  <thead>
                    <tr>
                      <th style="width:17%">
                        Bil
                      </th>
                      <th style="width:20%">
                        POPA ID
                      </th>
                      <th style="width:16%">
                        Tahun
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Kementerian 
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Jabatan/Agensi
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Premis
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        No DPA
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Status
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Tindakan
                      </th>
                    </tr>
                  </thead> 


                  <tbody>
                    <?php $i=1; if(!empty($senaraipopa)) : foreach ($senaraipopa as $rec) : ?>
                    <?php echo form_open('admin/update'); ?>
                        
                    <tr>
                      <td align="left">
                        <?php echo $i++; ?>
                      </td>
                      <td>
                        <?php echo 'POPA0000'. $rec->pspa_id; ?>
                      </td>
                      <td>
                        <?php echo $rec->tahun;?>
                      </td>
                      <td>
                        <?php if($getkementerian = $this->popa_model->get_kem_list($rec->idkem))
                        foreach ($getkementerian as $rr) 
                        echo $rr->namakem;?>
                      </td>
                      <td>
                        <?php if($getjabatan = $this->popa_model->get_jab_list($rec->idjab_agensi))
                        foreach ($getjabatan as $rr) 
                        echo $rr->nama_jab_agensi;?>
                      </td>
                      <td>
                        <?php if($getpremis = $this->popa_model->get_prem_list($rec->idpremis_kategori))
                        foreach ($getpremis as $rr) 
                        echo $rr->jenis_premis;?>
                      </td>
                      <td>
                        <?php echo $rec->nodpa;?>
                      </td>
                      <td>
                        <?php if($getstatus = $this->popa_model->get_stat_list($rec->pspa_id))
                        foreach ($getstatus as $rr) 
                        echo $rr->status_id ;?>
                      </td>
                      <td align="center">
                        <ul class="icomoon-icons-container">
                          <a href="<?php echo site_url('popa/summary_pp_popa_edit')?>">
                            <li class="rounded">
                              <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                              </span>
                            </li>
                          </a>
                        </ul>
                      </td>
                    </tr>
                  

                    <?php echo form_close(); ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>

                
                <div class="clearfix">
                </div>
                
              </div>
            </div> 
            <!-- table section END -->
    

          </div> 
        </div>
      </div>
      <!-- div panel senarai END -->



    </div>
  </div>
  <!-- div tab END -->



</div>
<!-- div widget-body END -->


