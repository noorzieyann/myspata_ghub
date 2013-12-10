
        <ul style="display: block;">
          <li class="active">
            <a href="<?php echo site_url('main') ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe000;"></span>
              </div>
              Menu Utama
            </a>
          </li>

<?php // CONTOH SIDEBAR YG MCM NUAR BUAT..  -START- ?>
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
<?php // CONTOH SIDEBAR YG MCM NUAR BUAT..   -END-  ?>
          <li class="submenu">
            <a href="">
           
              1. Permintaan Penyediaan
            </a>
            <ul>
              <li>
                <a href="">PSPA(O)(Awal)</a>
              </li>
              <li>
                <a href="">PSPA(O)(Akhir)</a>
              </li>
              <li>
                <a href="">Senarai PSPA(O)(Awal)</a>
              </li>
              
            </ul>
          </li>
          <li class="submenu">
            <a href="" class="selected">2. Pelan
            </a>
            <ul>
              <li>
                <a href="">PSPA(O)</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pft_ptra') ?>">PTRA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pft_popa') ?>">POPA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pft_pnpa') ?>">PNPA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pft_ppun') ?>">PPUN</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pft_pla') ?>">PLA</a>
              </li>
              
              <li>
                <a href="">Senarai Edaran PSPA(O)</a>
              </li>
             
              
            </ul>
          </li>
          <li class="submenu">
            <a href="" class="selected">3. Utiliti
            </a>
            <ul>
              <li>
                <a href="">Keperluan Sumber</a>
              </li>
            </ul>
          </li>
        </ul>
  