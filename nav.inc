<?php
/* nav.inc | The main menu, included by header.inc.
   The link whose name matches $current gets class="active" so it is highlighted. */
$menu = array(
    "index" => "Home",
    "jobs"  => "Jobs",
    "apply" => "Apply",
    "about" => "About"
);
?>
            <nav aria-label="Main navigation">
                <ul class="nav-links">
<?php foreach ($menu as $file => $label) { ?>
                    <li><a href="<?php echo $file; ?>.php"<?php if (isset($current) && $current === $file) { echo ' class="active" aria-current="page"'; } ?>><?php echo $label; ?></a></li>
<?php } ?>
                </ul>
            </nav>
