<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
		AUTHOR : MOHD KHAIRUL RAMLI
		LAST UPDATE : 07-2013
		FILE NAME : sidebar.php
		ACTUAL LOCATION : application/view/template/sidebar.php
*/

?>
		<ul style="display: block;">
          <!-- Edit By Khairul 11-07-2013 -Start- -->
          <li class="active">
            <a href="<?php echo site_url('main') ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe000;"></span>
              </div>
              Menu Utama
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('main/dashboard') ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></span>
              </div>
              Dashboard
            </a>
          </li>
          
          
          <!-- Edit by Khairul -End- -->       
          
          
          
<?php /*
          <!-- edited by anuar 10/07/2013 -->
          <li class="submenu">
            <a href="<?php echo  base_url() . "index.php/black/forms"; ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></span>
              </div>
              PSPA(O)
            </a>
               <ul>
              <li>
                <a href="<?php echo site_url('main/arahan_sedia_pspao') ?>">Arahan Sedia</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_notifikasi_pspao') ?>">Senarai Notifikasi</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/pspao_baru') ?>">PSPA(O) Baru</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/ulasan_pp_lulus_pspao') ?>">Ulasan PP Lulus</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/ulasan_pp_sah_pspao') ?>">Ulasan PP Sah</a>
              </li>
              
              <li>
                <a href="<?php echo site_url('main/senarai_pp_pspao') ?>">Senarai PSPA(O) PP</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_pspao') ?>">Senarai PSPA(O) PTF</a>
              </li>
            </ul>
          </li>



<!-- PSPAO Akhir by Khairul -Start- -->  
          <li class="submenu">
            <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></span>
              </div>
              PSPA(O) Akhir
            </a>
              
            <ul>
            
              <li>
                <a href="<?php echo site_url('main/pspao_akhir') ?>">Senarai PSPA(O) Akhir</a>
              </li>              <li>
                <a href="<?php echo site_url('main/arahan_sedia_pspao_akhir') ?>">Arahan Sedia</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_notifikasi_pspao_akhir') ?>">Senarai Notifikasi</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/pspao_akhir_baru') ?>">PSPA(O) Akhir (Baru)</a>
              </li>


            </ul>
          </li>

<!-- PSPAO Akhir by Khairul  -End-  -->



          
          <li class="submenu">
            <a href="<?php echo  base_url() . "index.php/black/charts"; ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span>
              </div>
              PPUN
            </a>
              <ul>
              <li>
                <a href="<?php echo site_url('main/dokumen_rujukan_ppun'); ?>">Dokumen Rujukan</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kawalan_rekod_terima_ppun'); ?>">Kawalan Rekod Terima</a>
              </li>
             
              <li>
                <a href="<?php echo site_url('main/model_struktur_ppun'); ?>">Model Struktur </a>
              </li>
              <li>
                <a href="<?php echo site_url('main/penyediaan_kandungan_ppun'); ?>">Penyediaan Kandungan ppun</a>
              </li>
              
              <li>
                <a href="<?php echo site_url('main/treeviewskop_ppun'); ?>">Treeviewskop</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/tskopaktiviti_ppun'); ?>">Tskopaktiviti</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_ptf_ppun'); ?>">Summary PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_pp_ppun'); ?>">Summary PP</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_ppun'); ?>">Summary PPUN</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_ppun'); ?>">Senarai PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pp_ppun'); ?>">Senarai PP</a>
              </li>
            </ul>
          </li>
          <!-- end -->
*/ ?>             
          
          <li>
            <a href="<?php echo site_url('main/fungsi') ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe00d;"></span>
              </div>
              Fungsi
            </a>
          </li>
          
          
          <li>
            <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0a9;"></span>
              </div>
              Laporan
            </a>
          </li>
          <li>
            <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>
              </div>
              Penetapan Pentadbir
            </a>
          </li>
          <li>
            <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe00d;"></span>
              </div>
              Bantuan Atas Talian
            </a>
          </li>
          <li>
            <a href="#">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe100;"></span>
              </div>
              Takwim
            </a>
          </li>
          
          <!--
          <li class="submenu">
            <a href="edit-profile.html" class="selected">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe0aa;"></span>
              </div>
              Extras
            </a>
            <ul>
              <li>
                <a href="edit-profile.html">Edit Profile</a>
              </li>
              <li>
                <a href="calendar.html">Calendar</a>
              </li>
              <li>
                <a href="invoice.html">Invoice</a>
              </li>
              <li>
                <a href="login.html">Login</a>
              </li>
              <li>
                <a href="error.html">Error</a>
              </li>
              
              <li>
                <a href="help.html">Help</a>
              </li>
            </ul>
          </li>
          -->
        </ul>