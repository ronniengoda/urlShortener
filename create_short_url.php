<?php 
 // Include database configuration file
require_once 'dbConfig.php';

// Include URL Shortener library file
require_once 'shortenurl.php';

// Initialize Shortener class and pass PDO object
$shortener = new Shortener($db);

// Long URL
$longURL = $_GET['url'];

// Prefix of the short URL 
$shortURL_Prefix = 'https://payherokenya.com/'; // with URL rewrite
//$shortURL_Prefix = 'https://xyz.com/?c='; // without URL rewrite

try{
    // Get short code of the URL
    $shortCode = $shortener->urlToShortCode($longURL);
    
    // Create short URL
    $shortURL = $shortURL_Prefix.$shortCode;
    
    // Display short URL
    echo $shortURL;
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}