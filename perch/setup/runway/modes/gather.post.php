<p>Welcome to Perch Runway. In order to get set up, there's a few short questions to answer below. If you don't know any of the answers (or the defaults look wrong) your server administrator should have the information available for you.</p>

<form method="post" action="index.php" novalidate>
    <fieldset>
        <legend>Your license key</legend>
        <div>
            <?php
                $defaults = array();          
            ?>
            <?php echo $Form->label('licenseKey', 'License Key', '', false, false); ?>
            <?php echo $Form->text('licenseKey', $Form->get($defaults, 'licenseKey'), 'wide'); ?>
        </div>
    </fieldset>
    
    <fieldset>
        <legend>Create an administrator account for you to log in with</legend>
        <div>
            <?php echo $Form->label('userGivenName', 'First name', '', false, false); ?>
            <?php echo $Form->text('userGivenName', $Form->get(false, 'userGivenName')); ?>
        </div>
        <div>
            <?php echo $Form->label('userFamilyName', 'Last name', '', false, false); ?>
            <?php echo $Form->text('userFamilyName', $Form->get(false, 'userFamilyName')); ?>
        </div>
        <div>
            <?php echo $Form->label('userEmail', 'Email address', '', false, false); ?>
            <?php echo $Form->text('userEmail', $Form->get(false, 'userEmail')); ?>
        </div>
        <div>
            <?php echo $Form->label('userUsername', 'Username', '', false, false); ?>
            <?php echo $Form->text('userUsername', $Form->get(false, 'userUsername')); ?>
            <?php echo $Form->hint('Choose a username to log into the control panel with'); ?>
        </div>
        <div>
            <?php echo $Form->label('userPassword', 'Choose a password', '', false, false); ?>
            <?php echo $Form->password('userPassword', $Form->get(false, 'userPassword')); ?>
        </div>            
        <div>
            <?php echo $Form->label('userPassword2', 'Type it again', '', false, false); ?>
            <?php echo $Form->password('userPassword2'); ?>
        </div>
    </fieldset>
    
    <fieldset>
        <legend>Install location</legend>
        
        <div>
            <?php echo $Form->label('loginpath', 'Perch folder', '', false, false); ?>
            <?php 
                $url = str_replace('/setup/runway/index.php', '', $_SERVER['PHP_SELF']);
                echo $Form->text('loginpath', $Form->get(false, 'loginpath', $url)); ?>
            <?php echo $Form->hint('The web path, including the Perch folder, from the top of the site'); ?>
        </div>

        <div>
            <?php echo $Form->label('sitepath', 'Site path', '', false, false); ?>
            <?php 
                $url = str_replace($url.'/setup/runway/modes', '', realpath(__DIR__));
                echo $Form->text('sitepath', $Form->get(false, 'sitepath', $url)); ?>
            <?php echo $Form->hint('The complete file system path to the root of your site'); ?>
        </div>

        <div>
            <?php echo $Form->label('tz', 'Time zone', '', false, false); ?>
            <?php 
                $list = DateTimeZone::listIdentifiers();

                $options = array();
                foreach ($list as $tz) {
                    $options[] = array('value'=>$tz, 'label'=>$tz);
                }

                echo $Form->select('tz', $options, $Form->get($defaults, 'tz', date_default_timezone_get())); 
            ?>
        </div>
    </fieldset>

    <fieldset>
        <legend>Database settings</legend>
        <?php
            $defaults = array();
        ?>
        <div>
            <?php echo $Form->label('db_server', 'Server address', '', false, false); ?>
            <?php echo $Form->text('db_server', $Form->get($defaults, 'db_server', 'localhost')); ?>
            <?php echo $Form->hint('This is often \'localhost\', but could also be an IP address or similar'); ?>
        </div>
        <div>
            <?php echo $Form->label('db_database', 'Name of database', '', false, false); ?>
            <?php echo $Form->text('db_database', $Form->get($defaults, 'db_database')); ?>
        </div>
        <div>
            <?php echo $Form->label('db_username', 'Database username', '', false, false); ?>
            <?php echo $Form->text('db_username', $Form->get($defaults, 'db_username')); ?>
        </div>
        <div>
            <?php echo $Form->label('db_password', 'Database password', '', false, false); ?>
            <?php echo $Form->password('db_password', $Form->get($defaults, 'db_password')); ?>
        </div>
        <div>
            <?php echo $Form->label('db_prefix', 'Table name prefix', '', false, false); ?>
            <?php echo $Form->text('db_prefix', $Form->get($defaults, 'db_prefix', 'perch2_'), 'medium'); ?>
        </div>
        <div>
            <?php echo $Form->label('db_port', 'Port number', '', false, false); ?>
            <?php echo $Form->text('db_port', $Form->get($defaults, 'db_port', ''), 'medium'); ?>
            <?php echo $Form->hint('Leave blank for default port'); ?>
        </div>

    </fieldset>
    
    <p class="submit">
        <?php echo $Form->submit('btnSubmit', 'Next step &raquo;', 'button', false); ?>
    </p>
    
    
</form>