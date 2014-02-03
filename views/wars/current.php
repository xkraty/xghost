<h2><?=$war->war->flavor_text?></h2>
<p><?=dateFormat($war->war->valid_start_time, '%d-%m-%Y', true)?> to <?=dateFormat($war->war->valid_end_time)?> now <?=dateFormat($war->now)?></p>
<div id="mycod">
  <?php foreach ( $war->war->targets as $k => $target ): ?>
    <?php
      $tmp = $war->targets->{$k};
      $progress = (array) $tmp->progress;
      arsort($progress);
    ?>
    <div class="panel active col-md-6"><?=$translate[$target->game_mode]?> Bonus <?=$target->reward_exp_percent?> % Exp - Points <?=$tmp->clan_points?> - Capture <?=$tmp->threshold?>
      <ul>
        <li><?=$tmp->clan_owner_number > 0 ? '<img src="'.CLANEMBLEM.$war->clans->{$tmp->clan_owner_number}->clan_id.'">'.$war->clans->{$tmp->clan_owner_number}->name." ".$tmp->shields : ''?></li>
        <?php foreach ( $progress as $clan_id => $score): ?>
          <?php if ( $tmp->clan_owner_number != $clan_id ): ?>
            <li><img src="<?=CLANEMBLEM_SMALL.$war->clans->{$clan_id}->clan_id?>"><?=$war->clans->{$clan_id}->name?> <?=$score?></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endforeach; ?>
</div>

<?php
$clans = (array) $war->clans;
foreach ( $clans as $clan ) {
  $sorter[] = $clan->clan_points;
}
array_multisort($sorter, SORT_DESC, $clans);
?>
<table class="table">
  <?php foreach ( array_values($clans) as $k => $clan ): ?>
    <tr>
      <td style="width: 20px;"><?=$k+1?></td>
      <td style="width: 45px;"><img src="<?=CLANEMBLEM.$clan->clan_id?>"></td>
      <td><?=$clan->name?></td>
      <td><?=$clan->clan_points?></td>
    </tr>
  <?php endforeach; ?>
</table>
