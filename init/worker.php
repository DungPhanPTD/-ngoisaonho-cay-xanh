<?php
if (!isset($DOMAIN))        $DOMAIN = getenv ("DOMAIN");
if (!isset($HOME_FOLDER))   $HOME_FOLDER =  getenv ("HOME_FOLDER");
if (!isset($DB_NAME))       $DB_NAME =  getenv ("DB_NAME");
if (!isset($DB_NAME_LOCAL)) $DB_NAME_LOCAL =  getenv ("DB_NAME_LOCAL");
if (!isset($LOCAL_URL))     $LOCAL_URL =  getenv ("LOCAL_URL");
if (!isset($GIT_REPO))      $GIT_REPO =  getenv ("GIT_REPO");

echo $DOMAIN;
echo $HOME_FOLDER;
echo $DB_NAME;
echo $DB_NAME_LOCAL;
echo $LOCAL_URL;
echo $GIT_REPO;

$files1 = glob(dirname(__FILE__, 2).'/deployment/*');
$files2 = glob(dirname(__FILE__, 2).'/deployment/multienvs/*');

$files = array_merge($files1, $files2);

foreach($files as $path_to_file) {
		if(!is_file($path_to_file)) continue;
    $file_contents = file_get_contents($path_to_file);
    $file_contents = str_replace("VAR_DOMAIN", $DOMAIN ,$file_contents);
    $file_contents = str_replace("VAR_HOME_FOLDER", $HOME_FOLDER ,$file_contents);
    $file_contents = str_replace("VAR_DB_NAME_STAGING", $DB_NAME ,$file_contents);
    $file_contents = str_replace("VAR_DB_NAME_LOCAL", $DB_NAME_LOCAL ,$file_contents);
    $file_contents = str_replace("VAR_GIT_REPO", $GIT_REPO ,$file_contents);
    $file_contents = str_replace("VAR_LOCAL_URL", $LOCAL_URL ,$file_contents);
    file_put_contents($path_to_file,$file_contents);
}
?>
