<?php
/* header.inc | Shared top of EVERY page: <head>, skip link, logo and menu.
   Set these variables on your page BEFORE including this file:
     $page_title  = "Home";            // tab title: "Home | Smart-flow"
     $page_desc   = "Short summary";   // meta description
     $current     = "index";           // highlighted menu item: index, jobs, apply or about
                                       // (leave "" for pages that are not in the menu)
     $page_css    = "index";           // optional: loads styles/index.css after style.css
     $extra_head  = "";                // optional: your page's embedded <style> block
   Your page must then open its content with <main ... id="main-content">. */
$page_title = isset($page_title) ? $page_title : "Smart-flow";
$page_desc  = isset($page_desc) ? $page_desc : "Smart-flow builds smarter city infrastructure.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
    <meta name="author" content="Group G02">
    <title><?php echo htmlspecialchars($page_title); ?> | Smart-flow</title>
    <link rel="stylesheet" href="styles/style.css">
<?php if (!empty($page_css)) { ?>
    <link rel="stylesheet" href="styles/<?php echo $page_css; ?>.css">
<?php } ?>
<?php if (!empty($extra_head)) { echo $extra_head; } ?>
</head>
<body>
    <!-- Skip link lets keyboard and screen-reader users jump past the menu -->
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <header class="site-header">
        <div class="container header-content">
            <a class="brand" href="index.php" aria-label="Smart-flow home">
                <img src="images/smartflow.jpeg" alt="Smart-flow logo" width="54" height="54">
                <span class="brand-copy"><strong>Smart<span>-flow</span></strong><small>Smarter Cities. Better Living.</small></span>
            </a>
<?php include __DIR__ . "/nav.inc"; ?>
        </div>
    </header>
