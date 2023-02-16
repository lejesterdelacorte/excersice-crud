<?php
    require_once('./services/caller.php');

    function getIp() {
        $result = CallAPI('GET', 'http://api.ipify.org/?format=json');

        return $result->ip;
    }
?>