<?php
/* process_eoi.php | OWNER: Rabee
   Receives the apply form (POST).
   TODO:
     - Block direct access: if the required POST fields are missing, redirect to apply.php
     - Trim, strip slashes and escape HTML on every field
     - Server-side validation for every field (no client-side validation: add novalidate to the form)
     - Create the eoi table in code if it does not exist (status: New, Current, Final, default New)
     - Insert with a prepared statement
     - Show a confirmation with the auto-generated EOInumber
   Build the page with header.inc and footer.inc (see the top of header.inc). */