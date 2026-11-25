<?php
/* login.php | OWNER: Sara
   Manager login page (brief: protects manage.php).
   TODO:
     - Login form (username + password, POST)
     - Check against the users table with password_verify (passwords stored hashed)
     - Start a session on success, then redirect to manage.php
     - Show a clear error on failure
     - users table must include admin / admin for the marker
   Build the page like the others: set $page_title etc., then include header.inc and footer.inc
   (see the comment at the top of header.inc). Use prepared statements for every query. */