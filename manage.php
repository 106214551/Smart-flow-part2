<?php
/* manage.php | OWNER: Mohammed
   HR manager page (brief: protected by login).
   TODO:
     - Redirect to login.php if not logged in (session check from Sara)
     - List all EOIs
     - List by job reference
     - Search by first name, last name or both
     - Delete all EOIs for a job reference (Khadija writes this function)
     - Change an EOI status: New, Current or Final (Khadija writes this function)
     - Choose a sort field: check it against a fixed list, never put it straight into SQL
   Build the page with header.inc and footer.inc (see the top of header.inc).
   Use prepared statements for every query. */