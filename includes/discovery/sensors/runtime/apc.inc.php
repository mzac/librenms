<?php

// APC
if ($device['os'] == 'apc') {
//    $oids = snmp_get($device, '1.3.6.1.4.1.318.1.1.1.2.2.3.0', '-OsqnUt', '');
    $oids = snmp_get($device, 'PowerNet-MIB::upsAdvBatteryRunTimeRemaining.0', '-OsqnUt', '');
    d_echo($oids."\n");
    if ($oids) {
        echo ' APC Runtime ';
        list($oid,$current) = explode(' ', $oids);
        $divisor            = 6000;
        $type               = 'apc';
#        $oid                = 'upsAdvBatteryRunTimeRemaining.0';
        $index              = 'upsAdvBatteryRunTimeRemaining.0';
        $descr              = 'Runtime';
        $low_limit           = 5;
        $low_limit_warn       = $low_limit + 5;
        discover_sensor($valid['sensor'], 'runtime', $device, $oid, $index, $type, $descr, $divisor, '1', $low_limit, $low_limit_warn, null, null, $current);
    }
}//end if
