<?php
    require_once('./services/caller.php');
    function getTemp($apikey, $apiuri, $ip) {
        $result = CallAPI('GET', $apiuri.$apikey.'&q='.getIp().'&aqi=no&iconSet=icons1');
        return $result->current->temp_c;
    }
?>