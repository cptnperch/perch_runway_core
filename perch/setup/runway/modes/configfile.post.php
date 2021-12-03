    <h1>Your Config File</h1>
    
    <form method="post" action="index.php?install=1">
        <p>Copy the following to your clipboard, and paste it into a new file. Save the file as:</p>
        <p><code><?php echo realpath('../../config') . DIRECTORY_SEPARATOR .'config.php'; ?></code></p>
        <div>
            <textarea rows="20" cols="80"><?php echo $config_file; ?></textarea>
        </div>
        
        <p>Then, copy the following to another new file. Save the file as:</p>
        <p><code><?php echo realpath('../../config') . DIRECTORY_SEPARATOR .'config.local.php'; ?></code></p>
        <div>
            <textarea rows="20" cols="80"><?php echo $local_config_file; ?></textarea>
        </div>

        <p><strong>Note:</strong> if you use a visual editor such as Dreamweaver, make sure you paste into <em>source code view</em>.</p>
        
        <p class="submit">
            <input type="submit" class="button" name="btnSubmit" value="I've done that!" />
        </p>
    </form>