<div id="mycod">
  <!-- Player stats-->
  <div class="panel active" id="ghosts-panel">
    <div class="panel-head">Call of Duty: Ghosts - Player Stats</div>
    <div class="user-info">
      <span class="patch" style="background-image:url('<?=PATCHES.md5($stats->squadMember->patch)?>.png')"></span>
      <p class="username">
        <span class="clantag">[<?=$stats->clan->tag?>]</span>  <?=$stats->profile->gamertag?>
      </p>
      <p id="level-<?=$stats->squadMember->level?>" class="level"><?=$stats->squadMember->level?></p>
    </div>
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
  <!-- Clan stats -->
  <div id="clan-panel" class="panel active">
    <div class="panel-head">Call of Duty: Ghosts - Clan Stats </div>
    <div class="clan-info">
      <span class="clanemblem" style="background-image:url('<?=CLANEMBLEM.$stats->clan->teamId?>')"></span>
      <p><span class="clantag">[<?=$stats->clan->tag?>]</span> <?=$stats->clan->name?></p>
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
  </div>
</div>
