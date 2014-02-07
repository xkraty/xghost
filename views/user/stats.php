<div class="stats-view">
  <!-- Player Stats -->
  <div class="col-md-6 animated bounceInLeft box" id="player">
    <div class="box-header" style="background-image:url('<?=PATCHES.md5($stats->squadMember->patch)?>.png')">
      <span class="clantag">[<?=$stats->clan->tag?>]</span>  <?=$stats->profile->gamertag?>
    </div>
    <div class="box-main">
      <div class="clearfix">
        <ul class="list-icon col-md-6">
          <li class="title"><?=translate('report')?></li>
          <li class="icon icon-kills">
            <span class="xlabel"><?=translate('kills')?></span>
            <span class="xvalue"><?=numbers($stats->profile->kill)?></span>
          </li>
          <li class="icon icon-deaths">
            <span class="xlabel"><?=translate('deaths')?></span>
            <span class="xvalue"><?=numbers($stats->profile->deaths)?></span>
          </li>
          <li class="icon icon-kdr">
            <span class="xlabel"><?=translate('kdr')?></span>
            <span class="xvalue"><?=numbers($stats->profile->kdr, 2)?></span>
          </li>
          <li class="icon icon-time">
            <span class="xlabel"><?=translate('time')?></span>
            <span class="xvalue"><?=numbers($stats->profile->hoursPlayed, 2)?></span>
          </li>
        </ul>

        <ul class="list-icon col-md-6">
          <li class="title"><?=translate('games')?></li>
          <li class="icon icon-played">
            <span class="xlabel"><?=translate('played')?></span>
            <span class="xvalue"><?=numbers($stats->profile->wins + $stats->profile->losses)?></span>
          </li>
          <li class="icon icon-win">
            <span class="xlabel"><?=translate('win')?></span>
            <span class="xvalue"><?=numbers($stats->profile->wins)?></span>
          </li>
          <li class="icon icon-winr">
            <span class="xlabel"><?=translate('winr')?></span>
            <span class="xvalue"><?=numbers($stats->profile->winr, 2)?></span>
          </li>
          <li class="icon icon-wins">
            <span class="xlabel"><?=translate('wins')?></span>
            <span class="xvalue"><?=numbers($stats->profile->currentStreak)?></span>
          </li>
        </ul>
      </div>

      <!-- <li>Favourite weapon <strong><?=$stats->profile->preferredWeapon?></strong></li>-->
    </div>
    <div class="box-footer">
      <div class="wrap-level current">
        <div class="current-level"><?=$stats->squadMember->level?></div>
        <?php if ( $stats->squadMember->prestige > 1 ): ?>
          <span class="prestige prestige-<?=$stats->squadMember->prestige - ( $stats->squadMember->prestige == 10 && $stats->squadMember->level == 60 ? 0 : 1)?>"></span>
        <?php else: ?>
          <span class="level level-<?=$stats->squadMember->level?>"></span>
        <?php endif; ?>
        <?php
        $progress = round($stats->squadMember->progress * 100);
        ?>
      </div>
      <?php if ( !($stats->squadMember->prestige == 10 && $stats->squadMember->level == 60) ): ?>
        <div class="progress">
          <div class="progress-bar" style="width: <?=$progress?>%;"></div>
        </div>
        <div class="wrap-level next">
          <?php if ( $stats->squadMember->prestige > 1 || ( $stats->squadMember->prestige == 1 && $stats->squadMember->level == 60 ) ): ?>
            <span class="prestige prestige-<?=$stats->squadMember->prestige - ( $stats->squadMember->level == 60 ? 0 : 1)?>"></span>
          <?php else: ?>
            <span class="level level-<?=$stats->squadMember->level?>"></span>
          <?php endif; ?>
          <div class="next-level"><?=$stats->squadMember->nextLevel?></div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Player Stats //-->
  <!-- Clan Stats -->
  <div class="col-md-6 animated bounceInRight box" id="clan">
    <div class="box-header" style="background-image:url('<?=CLANEMBLEM.$stats->clan->teamId?>')">
      <span class="clantag">[<?=$stats->clan->tag?>]</span> <?=$stats->clan->name?>
    </div>
    <div class="box-main">
      <div class="clearfix">
        <ul class="list-icon col-md-12">
          <li class="title"><?=$stats->clan->motto?></li>
          <li class="icon icon-members col-md-4">
            <span class="xlabel"><?=translate('members')?></span>
            <span class="xvalue"><?=numbers($stats->clan->memberCount)?></span>
          </li>
          <li class="icon icon-kdr col-md-4">
            <span class="xlabel"><?=translate('kdr')?></span>
            <span class="xvalue"><?=numbers($stats->clan->kdr, 2)?></span>
          </li>
          <li class="icon icon-winr col-md-4">
            <span class="xlabel"><?=translate('winp')?></span>
            <span class="xvalue"><?=numbers($stats->clan->winp)?>%</span>
          </li>
        </ul>
      </div>
      <!--<a href="index.php?a=currentwar" class="btn btn-primary">Vai alla Clan War</a>-->
      <a href="index.php?a=clan&clanId=<?=$stats->clan->teamId?>" class="btn btn-primary">Details</a>
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


<!--
<div class="clearfix">
  <div class="services">
    <div class="shadow-right"></div>
    <span class="service-ico2" style="background-image:url('<?=PATCHES.md5($stats->squadMember->patch)?>.png')"></span>
    <h3>Security One</h3>
    <p>Lorem ipsum dolor slo onsec  designs tueraliquet Morbi nec In Curabitur nel dolor slo onsec designs</p>
  </div>
</div>
-->
