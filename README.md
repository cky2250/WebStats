<a href="http://cky2250.github.com/WebStats/">WebStats</a> ~ <a href="http://forums.bukkit.org/threads/60843/">Bukkit Forum</a>
<hr />

MySQL - PHP web data page for public viewing of Minecraft plugin data

<hr />

This was based on <a href="http://forums.bukkit.org/threads/17793/">[WEB] Webstatistic for Minecraft v1.10b [1337]</a> - the code used in this is far more superior. It is being made into a Wordpress or phpwiki or any good website project that has an installer, login, admin page, and many goodies. 

modular system

Beside this plugin, WS supports other plugins which collects data in MySQL databases. The following plugins are already supported:

<ul>
	<li><a href="http://dev.bukkit.org/server-mods/achievements/">Achievements</a> *WORKS (with stats)</li>
	<li><a href="http://dev.bukkit.org/server-mods/tno-achievements/">Achievements 2.0</a> *PLUGIN DOES NOT WORK IN LATTEST CRAFTBUKKIT BUILD (not WS fault)</li>
	<li>BeardAch * NOT KNOWN YET. Sorry</li>
	<li><a href="http://dev.bukkit.org/server-mods/iconomy/">iConomy</a> ~ <a href="https://github.com/iConomy/Core">GitHub</a> *WORKS</li>
	<li><a href="http://dev.bukkit.org/server-mods/iconomy-continued/">iConomy [Continued]</a> <a href="https://github.com/rtainc/iCo">GitHub</a> *WORKS</li>
	<li><a href="http://dev.bukkit.org/server-mods/jail/">Jail</a> ~ <a href="https://github.com/matejdro/Jail">GitHub</a> * WORKS</li>
	<li><a href="http://dev.bukkit.org/server-mods/jobs/">Jobs</a> ~ <a href="https://github.com/phrstbrn/Jobs">GitHub</a> *WORKS</li>
	<li><a href="http://dev.bukkit.org/server-mods/mcmmo/">McMMO</a> ~ <a href="https://github.com/mcMMO-Dev/mcMMO">GitHub</a> *WORKS</li>
	<li><a href="http://dev.bukkit.org/server-mods/stats/">Stats</a> *WORKS (In Build 1.1-R6)</li>
	<li><a href="http://dev.bukkit.org/server-mods/tno-stats/">Stats 2.0</a> *WORKS (Up to Build 1.1-R4)</li>
	<li><a href="http://dev.bukkit.org/server-mods/lolmewnstats/">Stats by lolmewnstats</a> ~ <a href="https://bitbucket.org/Lolmewn/stats/src">source</a> - TBA</li>
</ul>
<hr />

<h3>To-Do:</h3>
<ul>
	<strike><li>Option for Photo "banner reload" with server online stats.</li></strike>
	<strike><li>Add style to the pages.</li></strike>
	<li>Remove The Achievements Tab and Move It To The Players Page With It Grayed Out and Not Showing The Requirements Until The Player Unlocks The Achievement</li>
	<li>Add Rest Of ID's and Add The Extra ID's To Main ID's Page example ( 15:1 15:2 goes onto 15 page)</li>
	<li>Add <a href="http://dev.bukkit.org/server-mods/inventorysql/">InventorySQL</a> ~ <a href="https://github.com/ThisIsAreku/InventorySQL">GitHub</a></li>
	<li>Add <a href="http://dev.bukkit.org/server-mods/saaplugin/">Stats & Achievements</a> ~ <a href="http://git.s7t.de/maniacraft-plugins/statsandachievements">source</a></li>
	<li><a href="http://dev.bukkit.org/server-mods/beardach/">BeardAch</a> ~ <a href="https://github.com/tehbeard/BeardAch">GitHub</a></li>
	<li><a href="http://dev.bukkit.org/server-mods/beardstat/">BeardStat</a> ~ <a href="https://github.com/tehbeard/BeardStat">GitHub</a></li>
	<li>Add <a href="http://dev.bukkit.org/server-mods/hawkeye/">HawkEye</a> ~ <a href="https://github.com/oliverw92/HawkEye">GitHub</a></li>
	<li>Add <a href="http://dev.bukkit.org/server-mods/statisticianv2/">Statistician v2.0</a> ~ <a href="https://github.com/Crimsonfoxy/Statistician-v2">GitHub</a></li>
	<li>Add <a href="http://dev.bukkit.org/server-mods/jailplusplus/">Jail ++</a> ~ <a href="https://github.com/UltimateDev/jailplusplus/">GitHub</a></li>
	<li>Add Smart Phone Support * iPhone, Droid.</li>
	<li>Added On/Off for Player Page Plugins, this is dynamic with your selection from the installer.</li>
</ul>
			
<h3>Current Pending Update:</h3>
<h4>v3.0 final(04/20/2013) - Changelog bellow is current GitHub Source changes</h4>
<ul>
	<li>Added Admin Page.</li>
	<li>Added Capability of a dynamic achievments, economy, and stats  plugin change.</li>
	<li>Added IP Tracker.</li>
	<li>Added mcstats.org tracker.</li>
	<li>Added Sample Config.</li>
	<li>Added Smart Phone Support * iPhone(Added Foundation v3.2.2)</li>
	<li>Added Smelting function and added all current. ~ (12/16/2012)</li>
	<li>Added Support for <a href="http://dev.bukkit.org/server-mods/lolmewnstats/">Stats v1.071 by lolmewnstats</a> ~ <a href="https://bitbucket.org/Lolmewn/stats/src">source</a></li>
	<li>Added Support for <a href="http://dev.bukkit.org/server-mods/mineconomy/">MineConomy</a> ~ <a href="https://github.com/MjolnirCommando/MineConomy">GitHub</a></li>
	<li>Fixed errors with dynamic photo. ~ <a href="https://github.com/cky2250/PHP-Minecraft-Query">GitHub</a></li>
	<li>Updated A few items photos larger image.</li>
	<li>Updated Brewing Functions, Added All Brewing Items Up To Minecraft v1.4.5 ~ (12/16/2012)</li>
	<li>Updated ID page functions * still slow (using foundations) due to the amount of css.</li>
	<li>Updated Config Installer with notes on what is what.</li>
	<li>Updated MySQL, much more easy for people to understand *(now once more able to set databases for each plugin verse 1 for all - not recommended).</li>
</ul>
<h4>Known Problems</h4>
<ul>
	<li>When the screen is inbetween an area where the menu turns to drop down but does not drop down. - Fix make the page smaller.</li>
	<li>Login process does not kill.</li>
</ul>
<hr />

What Browser Does This Work With?
Known
*At least... Please Post otherwise. Thank You.
This is using HTML5 in some areas, but the main areas are not so that everyone can view.
<ul>
<li>IE9+</li>
<li>Firefox 1.5+</li>
<li>Opera 8+</li>
<li>Safari 3+</li>
<li>Chrome 0.2+</li>
</ul>

**DOWNLOADING FROM ANY SOURCE, FOR COMMERCIAL USE IS PROHIBITED. IF YOU NEED THIS PROJECT FOR COMMERCIAL USE, YOU WILL NEED TO PURCHASE A LICENSE. BY DOWNLOADING THIS PROJECT YOU AGREE TO THESE TERMS.
**I HAVE A LAWYER, IF THERE IS ANY PROBLEM.