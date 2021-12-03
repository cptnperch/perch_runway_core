<?php

    $Form = new PerchForm('setup');
    $Form->translate_errors = false;
    
    $req = array();
    $req['licenseKey']     = "Required";
    $req['userGivenName']  = "Required";
    $req['userFamilyName'] = "Required";
    $req['userEmail']      = "Required";
    $req['userUsername']   = "Required";
    $req['userPassword']   = "Required";
    $req['loginpath']      = "Required";
    $req['sitepath']       = "Required";
    $req['db_server']      = "Required";
    $req['db_database']    = "Required";
    $req['db_username']    = "Required";
    #$req['db_password']    = "Required";
    $req['db_prefix']      = "Required";

    $Form->set_required($req);
    
    $validation = array();
    $validation['licenseKey'] = array("licensekey", "Check the format of your license key.");
    $validation['userPassword']	= array("password", "Your passwords must match");

    $Form->set_validation($validation);
    
    if ($Form->posted() && $Form->validate()) {
        
        $postvars = array('userGivenName', 'userFamilyName', 'userEmail', 'userUsername', 'userPassword');
        $user = $Form->receive($postvars);
        PerchSession::set('user', $user);
        
        $postvars = array('loginpath', 'sitepath', 'db_server', 'db_database', 'db_username', 'db_password', 'db_port', 'db_prefix', 'licenseKey', 'tz');
        $conf = $Form->receive($postvars);

        if (!isset($conf['db_password'])) $conf['db_password'] = '';
        
        $conf['loginpath'] = rtrim($conf['loginpath'], '/');
        $conf['sitepath']  = rtrim($conf['sitepath'], '/');

        $conf['secret']  = PerchUser::generate_password(16);

        $callback = function ($matches) use ($user, $conf) {    
                            if (isset($user[$matches[1]])){
                                return addslashes($user[$matches[1]]);
                            }if (isset($conf[$matches[1]])){
                                return $conf[$matches[1]];
                            }else{
                                return '$'.$matches[1];
                            }
                        };

        $config_file = file_get_contents('config.sample.php');
        $config_file = preg_replace_callback('/\$(\w+)/', $callback, $config_file);
        $config_file_path = PerchUtil::file_path(realpath('../../config') . '/config.php');

        $local_config_file = file_get_contents('config.local.sample.php');
        $local_config_file = preg_replace_callback('/\$(\w+)/', $callback, $local_config_file);
        $local_config_file_path = PerchUtil::file_path(realpath('../../config') . '/config.local.php');
        if ($conf['db_port']) {
            $local_config_file .= "define('PERCH_DB_PORT', '".(int)$conf['db_port']."');\n";
        }

        $runway_file = file_get_contents('runway.sample.php');
        $runway_file_path = PerchUtil::file_path(realpath('../../config') . '/runway.php');

        if (is_writable($config_file_path)) {
            file_put_contents($config_file_path, $config_file);
            PerchUtil::invalidate_opcache($config_file_path, 10000);

            $test_contents = file_get_contents($config_file_path);

            if ($test_contents == $config_file) {

                file_put_contents($local_config_file_path, $local_config_file);
                PerchUtil::invalidate_opcache($local_config_file_path, 10000);

                file_put_contents($runway_file_path, $runway_file);
                PerchUtil::invalidate_opcache($runway_file_path, 10000);

                PerchUtil::redirect('index.php?install=1&auto=1');    
            }
        }


        $mode = 'configfile';

    }
    
    
