<div class="detail-view">
  <!-- Clan Stats -->
  <div class="col-md-10 col-md-offset-1 animated bounceInBottom box" id="members">
    <div class="box-header" style="background-image:url('<?=CLANEMBLEM.$clan->teamId?>')">
      <span class="clantag">[<?=$clan->tag?>]</span> <?=$clan->name?>
    </div>
    <div class="box-main">
      <div class="clearfix">
        <ul class="list-icon col-md-12">
          <li class="title"><?=$clan->motto?></li>
          <li class="icon icon-members col-md-4">
            <span class="xlabel"><?=translate('members')?></span>
            <span class="xvalue"><?=numbers($clan->memberCount)?></span>
          </li>
          <li class="icon icon-kdr col-md-4">
            <span class="xlabel"><?=translate('kdr')?></span>
            <span class="xvalue"><?=numbers($clan->kdr, 2)?></span>
          </li>
          <li class="icon icon-winr col-md-4">
            <span class="xlabel"><?=translate('winp')?></span>
            <span class="xvalue"><?=numbers($clan->winp)?>%</span>
          </li>
        </ul>
      </div>
      <?php if ( $clan->members ): ?>
      <div id="members">
        <?php foreach ( $clan->members as $member ): ?>
          <div class="clearfix member">
            <div class="col-md-1">
              <span class="icon icon-<?=membershipType($member->membershipType)?>"></span>
            </div>
            <div class="col-md-6 username">
              <a href="index.php?a=stats&id=<?=$member->userId?>&network=<?=$member->network?>"><?=$member->userName?></a>
            </div>
            <div class="col-md-2">
              <span class="icon icon-kdr"></span>
              <span class="xlabel"><?=translate('kdr')?></span>
              <span class="xvalue"><?=numbers($member->kdRatio, 2)?></span>
            </div>
            <div class="col-md-2">
              <span class="icon icon-winr"></span>
              <span class="xlabel"><?=translate('winr')?></span>
              <span class="xvalue"><?=numbers($member->wins/$member->losses, 2)?></span>
            </div>
            <div class="col-md-1">
              <span class="icon icon-<?=$member->network?>"></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
    <div class="box-footer">
      <div class="wrap-level current">
        <div class="current-level"><?=$clan->clanLevel?></div>
        <?php
        $progress = round($clan->progress * 100);
        ?>
      </div>
      <div class="progress">
        <div class="progress-bar" style="width: <?=$progress?>%;"></div>
      </div>
      <div class="wrap-level next">
        <div class="next-level"><?=$clan->nextLevel?></div>
      </div>
    </div>
  </div>
  <!-- Clan Stats //-->
</div>
