<!-- page: model struktur popa, by seri idayu, 12092013 -->



<!-- breadcrumb START -->
<ul class="breadcrumb-beauty">
    <li>
        <a href="#">
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
<br>
<!-- breadcrumb END -->

  


<!-- div widget-body START -->
<div class="widget-body"> 
    <ul class="nav nav-tabs no-margin myTabBeauty"> 
        <li class=""> 
            <a href="#profile" data-original-title=""> 
                PSPA(O)
            </a> 
        </li> 
        <li class=""> 
            <a href="<?php echo site_url('ptra/model_struktur_ptra')?>">
                PTRA 
            </a> 
        </li> 
        <li class="active"> 
            <a href="#profile" data-original-title="">
                POPA 
            </a> 
        </li>
        <li class=""> 
            <a href="<?php echo site_url('pnpa/model_struktur_pnpa')?>">
                PNPA 
            </a> 
        </li>
        <li class=""> 
            <a href="<?php echo site_url('ppun/model_struktur_ppun')?>"> 
                PPUN 
            </a> 
        </li> 
        <li class=""> 
            <a href="<?php echo site_url('pla/model_struktur_pla')?>"> 
                PLA 
            </a> 
        </li>   
    </ul> 
                
          
   
    
    <!-- div tab START -->
    <div class="tab-content" id="myTabContent"> 
        <div id="home" class="tab-pane fade active in">
            <p>
                <form action='tambahkontraktor_fasiliti' method='post'> 



                    <div class="main-container"> 
         
          



                    <!-- panel utama START -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                                        </span> Model Struktur Operasi Dan Penyenggaraan Aset
                                    </div>
                                </div>
                        
                            
                
            

                                <!-- panel checkbox START -->
                                <div class="widget-body">
                                    <br>
                
                

                                    <!-- checkbox row 1 START -->
                                    <div class="row-fluid"> 
                
                    

                                        <!-- checkbox PTF START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> PTF 
                                                    </div> 
                                                </div> 
                
                                                <div class="widget-body">
                                                    <div class="control-group"> 
                                                        <?php if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                                                            <div class="control-group">
                                                                <label class="checkbox">
                                                                    <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="ptf[]" >
                                                                        <?php echo $rec->nama; ?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- checkbox PTF END -->
                 
                 
                 
                 
                                        <!-- checkbox PIF START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> PIF 
                                                    </div> 
                                                </div> 
                 
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_pif)) : foreach ($senarai_pif as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pif[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <!-- checkbox PIF END -->
                   
                
                                    </div>
                                    <!-- checkbox row 1 END -->
                    
                

                
                
                                    <!-- checkbox row 2 START -->
                                    <div class="row-fluid">
            
                    
                                        <!-- checkbox PDF START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> PDF 
                                                    </div> 
                                                </div> 
                
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_pdf)) : foreach ($senarai_pdf as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pdf[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <!-- checkbox PDF END -->
                 
                 
                 
                                        <!-- checkbox POF START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> POF 
                                                    </div> 
                                                </div> 
                 
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_pof)) : foreach ($senarai_pof as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pof[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div>
                                        <!-- checkbox POF END -->
                
                
                                    </div>
                                    <!-- checkbox row 2 END -->
                    
                    
                    
                    

                                    <!-- checkbox row 3 START -->
                                    <div class="row-fluid">
            
                    
                    
                                        <!-- checkbox pegawai pentadbiran START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> Pegawai Pentadbiran Dan Kewangan 
                                                    </div> 
                                                </div> 
                
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_pentadbiran)) : foreach ($senarai_pentadbiran as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pentadbir[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <!-- checkbox pegawai pentadbiran END -->
                 
                 
                 
                 
                                        <!-- checkbox pegawai sivil START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> Pegawai Penyelia Sivil Dan Struktur 
                                                    </div> 
                                                </div> 
                 
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_sivil)) : foreach ($senarai_sivil as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="sivil[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div>
                                        <!-- checkbox pegawai sivil END -->
                
                
                                    </div>
                                    <!-- checkbox row 3 END --> 
                    
                    
                    
                    
                                    <!-- checkbox row 4 START -->
                                    <div class="row-fluid">
                    
                    

                                        <!-- checkbox pegawai mekanikal START --> 
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> Pegawai Penyelia Mekanikal
                                                    </div> 
                                                </div> 
                
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_mekanikal)) : foreach ($senarai_mekanikal as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="mekanikal[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <!-- checkbox pegawai makmal END -->
                 
                 
                 
                 
                                        <!-- checkbox pegawai elektrik START -->
                                        <div class="span6"> 
                                            <div class="widget"> 
                                                <div class="widget-header"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> Pegawai Penyelia Elektrik
                                                    </div> 
                                                </div> 
                 
                                                <div class="widget-body"> 
                                                    <?php if(!empty($senarai_elektrik)) : foreach ($senarai_elektrik as $rec) : ?>
                                                        <div class="control-group">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="elektrik[]" >
                                                                    <?php echo $rec->nama; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div> 
                                            </div> 
                                        </div>
                                        <!-- checkbox pegawai elektrik END -->
                    
                
                
                                    </div>
                                    <!-- checkbox row 4 END -->


                                </div>
                                <!-- panel checkbox END -->



                            </div>
                        </div>
                    </div>
                    <!-- panel utama END -->







                    <!-- session START -->
                    <?php 
                        echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

                        if($this->session->flashdata('flashError'))
                        {
                            echo '<div class="mws-form-message error">';
                            echo '<i class="icol-ban"></i> ' .$this->session->flashdata('flashError');
                            echo '</div>';
                        }

                        if($this->session->flashdata('flashComfirm'))
                        {
                            echo '<div class="mws-form-message success">';
                            echo '<i class="icol-accept"></i> ' .$this->session->flashdata('flashComfirm');
                            echo '</div>';
                        }
                    ?>
                    <!-- session END -->

                
                   
                




                    <!-- panel kontraktor fasiliti START -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                                        </span> Kontraktor Fasiliti
                                    </div>
                                </div>
                
                            
                            
                                <!-- section tambah START -->            	
                                <div class="widget-body">
                                    


                                    <!-- table section START -->
                                    <div id="dt_example" class="example_alt_pagination">
                                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                                        
                                            <thead>
                                                <tr>
                                                    <th style="width:4%">
                                                        Bil
                                                    </th>
                                                    <th style="width:10%">
                                                        Kategori Id
                                                    </th>
                                                    <th style="width:20%">
                                                        Nama
                                                    </th>
                                                    <th style="width:20%" class="hidden-phone">
                                                        Nama Syarikat
                                                    </th>
                                                    <th style="width:8%" class="hidden-phone">
                                                        Tindakan
                                                    </th>
                                                </tr>
                                            </thead> 


                                            <tbody>
                                                <?php $i=1; if(!empty($kontraktor_fasiliti)) : foreach ($kontraktor_fasiliti as $rec) : ?>
                                                <?php //echo form_open('admin/update'); ?>
                        
                                                <tr>
                                                    <td align="left">
                                                        <?php echo $i++; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($getkatkontraktor = $this->popa_model->get_kont_list($rec->kontraktor_fasiliti_kategori_id))
                                                            foreach ($getkatkontraktor as $rr) 
                                                            echo $rr->kategori;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $rec->nama_kontraktor_fasiliti; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $rec->nama_syarikat; ?>
                                                    </td>
                                                    <td align="center">
                                                        <ul class="icomoon-icons-container">
                                                            <li class="rounded">
                                                                <span class="fs1">
                                                                    <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskini_kontraktor_fasiliti_edit_ppd/<?php echo $rec->popa_pata_f7_1a_kontraktor_fasiliti_id; ?>">
                                                                    </a>
                                                                </span>
                                                            </li>
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
                                    <!-- table section END-->

                                </div>
                                <!-- section tambah END --> 

                            </div>
                        </div>
                    </div>
                    <!-- panel kontraktor fasiliti END -->




                    </div>


                </form>
            </p>
        </div>
    </div>
    <!-- div tab END -->


               
                
                

    <!-- buttons START --> 
    <div class="widget-body" align="right">
        <a href="<?php echo site_url('popa/summary_ppd_popa_edit') ?>">
            <button class="btn btn-danger input-top-margin" type="button">
                Batal
            </button>
        </a>
    
        <a href="<?php echo site_url('popa/pelan_komunikasi_popa_edit_ppd')?>">
            <button class="btn btn-primary input-top-margin" type="button">
                Seterusnya
            </button>
        </a>
    </div> 
    <!-- buttons END -->   
                
                
              
</div>
<!-- div widget-body START -->
          

     
  