<?php
// NOTE: NEVER WANT SESSION FILE EXPOSED
// NOTE: SESSIONS IS BROWSER DEPENDENT THEREFORE IF USING POSTMAN THINGS MAY NOT WORK
// use at the top

// SESSION START ASSIGNS YOU AN ID, NEXT TIME SEES SESSION START IT WILL USE THAT SESSION ID
session_start();

//sessions is a type of superglobal $_ 

echo '<pre>';
print_r($_SESSION);
echo '</pre>';