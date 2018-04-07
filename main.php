<?php
if (version_compare(phpversion(), "5.3.0", ">=") == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);
require_once('login.inc.php');
require_once('chat.inc.php');
$oSimpleLoginSystem = new SimpleLoginSystem();
$oSimpleChat = new SimpleChat();
echo $oSimpleLoginSystem->getLoginBox();
$sChatResult = 'Need login before using';
if ($_COOKIE['member_name'] && $_COOKIE['member_pass']) {
    if ($oSimpleLoginSystem->check_login($_COOKIE['member_name'], $_COOKIE['member_pass'])) {
        $sChatResult = $oSimpleChat->acceptMessages();
    }
}
echo $sChatResult;
?>
