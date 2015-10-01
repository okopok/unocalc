<form action="/<?=$gameData->id?>" method="post"/>
<ul>
<?php foreach($gameData->players as $playerid => $playerdata) { ?>
    <li><?=$playerdata->name?> <?=implode(', ', $playerdata->moves)?> <input autocomplete="off" type="text" name="score[<?=$playerdata->id?>]"> <?=array_sum($playerdata->moves)?></li>
<?php } ?>
</ul>
<input type="submit">
</form>
