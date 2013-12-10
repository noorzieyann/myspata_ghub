<?php
	/*
	*/
?>
<div style="width:1055px">
    <header>
    <?php /*
      <a href="<?php echo base_url(); ?>" class="logo">
        <img src="<?php echo base_url(); ?>asset/img/logo.png" alt="Logo"/>
      </a>
	  */ ?>
      <div class="user-profile">
        <a data-toggle="dropdown" class="dropdown-toggle">
          <img src="<?php echo base_url(); ?>asset/img/profile1.png" alt="profile">
        </a>
        <span class="caret"></span>
        <ul class="dropdown-menu pull-right">
          <li>
            <a href="#">
              Sunting Profil
            </a>
          </li>
          <li>
            <a href="#">
              Penetapan Akaun
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('auth/logout') ?>">
              Log Keluar
            </a>
          </li>
        </ul>
      </div>
<?php /*
      <ul class="mini-nav">
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe040;"></div>
            <span class="info-label">
              3
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe04c;"></div>
            <span class="info-label-green">
              5
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe037;"></div>
            <span class="info-label-orange">
              9
            </span>
          </a>
        </li>
      </ul>
*/?>
    </header>
    
</div>
