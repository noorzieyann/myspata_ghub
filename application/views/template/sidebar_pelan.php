
        <ul style="display: block;">
          <li>
            <a href="<?php echo site_url('main') ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe000;"></span>
              </div>
              Menu Utama
            </a>
          </li>

<?php // CONTOH SIDEBAR YG MCM NUAR BUAT..  -START- ?>
          <!-- edited by anuar 10/07/2013 -->
          <li class="submenu active open">
            <a href="<?php echo  base_url() . "index.php/black/forms"; ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="false" data-icon="&#xe0b8;"></span>
              </div>
              PSPA(O)
            </a>
            
            <ul>
              <li class="active"><a href="<?php echo site_url('main/arahan_sedia_pspao') ?>">Arahan Sedia</a></li>
              <li><a href="<?php echo site_url('main/senarai_notifikasi_pspao') ?>">Senarai Notifikasi</a></li>
              <li><a href="<?php echo site_url('main/pspao_baru') ?>">PSPA(O) Baru</a></li>
              <li><a href="<?php echo site_url('main/ulasan_pp_lulus_pspao') ?>">Ulasan PTF Lulus</a></li>
              <li><a href="<?php echo site_url('main/ulasan_pp_sah_pspao') ?>">Ulasan PP Sah</a></li>
              <li><a href="<?php echo site_url('main/senarai_pp_pspao') ?>">Senarai PSPA(O) PP</a></li>
              <li><a href="<?php echo site_url('main/senarai_ptf_pspao') ?>">Senarai PSPA(O) PTF</a></li>
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

<!-- PTRA by Fatin -->
<li class="submenu">
            <a href="<?php echo  base_url() . "index.php/black/charts"; ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span>
              </div>
              PTRA
            </a>
              <ul>
              <li>
                <a href="<?php echo site_url('main/dokumen_rujukan_ptra'); ?>">Dokumen Rujukan</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kawalan_rekod_ptra'); ?>">Kawalan Rekod Penerimaan Aset</a>
              </li>
             
              <li>
                <a href="<?php echo site_url('main/model_struktur_ptra'); ?>">Model Struktur </a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kandungan_ptra'); ?>">Kandungan PTRA</a>
              </li>
              
              <li>
                <a href="<?php echo site_url('main/treeview_ptra'); ?>">Treeviews Skop</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/skop_aktiviti_ptra'); ?>">Skop dan Aktiviti</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/skop_aktiviti2_ptra'); ?>">Skop dan Aktiviti 2</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_ptf_ptra'); ?>">Summary PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_pp_ptra'); ?>">Summary PP</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_ptra'); ?>">Summary PPUN</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_ptra'); ?>">Senarai PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pp_ptra'); ?>">Senarai PP</a>
              </li>
            </ul>
          </li>
<!-- PTRA by Fatin END -->



<!-- POPA by Seri START -->
<li class="submenu">
            <a href="<?php echo  base_url() . "index.php/black/charts"; ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span>
              </div>
              POPA
            </a>
              <ul>
              <li>
                <a href="<?php echo site_url('main/dokumen_rujukan_popa'); ?>">Dokumen Rujukan</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kawalan_rekod_popa'); ?>">Kawalan Rekod Operasi dan Penyenggaraan Aset</a>
              </li>
             
              <li>
                <a href="<?php echo site_url('main/model_struktur_popa'); ?>">Model Struktur </a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kandungan_popa'); ?>">Kandungan POPA</a>
              </li>
              
              <li>
                <a href="<?php echo site_url('main/treeview_popa'); ?>">Treeview Skop</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/skop_aktiviti_popa'); ?>">Skop dan Aktiviti</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/skop_aktiviti2_popa'); ?>">Skop dan Aktiviti 2</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_ptf_popa'); ?>">Summary PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_pp_popa'); ?>">Summary PP</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_popa'); ?>">Summary POPA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_popa'); ?>">Senarai PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pp_popa'); ?>">Senarai PP</a>
              </li>
            </ul>
          </li>
<!-- POPA by Seri END -->



          
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
          
          <!-- PLA by Azura -->
<li class="submenu">
            <a href="<?php echo  base_url() . "index.php/black/charts"; ?>">
              <div class="icon">
                <span class="fs1" aria-hidden="true" data-icon="&#xe096;"></span>
              </div>
              PLA
            </a>
              <ul>
              <li>
                <a href="<?php echo site_url('main/dokumen_rujukan_pla'); ?>">Dokumen Rujukan</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kawalan_rekod_pla'); ?>">Kawalan Rekod Pelupusan Aset</a>
              </li>
             
              <li>
                <a href="<?php echo site_url('main/model_struktur_pla'); ?>">Model Struktur </a>
              </li>
              <li>
                <a href="<?php echo site_url('main/kandungan_pla'); ?>">Kandungan PLA</a>
              </li>
              
              <li>
                <a href="<?php echo site_url('main/treeview_pla'); ?>">Treeviews Skop</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/skop_aktiviti_pla'); ?>">Skop dan Aktiviti</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/skop_aktiviti2_pla'); ?>">Skop dan Aktiviti 2</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_ptf_pla'); ?>">Summary PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_pp_pla'); ?>">Summary PP</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/summary_pla'); ?>">Summary PLA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_pla'); ?>">Senarai PTF</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_pp_pla'); ?>">Senarai PP</a>
              </li>
            </ul>
          </li>
<!-- PLA by Azura END -->
          
          
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
                <a href="<?php echo site_url('main/senarai_ptf_ptra') ?>">PTRA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_popa') ?>">POPA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_pnpa') ?>">PNPA</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_ppun') ?>">PPUN</a>
              </li>
              <li>
                <a href="<?php echo site_url('main/senarai_ptf_pla') ?>">PLA</a>
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