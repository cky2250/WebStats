<?php
	define('WS_CONFIG_NoMySQL', false);
	if($iconomy_control === true){include('modules/iconomy/api/api.php');}
	if($permissionsex_control === true){include('modules/permissionsex/api/api.php');}
	if($jail_control === true){include('modules/jail/api/api.php');}
	if($job_control === true){include('modules/jobs/api/api.php');}
	if($mcmmo_control === true){include('modules/mcmmo/api/api.php');}
	if($mineconomy_control === true){include('modules/mineconomy/api/api.php');}
	if($stats_control === true && (pluginconfigstatusstats === true || pluginconfigstatusbeardstats === true)){include('modules/stats/api/api.php');}
	if($statslolmewn_control === true && pluginconfigstatusstatslolmewnstats === true){include('modules/stats-lolmewn/api/api.php');}
?>