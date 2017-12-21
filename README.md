---ABOUT---
PythonQuest aims to make learning the basics of programming with Python easy and fun.
PythonQuest started as a final project for WWW-sovellukset -course at LUT.
Technical features were priority before the deadline which means the game isn't playable just yet.

---Installation---
Project is developed with Apache, MySQL and Memcached
1. Get the source (i.e. git clone https://github.com/toivomattila/PythonQuest.git )
2. Set up Apache to point to PythonQuest
3. Set up database:
	-Edit models/utils.php if database is no running on 127.0.0.1
	-Either edit models/utils.php or create a user with username and password from models/utils.php
	-Import PythonQuest.sql
4. Set up memcached:
	-Edit models/utils.php if memcached is not running on 127.0.0.1

---Points---
Total 42
Implemented features
5 Database used to store data
5 Authentication
5 MVC-design pattern
5 Responsive layout
3 Canvas-element
3 JSON for moving/storing data
3 Ajaj/Ajax
3 jQuery
3 Front-controller
3 Memcached
2 Browser compatibility check for canvas
2 Animation with jQuery
