<?php
$files1 = glob(dirname(__FILE__, 2).'/deployment/*');
$files2 = glob(dirname(__FILE__, 2).'/deployment/multienvs/*');

$files = array_merge($files1, $files2);

echo "Overiding wp-config file";
$wpConfigSample = dirname(__FILE__, 2).'/deployment/wp-config.php.sample';
$targetWpConfig = dirname(__FILE__, 2).'/wp-config.php';
$wpconfigContent = file_get_contents($wpConfigSample);
file_put_contents($targetWpConfig, $wpconfigContent);

$envFile = dirname(__FILE__, 2).'/deployment/site.env';
$configArr = array();

if ($file = fopen($envFile, "r")) {
    while(!feof($file)) {
        $line = fgets($file);
        $keyVal = explode('=', str_replace('export ', '', $line));
		if (isset($keyVal[1])) $configArr[$keyVal[0]] = $keyVal[1];
		echo $line;
    }
    fclose($file);
}

echo "Variable";
print_r($configArr);
$DOMAIN =  $configArr["DOMAIN"];
$HOME_FOLDER =  $configArr["HOME_FOLDER"];
$DB_NAME =  $configArr["DB_NAME"];
$DB_NAME_LOCAL =  $configArr["DB_NAME_LOCAL"];
$LOCAL_URL =  $configArr["LOCAL_URL"];
$GIT_REPO =  $configArr["GIT_REPO"];
require('worker.php')
?>
