<?php
$localIp = "172.20.128.1";
$wgMemCachedServers = [$localIp.':11211'];
$wgCirrusSearchServers = [["host" => $localIp, 'port' => 9200]];
