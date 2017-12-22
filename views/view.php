<?php
//Controller (index.php) calls renderView() -> doesn't need to be included
function renderView(){
	include 'header.html';
	//viewController() returns the file that needs to be included in the page 
	include viewController();
	include 'footer.html';
}
