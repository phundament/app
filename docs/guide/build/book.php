<?php

/**
 * Run command from wiki root: php -f build/book.php
 * 
 * current glitches: 
 *  1. create a folder named /wiki and soft-link images into it (for github wiki homepage)
 *  2. check image includes
 */ 

// set root path
$basePath = realpath(dirname(__FILE__).'/..');
// get Home.md (contents)
$home = file_get_contents($basePath.'/Home.md');

// find all internal links [[...]]]
preg_match_all("/\[\[([A-Za-z0-9\-]*)\]\]/s", $home, $matches);

// init input docs
$inputDocuments = $basePath."/Home.md ";
$inputDocumentsBlacklist = array('Internals.md');

// check found links
foreach($matches[1] AS $num => $match) {

    $document = $basePath."/".$match.".md";
    if (in_array($match.".md",$inputDocumentsBlacklist)) {
        continue;
    }
    if (is_file($document)) {
        $inputDocuments .= $document." ";
    }
    else {
        echo "$document.md is missing!\n";
    }
    
    // see glitch No.2 - Internals includes an image from web URL
    #if ($num > 28) break;
}

// generate command
echo $command = "/opt/local/bin/pandoc ".$inputDocuments." -o build/book.pdf";

// write output
exec($command);

// generate command
echo $command = "/opt/local/bin/pandoc ".$inputDocuments." -o build/book.html";

// write output
exec($command);