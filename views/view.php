<?php
//Should renderView take a parameter or ask viewController() what to render?
function renderView(){
	include 'header.html';
	include viewController();
	include 'footer.html';
}
