<div class="stats-view">
  <!-- Player Stats -->
  <div class="col-md-6 animated bounceInLeft box">
    <div class="box-header" style="background-image:url('<?=PATCHES.md5($stats->squadMember->patch)?>.png')">
      <span class="clantag">[<?=$stats->clan->tag?>]</span>  <?=$stats->profile->gamertag?>
    </div>
    <div class="box-main">
      <ul class="block-stats">
        <li class="bstat kdr">
          <span class="icon"></span>
          <p>K/D</p>
          <h3><?=round($stats->profile->kdr, 2)?></h3>
        </li>
        <li class="bstat winr">
          <span class="icon"></span>
          <p>W/L</p><h3><?=round($stats->profile->winr, 2)?></h3>
        </li>
        <li class="bstat hours">
          <span class="icon"></span>
          <p>Hours</p>
          <h3><?=round($stats->profile->hoursPlayed, 2)?></h3>
        </li>
      </ul>

      <ul class="list-stats">
        <li>Favourite weapon <strong><?=$stats->profile->preferredWeapon?></strong></li>
        <li>Win streak <strong><?=$stats->profile->currentStreak?></strong></li>
      </ul>
    </div>
    <div class="box-footer">
      <div class="wrap-level current">
        <div class="current-level"><?=$stats->squadMember->level?></div>
        <?php if ( $stats->squadMember->prestige > 1 || ( $stats->squadMember->prestige == 1 && $stats->squadMember->level == 60 ) ): ?>
          <span class="prestige prestige-<?=$stats->squadMember->prestige - ( $stats->squadMember->prestige == 10 && $stats->squadMember->level == 60 ? 0 : 1)?>"></span>
        <?php else: ?>
          <span class="level level-<?=$stats->squadMember->level?>"></span>
        <?php endif; ?>
        <?php
        $progress = round($stats->squadMember->progress * 100);
        ?>
      </div>
      <div class="progress">
        <div class="progress-bar" style="width: <?=$progress?>%;"></div>
      </div>
      <div class="wrap-level next">
        <!-- to fix prestige checks -->
        <?php if ( $stats->squadMember->prestige > 1 || ( $stats->squadMember->prestige == 1 && $stats->squadMember->level == 60 ) ): ?>
          <span class="prestige prestige-<?=$stats->squadMember->prestige - ( $stats->squadMember->prestige == 10 && $stats->squadMember->level == 60 ? 0 : 1)?>"></span>
        <?php else: ?>
          <span class="level level-<?=$stats->squadMember->level?>"></span>
        <?php endif; ?>
        <div class="next-level"><?=$stats->squadMember->nextLevel?></div>
      </div>
    </div>
  </div>

  <!-- Player Stats //-->
  <!-- Clan Stats -->
  <div class="col-md-6 animated bounceInRight box">
    <div class="box-header" style="background-image:url('<?=CLANEMBLEM.$stats->clan->teamId?>')">
      <span class="clantag">[<?=$stats->clan->tag?>]</span> <?=$stats->clan->name?>
    </div>
    <div class="box-main">
      <div class="clan-info">
        <span class="clanemblem" style="background-image:url('<?=CLANEMBLEM.$stats->clan->teamId?>')"></span>
        <p></p>
        <h3>Level <?=$stats->clan->clanLevel?></h3>
      </div>
      <ul class="block-stats">
        <li class="bstat members">
          <span class="icon"></span>
          <p>Members</p><h3><?=$stats->clan->memberCount?></h3>
        </li>
        <li class="bstat kdr">
          <span class="icon"></span>
          <p>K/D</p>
          <h3><?=$stats->clan->kdr?></h3>
        </li>
        <li class="bstat winr">
          <span class="icon"></span>
          <p>W/L</p>
          <h3><?=$stats->clan->winp?></h3>
        </li>
      </ul>
      <br />
      <a href="index.php?a=currentwar" class="btn btn-primary">Vai alla Clan War</a>
    </div>
    <div class="box-footer">
      <div class="wrap-level current">
        <div class="current-level"><?=$stats->clan->clanLevel?></div>
        <?php
        $progress = round($stats->clan->progress * 100);
        ?>
      </div>
      <div class="progress">
        <div class="progress-bar" style="width: <?=$progress?>%;"></div>
      </div>
      <div class="wrap-level next">
        <div class="next-level"><?=$stats->clan->nextLevel?></div>
      </div>
    </div>
  </div>
  <!-- Clan Stats //-->
</div>


<div class="clearfix">
  <div class="services">
    <div class="shadow-right"></div>
    <span class="service-ico2" style="background-image:url('<?=PATCHES.md5($stats->squadMember->patch)?>.png')"></span>
    <h3>Security One</h3>
    <p>Lorem ipsum dolor slo onsec  designs tueraliquet Morbi nec In Curabitur nel dolor slo onsec designs</p>
  </div>
</div>


