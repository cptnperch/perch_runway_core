<h1>Next steps</h1>

<p>There's just three things left for you to do:</p>
<form>
<ol class="importables">
    <li>Make the folder <code><?php echo PERCH_LOGINPATH; ?>/resources</code> writable for file uploads</li>
    <li>Delete the <code><?php echo PERCH_LOGINPATH; ?>/setup</code> folder from your server</li>
    <li>Log into your <a href="http://grabaperch.com/account">grabaperch.com account</a> and set <code><?php echo $_SERVER['SERVER_NAME']; ?></code> as one of the domains for this license.</li>
</ol>
</form>


<p class="submit"><a href="<?php echo PERCH_LOGINPATH; ?>" class="button">You should now be able to log in &raquo;</a></p>

<?php
    echo '<img src="'.PerchUtil::html($Settings->get('siteURL')->val()).'" width="1" height="1" />';
?>