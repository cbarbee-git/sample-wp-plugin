<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Chad Sample Plugin - Documentation</title>
</head>
    <body> 
    <?php

        // This file is used for the purpose of displaying the
        // README.txt of this plugin on the WP Plugins page.

        // It is meant to display the file without a user
        // needing direct file access.

        $readme = '';
        //get the plugin's readme.md file contents
        $readme = file_get_contents('README.md');
        //include this for this function calls here.
        require_once('../../../wp-load.php');
        $readme = make_clickable(nl2br(wp_specialchars($readme)));

        $readme = preg_replace('/`(.*?)`/', '<code>\\1</code>', $readme);

        $readme = preg_replace('/[\040]\*\*(.*?)\*\*/', ' <strong>\\1</strong>', $readme);
        $readme = preg_replace('/[\040]\*(.*?)\*/', ' <em>\\1</em>', $readme);

        $readme = preg_replace('/=== (.*?) ===/', '<h2>\\1</h2>', $readme);
        $readme = preg_replace('/== (.*?) ==/', '<h3>\\1</h3>', $readme);
        $readme = preg_replace('/= (.*?) =/', '<h4>\\1</h4>', $readme);

        echo($readme);

?>
    </body>
</html>