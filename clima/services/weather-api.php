<?php
    require_once('./services/caller.php');
    function getTemp($apikey, $apiuri, $ip) {
        $result = CallAPI('GET', API_URL.API_KEY.'&q='.getIp().'&aqi=no');
        return $result->current->temp_c;
    }
?>