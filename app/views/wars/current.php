<div class="currentwar-view">
  <!-- Top Bare -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
          <span class="sr-only"><?=translate('menu')?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?=$war->war->flavor_text?></a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
        <ul class="nav navbar-nav">
          <li><a href="#ranking"><?=translate('ranking')?></a></li>
        </ul>
        <p class="navbar-right navbar-text" id="warcountdown">00:00:00</p>
        <p class="navbar-right navbar-text"><?=warDivision($war->war->division)?></p>
      </div>
    </div>
  </nav>
  <!-- Top Bar //-->
  <!-- Ranking -->
  <?php
    $clans = (array) $war->clans;
    foreach ( $clans as $clan ) {
      $sorter[] = $clan->clan_points;
    }
    array_multisort($sorter, SORT_DESC, $clans);
    $clans = array_values($clans);
    ?>
    <div class="clearfix" id="ranking">
      <div class="col-md-12 animated fadeIn box">
        <div class="box-header" style="background-image:url('<?=CLANEMBLEM.$clans[0]->clan_id?>')">
          <?=translate('ranking')?>
        </div>
        <div class="box-main">
          <table class="table table-condensed">
            <?php foreach ( $clans as $k => $clan ): ?>
              <tr>
                <td style="width: 20px;"><?=$k+1?></td>
                <td style="width: 45px;"><img src="<?=CLANEMBLEM_SMALL.$clan->clan_id?>"></td>
                <td><a href="index.php?a=clan&clanId=<?=$clan->clan_id?>"><?=$clan->name?></a></td>
                <td style="width: 45px;"><?=$clan->clan_points?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="box-footer">
          <?=translate('updated_at')?> <?=dateFormat($war->now)?>
        </div>
      </div>
    </div>
  <!-- Ranking //-->
  <!-- Nodes -->
  <?php
    $i = 0;
    foreach ( $war->war->targets as $k => $target ): ?>
    <?php
      $tmp = $war->targets->{$k};
      $progress = (array) $tmp->progress;
      arsort($progress);
    ?>
    <?php if ( $i % 2 == 0): ?>
      <div class="clearfix">
    <?php endif; ?>
    <div class="col-md-6 animated fadeIn box">
      <?php
        $owner_img = 'http://placehold.it/45x45&text=xGhost';
        if ( $tmp->clan_owner_number > 0 ) {
          $owner_img = CLANEMBLEM.$war->clans->{$tmp->clan_owner_number}->clan_id;
        }
      ?>
      <div class="box-header" style="background-image:url('<?=$owner_img?>')">
        <?=translate($target->game_mode)?>
        <div class="pull-right stats">
          <span class="icon small icon-shield" rel="tooltip" title="Shield"></span> <span class="pull-left"><?=$tmp->shields?></span>
          <span class="icon small icon-treshold" rel="tooltip" title="Treshold"></span> <span class="pull-left"><?=$tmp->threshold?></span>
        </div>
      </div>
      <div class="box-main">
        <table class="table table-condensed">
          <?php foreach ( $progress as $clan_id => $score): ?>
            <?php if ( $tmp->clan_owner_number != $clan_id ): ?>
              <tr>
                <td style="width: 30px"><img src="<?=CLANEMBLEM_SMALL.$war->clans->{$clan_id}->clan_id?>"></td>
                <td><?=$war->clans->{$clan_id}->name?></td>
                <td style="width: 30px"><?=$score?></td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="box-footer">
        <div class="clearfix">
          <div class="pull-right">
            <?=$tmp->clan_points?> CP
          </div>
          <div class="pull-left">
            Bonus <?=$target->reward_exp_percent?> % Exp
          </div>
        </div>
      </div>
    </div>
    <?php if ( $i % 2 ): ?>
      </div>
    <?php endif; ?>
  <?php
  $i++;
  endforeach; ?>
  <!-- Nodes //-->
</div>
<script type="text/javascript">
  $countdown = new Date('<?=$war->end_time?>');
  $labels = ["<?=translate('years')?>", "<?=translate('months')?>", "<?=translate('weeks')?>", "<?=translate('days')?>", "<?=translate('hours')?>", "<?=translate('minutes')?>", "<?=translate('seconds')?>"];
</script>
