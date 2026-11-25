<?php
/* eoi_actions.php | OWNER: Khadija
   Two functions that manage.php (Mohammed) calls. Both use prepared statements.
   TODO:
     - delete_eoi_by_job($conn, $job_ref)
         Delete every EOI row with that job reference. Return how many rows were deleted.
     - update_eoi_status($conn, $eoi_number, $status)
         Only accept New, Current or Final (check against that fixed list), then update the row.
         Return true or false.
   Agree the function names and arguments with Mohammed first, so his page can call them.
   You need Rabee's eoi table to test. */