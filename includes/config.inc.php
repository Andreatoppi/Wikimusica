<?php

/**
 *Classe configuazione DB e smarty.
 */

global $config;

$config['smarty']['template_dir'] =
'templates/main/template/';
$config['smarty']['compile_dir'] =
'templates/main/templates_c/';
$config['smarty']['config_dir'] =
'templates/main/configs/';
$config['smarty']['cache_dir'] =
'templates/main/cache/';

$config['debug']=false;
$config['mysql']['user'] = 'root';
$config['mysql']['password'] = '';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'wikimusic';

// $config['url_bookstore']='http://localhost/wikimusic/';

function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>
