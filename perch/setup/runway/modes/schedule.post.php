<h1>Setting up scheduled tasks</h1>

<form method="post" action="index.php?complete=1">
    <p>Perch Runway includes a task scheduler for performing regular jobs like running backups and deleting spam comments.</p>
    <p>In order to do this, you need to configure the following script to run at least once per hour.</p>
    
    <div>
        <textarea rows="2" cols="80">php <?php echo PERCH_PATH; ?>/core/scheduled/run.php <?php echo PERCH_SCHEDULE_SECRET; ?></textarea>
    </div>

    <h2>With cron (most common)</h2>

    <p>An example line in your cron tab might look like this:</p>

    <div>
        <textarea rows="2" cols="80">0 * * * * php <?php echo PERCH_PATH; ?>/core/scheduled/run.php <?php echo PERCH_SCHEDULE_SECRET; ?></textarea>
    </div>

    <h2>Other options</h2>

    <p>Check your hosting control panel for a scheduled task option, or failing that contact your server administrator or hosting company.</p>
    
    <p>Scheduled tasks are most crucial once the site is live, so feel free to make a note and <b>skip this step</b> if you're just getting started in a dev environment.</p>
    
    <p class="submit">
        <input type="submit" class="button" name="btnSubmit" value="Next step &raquo;" />
    </p>
</form>