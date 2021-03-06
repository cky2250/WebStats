<?php
/**
 * The fallowing if statements will allow for Ajax to call the functions externally.
 *
 * @since 4.0
 *
 */
define('ROOT', '../../../');
if(file_exists(ROOT . 'config/config.php'))
	include_once ROOT . 'config/config.php';
include_once ROOT . 'include/en.php';
require_once ROOT . 'include/functions.php';

if (isset($_POST['set_player_details_table'])) {
	$link = mysqli_connect(WS_CONFIG_DBHOST, WS_CONFIG_DBUNAME, WS_CONFIG_DBPASS, WS_CONFIG_DBNAME, WS_CONFIG_DBPORT);
	$uuid = get_user_uuid($_POST['set_player_details_table']);
	echo set_player_details_table($uuid);
	mysqli_close($link);
}

if (isset($_POST['set_player_tables'])) {
	$link = mysqli_connect(WS_CONFIG_DBHOST, WS_CONFIG_DBUNAME, WS_CONFIG_DBPASS, WS_CONFIG_DBNAME, WS_CONFIG_DBPORT);
	$uuid = get_user_uuid($_POST['set_player_tables']);
	echo '<div class="large-9 large-centered columns head_maintable">
	<ul class="tabs" data-tab role="tablist">
		<li class="tab-title active" role="presentational"><a href="#PlayerTab" role="tab" tabindex="0" aria-selected="true" controls="PlayerTab">Player Kills/Deaths</a></li>
		<li class="tab-title" role="presentational"><a href="#BlocksTab" role="tab" tabindex="0" aria-selected="false" controls="BlocksTab">Destroyed/Placed Blocks</a></li>
	</ul>
	<div class="tabs-content">
		<!--Killed and Killed By ~ START-->
		<div role="tabpanel" aria-hidden="false" class="content active" id="PlayerTab">
			<table style="margin: 0 auto;">
				<tr>
					<td>'.translate('var12').':</td>
					<td>'.translate('var13').':</td>
				</tr>
				<tr>
					<td>'.set_player_kill_table($uuid).'</td>
					<td>'.set_player_death_table($uuid).'</td>
				</tr>
			</table>
		</div>
		<!--Killed and Killed By ~ END-->
		<!--Destroyed and Placed Blocks ~ START-->
		<div role="tabpanel" aria-hidden="true" class="content" id="BlocksTab">
			<table style="margin: 0 auto;">
				<tr>
					<td>ID:</td>
					<td>'.translate('var8').':</td>
					<td>'.translate('var9').':</td>
				</tr>';
		/*		'.set_player_destroy_build_table($_POST['set_player_tables']).'*/
		echo	'</table>
		</div>
		<!--Destroyed and Placed Blocks ~ END-->
	</div>
</div>';
	mysqli_close($link);
}

/**
 * This function will return the player amount in the table.
 *
 * @since 4.0
 *
 */
function findPlayerAmount() {
	global $link;
	$query = mysqli_query($link, "SELECT COUNT('name') FROM ".WS_CONFIG_STATS."players");
	$data = mysqli_fetch_array($query, MYSQLI_NUM);
	return $data[0];
}
/**
 * This function will find the user uuid.
 *
 * @since 4.0
 *
 */
function get_user_uuid($username) {
	global $link;
	$query = mysqli_query($link, "SELECT `uuid` FROM `".WS_CONFIG_STATS."players` WHERE `name`='$username'");
	$row = mysqli_fetch_array($query, MYSQLI_NUM);
	return $row[0];
}
/**
 * This function will extract the list of players in the table.
 *
 * @since 4.0
 *
 */
function get_user_stats($start, $end) {
	global $link;
	$array = array();
	$query = mysqli_query($link, "SELECT `uuid`,`name` FROM `".WS_CONFIG_STATS."players` ORDER BY `name` LIMIT ".$start.",".$end);
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$array[] = array("uuid" => $row[0], "name" => $row[1]);
	}
	return $array;
}
/**
 * This function will create the stats homepage table.
 *
 * @since 4.0
 *
 * @param string $user array of the user containing uuid and name.
 * @param string $stat the stat to sum.
 * @param string $location which table to pick the data from.
 */
function get_amount_sum($user, $stat, $location) {
	global $link;
	$query = mysqli_query($link, "SELECT SUM(`$stat`) FROM `".WS_CONFIG_STATS."$location` WHERE `uuid`='$user'");
	$data = mysqli_fetch_array($query, MYSQLI_NUM);
	return $data[0];
}
/**
 * This function will create the stats homepage table.
 *
 * @since 4.0
 *
 * @param string $user array of the user containing uuid and name.
 */
function get_amount_break_sum($user) {
	global $link;
	$query = mysqli_query($link, "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."blocks_broken` WHERE `uuid`='$user'");
	$data = mysqli_fetch_array($query, MYSQLI_NUM);
	return $data[0];
}
/**
 * This function will create the stats homepage table.
 *
 * @since 4.0
 *
 * @param string $player array of the user containing uuid and name.
 * @param string $pos list number of the user.
 */
function set_index_table($player, $pos) {
	$pos++;
	global $image_control;
	if($image_control == true) {
		$image = small_image($player['name']);
	}
	$output .= '<tr><td>'.$pos.'</td>';
	$output .= '<td>&nbsp;&nbsp;'.$image.'<a class="ajax-link" href="index.php?mode=show-player&user='.$player['name'].'">'.$player['name'].'</a></td>';
	$output .= '<td>'.get_played(get_amount($player['uuid'], "value", "playtime")).'</td>';
	$output .= '<td>'.get_date(round(get_amount($player['uuid'], "value", "last_seen")/3000)).'</td>';
	$output .= '<td>'.get_status(get_amount($player['uuid'], "value", "last_seen"), get_amount($player['uuid'], "value", "last_join")).'</td>';
	$output .= "</tr>";
	return $output;
}
/**
 * This function will get the value of the table.
 *
 * @since 4.0
 *
 * @param string $user uuid value of the user.
 * @param string $stat table value to be selected.
 * @param string $location table suffix name.
 */
function get_amount($user, $stat, $location) {
	global $link;
	$query = mysqli_query($link, "SELECT `$stat` FROM `".WS_CONFIG_STATS."$location` WHERE `uuid`='$user'");
	$data = @mysqli_fetch_array($query, MYSQLI_NUM);
	return $data[0];
}
/**
 * This function will check whether the player is online or not.
 *
 * @since 4.0
 *
 * @param string $lastlogout Name of last logout column.
 * @param string $lastlogin Name of last login column.
 */
function get_status($lastlogout, $lastlogin) {
	if(strtotime($lastlogin) >= strtotime($lastlogout))
		$status = '<span class="online">Online</span>';
	else
		$status = '<span class="offline">Offline</span>';
	return $status;
}
/**
 * This function will get the sum of players play time.
 *
 * @since 4.0
 *
 */
function get_server_played() {
	global $link;
	$query = mysqli_query($link, "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."playtime`");
	$row = mysqli_fetch_array($query, MYSQLI_NUM);
	$time = $row[0];
	
	$hour = $time / 3600;
	$hour_2 = floor($hour);
	$minute_hour = $hour_2 * 60;
	$minute = $time / 60; 
	$minute_2 = $minute - $minute_hour;
	$minute_3 = floor($minute_2);
	$day = $hour_2 / 24;
	$day_2 = floor($day);
	$hour_3 = $hour_2 - ($day_2 * 24) ;
	$dayholder = 0;
	
	if ($minute_3 <= 9){$minute_3 = '0'.$minute_3;};
	if ($hour_2 <= 10 && $minute_3 >= 0) {
		$played = "0$hour_2 h $minute_3 m";
	}

	if ($hour_2 > 10) {
		$played = "$hour_2 h $minute_3 m";
	 }
	 return $played;
}
/**
 * This function will get the sum of players move type.
 *
 * @since 4.0
 *
 * @param string $type (0=walk, 1=boat, 2=train, 3=pig, 4=pig in train, 5=horse).
 */
function get_server_count_player_move($type) {
	if($type > 5 || $type < 0){
		return "Error! No movement of this type exists.";
	} else {
		global $link;
		$query = mysqli_query($link, "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."move` WHERE `type`=$type");
		$row = mysqli_fetch_array($query, MYSQLI_NUM);
		return $row[0];
	}
}
/**
 * This function will get the sum of players move type.
 *
 * @since 4.0
 *
 * @param string $user uuid.
 * @param intager $type (0=walk, 1=boat, 2=train, 3=pig, 4=pig in train, 5=horse).
 */
function get_movement($user, $type) {
	if($type > 5 || $type < 0){
		return "Error! No movement of this type exists.";
	} else {
		global $link;
		$query = mysqli_query($link, "SELECT `value` FROM `".WS_CONFIG_STATS."move` WHERE `uuid` = '$user' AND `type` = '$type'");
		$data = mysqli_fetch_array($query, MYSQLI_NUM);
		return $data[0];
	}
}
/**
 * This function will get the sum of players move type.
 *
 * @since 4.0
 *
 * @param string $stat table types.
 */
function getServerTotal($stat) {
	global $link;
	$query;
	switch ($stat) {
		case "arrows":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."arrows`";
		break;
		case "beds_entered":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."beds_entered`";
		break;
		case "blocks_broken":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."blocks_broken`";
		break;
		case "blocks_placed":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."block`";
		break;
		case "bucket_emptied":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."bucket_emptied`";
		break;
		case "bucket_filled":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."bucket_filled`";
		break;
		case "commands_done":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."commands_done`";
		break;
		case "damage_taken":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."damage_taken`";
		break;
		case "death":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."death`";
		break;
		case "eggs_thrown":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."eggs_thrown`";
		break;
		case "fish_caught":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."fish_caught`";
		break;
		case "items_crafted":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."items_crafted`";
		break;
		case "items_dropped":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."items_dropped`";
		break;
		case "items_picked_up":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."items_picked_up`";
		break;
		case "joins":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."joins`";
		break;
		case "omnomnom":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."omnomnom`";
		break;
		case "shears":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."shears`";
		break;
		case "teleports":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."teleports`";
		break;
		case "times_changed_world":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."times_changed_world`";
		break;
		case "times_kicked":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."times_kicked`";
		break;
		case "tools_broken":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."tools_broken`";
		break;
		case "trades":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."trades`";
		break;
		case "votes":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."votes`";
		break;
		case "words_said":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."words_said`";
		break;
		case "xp_gained":
			$query = "SELECT SUM(`value`) FROM `".WS_CONFIG_STATS."xp_gained`";
		break;
  }
  	$query = mysqli_query($link, $query);
	$row = mysqli_fetch_array($query, MYSQLI_NUM);
	return $row[0];
}
/**
 * This function will output the table for the server-stats page.
 *
 * @since 4.0
 *
 */
function set_server_details_table() {
	$output = '<div class="row head_logo" style="margin: 0 0;background-image:url('.WS_CONFIG_LOGO.');"></div>';
	$output .= '<div class="row" style="margin: 0 0;"><table class="large-6 columns head_contentbox">';
	$output .= '<tr>
					<td>'.translate("var23").':</td>
					<td>'.findPlayerAmount().'</td>
				</tr>
				<tr>
					<td>'.translate("var8").':</td>
					<td>'.getServerTotal('blocks_broken').'</td>
				</tr>
				<tr>
					<td>'.translate("var9").':</td>
					<td>'.getServerTotal('blocks_placed').'</td>
				</tr>
				<tr>
					<td>'.translate("var4").':</td>
					<td>'.get_server_played().'</td>
				</tr>
				<tr>
					<td>'.translate("var25").':</td>
					<td>'.getServerTotal("joins").'</td>
				</tr>
				<tr>
					<td>'.translate("var17").' '.translate("var85").':</div>
					<td>'.round(get_server_count_player_move(0), 2).' '.translate("var18").'</td>
				</tr>
				<tr>
					<td>'.translate("var17").' '.translate("var86").':</div>
					<td>'.round(get_server_count_player_move(1), 2).' '.translate("var18").'</td>
				</tr>
				<tr>
					<td>'.translate("var17").' '.translate("var87").':</div>
					<td>'.round(get_server_count_player_move(2), 2).' '.translate("var18").'</td>
				</tr>
				<tr>
					<td>'.translate("var17").' '.translate("var88").':</div>
					<td>'.round(get_server_count_player_move(3), 2).' '.translate("var18").'</td>
				</tr>
				<tr>
					<td>'.translate("var17").' '.translate("var111").':</div>
					<td>'.round(get_server_count_player_move(5), 2).' '.translate("var18").'</td>
				</tr>
				<tr>
					<td>'.translate("var27").':</td>
					<td>'.getServerTotal("commands_done").'</td>
				</tr>
				<tr>
					<td>'.translate("var93").':</td>
					<td>'.getServerTotal("arrows").'</td>
				</tr>
				<tr>
					<td>'.translate("var89").':</td>
					<td>'.getServerTotal("xp_gained").'</td>
				</tr>
				<tr>
					<td>'.translate("var90").':</td>
					<td>'.getServerTotal("fish_caught").'</td>
				</tr>
				<tr>
					<td>'.translate("var91").':</td>
					<td>'.getServerTotal("damage_taken").'</td>
				</tr>	
				<tr>
					<td>'.translate("var92").':</td>
					<td>'.getServerTotal("times_kicked").'</td>
				</tr>';
	$output .= '</table>';
	$output .= '<table class="large-6 columns head_contentbox">';
	$output .= '<tr>
					<td>'.translate("var95").':</td>
					<td>'.getServerTotal("eggs_thrown").'</td>
				</tr>
				<tr>
					<td>'.translate("var96").':</td>
					<td>'.getServerTotal("items_crafted").'</td>
				</tr>
				<tr>
					<td>'.translate("var97").':</td>
					<td>'.getServerTotal("omnomnom").'</td>
				</tr>
				<tr>
					<td>'.translate("var28").':</td>
					<td>'.getServerTotal("words_said").'</td>
				</tr>
				<tr>
					<td>'.translate("var99").':</td>
					<td>'.getServerTotal("votes").'</td>
				</tr>
				<tr>
					<td>'.translate("var100").':</td>
					<td>'.getServerTotal("teleports").'</td>
				</tr>
				<tr>
					<td>'.translate("var101").':</td>
					<td>'.getServerTotal("items_picked_up").'</td>
				</tr>
				<tr>
					<td>'.translate("var104").':</td>
					<td>'.getServerTotal("items_dropped").'</td>
				</tr>
				<tr>
					<td>'.translate("var102").':</td>
					<td>'.getServerTotal("beds_entered").'</td>
				</tr>
				<tr>
					<td>'.translate("var106").':</td>
					<td>'.getServerTotal("bucket_emptied").'</td>
				</tr>
				<tr>
					<td>'.translate("var110").':</td>
					<td>'.getServerTotal("bucket_filled").'</td>
				</tr>
				<tr>
					<td>'.translate("var103").':</td>
					<td>'.getServerTotal("times_changed_world").'</td>
				</tr>
				<tr>
					<td>'.translate("var105").':</td>
					<td>'.getServerTotal("shears").'</td>
				</tr>
				<tr>
					<td>'.translate("var16").':</td>
					<td>'.getServerTotal("death").'</td>
				</tr>
				<tr>
					<td>'.translate("var109").':</td>
					<td>'.getServerTotal("trades").'</td>
				</tr>
				<tr>
					<td>'.translate("var94").':</td>
					<td>'.getServerTotal("tools_broken").'</td>
				</tr>';
	$output .= '</table></div>';
	return $output;
}
/**
 * This function will output the table for the server-stats page.
 *
 * @since 4.0
 *
 * @param string $bool bool value input to change the MySQL search type.
 */
function set_server_kill_table($bool) {
	global $link;
	if($bool==true) {$search="ORDER BY `entityType` ASC";}
	else {$search="ORDER BY SUM(`value`) DESC";}
	$query = mysqli_query($link, "SELECT `entityType`, SUM(`value`) FROM `".WS_CONFIG_STATS."kill` GROUP BY `entityType` ".$search);
	$output = '<table class="head_contentbox">';
	$output .= "<tr><th colspan='2'>".translate('var21').":</th></tr>";
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$output .= '<tr><td><img src="images/icons/'.strtolower(decrypt($row[0])).'.png" width="16px" height="16px" />&nbsp;&nbsp;<a class="ajax-link" href="index.php?mode=creature-stats&creature='.decrypt($row[0]).'">'.translate($row[0]).':</a></td>';	
		$output .= '<td>'.$row[1].'</td></tr>';
	}
	$output .= '</table>';
	return $output;
}
/**
 * This function will output the table for the server-stats page.
 *
 * @since 4.0
 *
 * @param string $bool bool value input to change the MySQL search type.
 */
function set_server_death_table($bool) {
	global $link;
	if($bool==true) {$search="ORDER BY `cause` ASC";}
	else {$search="ORDER BY SUM(`value`) DESC";}
	$query = mysqli_query($link, "SELECT `cause`, SUM(`value`) FROM `".WS_CONFIG_STATS."death` GROUP BY `cause` ".$search."");
	$output = '<table class="head_contentbox">';
	$output .= "<tr><th colspan='2'>".translate('var22').":</th></tr>";
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$output .= '<tr><td>'.$row[0].':</td>';	
		$output .= '<td>'.$row[1].'</td></tr>';
	}
	$output .= '</table>';
	return $output;
}
/**
 * This function will output the table for the server-stats page.
 *
 * @since 4.0
 *
 * @param string $bool bool value input to change the MySQL search type.
 */
function set_server_destroy_build_table($bool) {
	global $link;
	if($bool==true) {$search="ORDER BY `cause` ASC";}
	else {$search="ORDER BY SUM(`value`) DESC";}
	$query = mysqli_query($link, "SELECT `sbo`.`blockID`, `q1`.`amn`, `q2`.`brk` FROM (SELECT `blockID` FROM `".WS_CONFIG_STATS."block` GROUP BY `blockID` ORDER BY `blockID` asc) as sbo LEFT JOIN (SELECT `blockID`, SUM(`amount`) as amn FROM `".WS_CONFIG_STATS."block` WHERE break = 0 GROUP BY blockID ORDER BY blockID asc) as q1 ON sbo.blockID = q1.blockID LEFT JOIN (SELECT blockID, SUM(`amount`) as brk FROM `".WS_CONFIG_STATS."block` WHERE `break` = 1 GROUP BY `blockID` ORDER BY `blockID` asc) as q2 ON sbo.blockID = q2.blockID");
	$output = '<table>';
 	$output .= '<tr><td>ID:</td><td>'.translate('var8').':</td><td>'.translate('var9').':</td></tr>';
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$output .= '<tr><td><img src="images/icons/'.str_replace(":", "-", $row[0]).'.png" width="16px" height="16px" />&nbsp;&nbsp;<a class="ajax-link" href="index.php?mode=material-stats&material='.$row[0].'">'.translate($row[0]).':</a></td>';	
		$output .= '<td>'.$row[2].'</td>';
		$output .= '<td>'.$row[1].'</td></tr>';
	}
	$output .= '</table>';
	return $output;
}

/**
 * This function will output the table for the player page.
 *
 * @since 4.0
 *
 */
function set_player_details_table($player) {
	$foot = get_movement($player, "0");
	$boat = get_movement($player, "1");
	$cart = get_movement($player, "2");
	$pig = get_movement($player, "3");
	$horse = get_movement($player, "5");
	$output = '<div class="small-6 columns"><h6>Movement:</h6><table style="margin:auto;">
					<thead><tr><th>Total:</th><th>'. number_format(($foot+$boat+$pig+$cart+$horse), 2, '.', '').'</th></tr></thead>
					<tbody>
						<tr>
							<td>'.translate("var85").':</td>
							<td>'. number_format($foot, 2, '.', '').'</td>
						</tr>
						<tr>
							<td>'.translate("var86").':</td>
							<td>'.number_format($boat, 2, '.', '').'</td>
						</tr>
						<tr>
							<td>'.translate("var87").':</td>
							<td>'.number_format($cart, 2, '.', '').'</td>
						</tr>
						<tr>
							<td>'.translate("var88").':</td>
							<td>'.number_format($pig, 2, '.', '').'</td>
						</tr>
						<tr>
							<td>'.translate("var111").':</td>
							<td>'.number_format($horse, 2, '.', '').'</td>
						</tr>
					</tbody>
				</table>
			</div>';
	$output .= '<div class="small-6 columns"><h6>Stats:</h6><table style="margin:auto;"><tbody>';
	$output .= '<tr>
					<td>'.translate("var5").':</td>
					<td>'.get_date(round(get_amount($player, "value", "last_join")/3000)).'</td>
				</tr>
				<tr>
					<td>'.translate("var14").':</td>
					<td>'.get_date(round(get_amount($player, "value", "last_seen")/3000)).'</td>
				</tr>
				<tr>
					<td>'.translate("var4").':</td>
					<td>'.get_played(get_amount($player, "value", "playtime")).'</td>
				</tr>
				<tr>
					<td>'.translate("var82").':</td>
					<td>'.get_amount($player, "value", "joins").'</td>
				</tr><tr>
					<td>'.translate("var15").':</td>
					<td>'.get_status(get_amount($player['uuid'], "value", "last_seen"), get_amount($player['uuid'], "value", "last_join")).'</td>
				</tr><tr>
					<td>'.translate("var16").':</td>
					<td>'.get_amount_sum($player, "value", "kill").'</td>
				</tr>
				<tr>
					<td>'.translate("var81").':</td>
					<td>'.get_amount($player, "value", "commandsdone").'</td>
				</tr>
				<tr>
					<td>'.translate("var19").':</td>
					<td>'.get_amount_sum($player, "value", "blocks_broken").' '.translate("var18").'</td>
				</tr>
				<tr>
					<td>'.translate("var20").':</td>
					<td>'.get_amount_sum($player, "value", "blocks_placed").' '.translate("var18").'</td>
				</tr>';
	$output .= '</tbody></table></div>';
	return $output;
}

/**
 * This function will output the table for the player page.
 *
 * @since 4.0
 *
 */
function set_player_kill_table($player) {
	global $link;
	$query = mysqli_query($link, "SELECT `entityType`, `value` FROM `".WS_CONFIG_STATS."kill` WHERE `uuid`='".$player."'");
	$output = '<table>';
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$output .= '<tr>';
		$output .= '<td><a class="ajax-link" href="index.php?mode=creature-stats&creature='.decrypt($row[0]).'"  >'.translate($row[0]).':</a></td>';	
		$output .= '<td>'.$row[1].'</td>';
		$output .= '</tr>';
	}
	$output .= '</table>';
	return $output;
}

/**
 * This function will output the table for the player page.
 *
 * @since 4.0
 *
 */
function set_player_death_table($player) {
	global $link;
	$query = mysqli_query($link, "SELECT `cause`, `value` FROM `".WS_CONFIG_STATS."death` WHERE `uuid`='".$player."'");
	$output = '<table>';
	while($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
		$output .= '<tr>';
		$output .= '<td><a class="ajax-link" href="index.php?mode=creature-stats&creature='.decrypt($row[0]).'"  >'.translate($row[0]).':</a></td>';	
		$output .= '<td>'.$row[1].'</td>';
		$output .= '</tr>';
	}
	$output .= '</table>';
	return $output;
}
?>