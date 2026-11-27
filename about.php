<?php
/*
  about.php - About Us page (Project Part 2: converted from about.html)
  Group: G02 - Smart City Infrastructure Consultancy (Smart-flow)
  Author: Khadija Boussaha (106237257)
  Description: Introduces the team. The member cards (contributions and quotes)
               and the fun facts table are loaded from the `about` MySQL table
               (see about_table.sql). The group details, photo, Acknowledgement
               of Country and references stay as static content.
               The shared head, header/navigation and footer come from the
               includes (header.inc, nav.inc, footer.inc).
*/

require_once 'settings.php';   // $host, $user, $pwd, $sql_db

// ---- Values used by header.inc / nav.inc -----------------------------------
$page_title       = 'About | Smart-flow';
$page_description = 'Learn about Smart-flow, its team and its smart city infrastructure focus.';
$page_keywords    = 'about us, team, Smart-flow, G02, smart city, COS10026';
$page_author      = 'Khadija Boussaha';
$page_styles      = ['css/styles.css', 'css/about.css'];
$current_page     = 'about';

// Embedded CSS example (kept from Part 1): limited page-specific styling.
$page_embedded_css = <<<CSS
    .member-card dd strong {
      color: #087f88;
    }
CSS;

// ---- Load the team from the database ---------------------------------------
function about_escape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$members  = [];
$db_error = false;

// Make mysqli throw exceptions on every PHP version, so one catch handles all errors.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    mysqli_set_charset($conn, 'utf8mb4');   // needed for the Arabic quotes

    $query = "SELECT full_name, student_id, part1_contribution, part2_contribution,
                     quote_text, quote_lang, quote_dialect, quote_translation,
                     quote_source, quote_source_ref,
                     dream_job, favourite_snack, hometown
              FROM about
              ORDER BY display_order, full_name";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $members[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
} catch (mysqli_sql_exception $e) {
    // Don't show database details to visitors.
    $db_error = true;
}

include 'header.inc';
include 'nav.inc';
?>
  <main class="container page-main about-page" id="main-content">
    <!-- Hero banner introducing the company -->
    <section aria-labelledby="about-title" class="page-hero">
      <!-- Inline CSS example -->
      <p class="eyebrow" style="margin-bottom: 0.8rem;">ABOUT SMART-FLOW</p>
      <h1 id="about-title">Smarter systems.<br /><span>Stronger communities.</span></h1>
      <p>Smart-flow is a smart city infrastructure consultancy focused on connected transport, energy monitoring and
        practical urban services.</p>
    </section>

    <!-- Group details: NESTED LIST -->
    <section aria-labelledby="group-heading" class="content-section about-group-section">
      <h2 id="group-heading">Our Group</h2>
      <ul class="group-info">
        <li><strong>Group name:</strong> G02 - Smart Flow</li>
        <li><strong>Class details:</strong>
          <ul>
            <li>Sunday: 9:00 am to 10:30 am</li>
            <li>Tuesday: 9:00 am to 11:00 am</li>
            <li>Tutor: Dr Hamada</li>
          </ul>
        </li>
      </ul>
    </section>

    <!-- Members: DEFINITION LIST, one card per row of the `about` table -->
    <section aria-labelledby="members-heading" class="content-section about-members-section">
      <h2 id="members-heading">Members, Contributions and Quotes</h2>

      <?php if ($db_error): ?>
        <p class="error" role="alert">Team details are unavailable right now. Please try again later.</p>
      <?php elseif (count($members) === 0): ?>
        <p>No team members have been added yet.</p>
      <?php else: ?>
        <dl class="members">
          <?php foreach ($members as $m): ?>
            <div class="member-card">
              <dt><?= about_escape($m['full_name']) ?> <span class="student-id"><?= about_escape($m['student_id']) ?></span></dt>
              <dd><strong>Project 1:</strong> <?= about_escape($m['part1_contribution']) ?></dd>
              <dd><strong>Project 2:</strong> <?= about_escape($m['part2_contribution']) ?></dd>
              <dd>
                <blockquote dir="rtl" lang="<?= about_escape($m['quote_lang']) ?>">
                  <p><?= about_escape($m['quote_text']) ?></p>
                </blockquote>
                <p class="translation">Translation (<?= about_escape($m['quote_dialect']) ?>):
                  <?= about_escape($m['quote_translation']) ?>
                  <?php if (!empty($m['quote_source'])): ?>
                    (<cite><?= about_escape($m['quote_source']) ?></cite><?= !empty($m['quote_source_ref']) ? ', ' . about_escape($m['quote_source_ref']) : '' ?>)
                  <?php endif; ?>
                </p>
              </dd>
            </div>
          <?php endforeach; ?>
        </dl>
      <?php endif; ?>
    </section>

    <!-- Group photo: FIGURE with caption -->
    <section aria-labelledby="photo-heading" class="content-section about-photo-section">
      <h2 id="photo-heading">Our Team Photo</h2>
      <figure class="group-photo">
        <img alt="The five Smart Flow team members sitting around a table, working together on their laptops"
          height="1200" src="images/group-photo.jpg" width="900" />
        <!-- Inline CSS example (required on every page) -->
        <figcaption style="font-style: italic;">The Smart Flow team (G02), October 2026.</figcaption>
      </figure>
    </section>

    <!-- Fun facts: TABLE loaded from the same `about` rows; scope helps screen readers -->
    <section aria-labelledby="facts-heading" class="content-section about-facts-section">
      <h2 id="facts-heading">Fun Facts</h2>
      <?php if ($db_error): ?>
        <p class="error" role="alert">Fun facts are unavailable right now. Please try again later.</p>
      <?php elseif (count($members) > 0): ?>
        <div aria-labelledby="facts-caption" class="table-wrapper" role="region" tabindex="0">
          <table class="fun-facts">
            <caption id="facts-caption">Fun facts about each team member</caption>
            <thead>
              <tr>
                <th scope="col">Member</th>
                <th scope="col">Dream job</th>
                <th scope="col">Favourite coding snack</th>
                <th scope="col">Hometown</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($members as $m): ?>
                <tr>
                  <th scope="row"><?= about_escape($m['full_name']) ?></th>
                  <td><?= about_escape($m['dream_job']) ?></td>
                  <td><?= about_escape($m['favourite_snack']) ?></td>
                  <td><?= about_escape($m['hometown']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </section>

    <!-- Acknowledgement of Country, explained in context -->
    <section aria-labelledby="country-heading" class="content-section acknowledgement about-country-section">
      <h2 id="country-heading">Acknowledgement of Country</h2>
      <p>
        We respectfully acknowledge the Wurundjeri People of the Kulin Nation, the Traditional
        Owners of the land on which Swinburne University of Technology's Australian campuses stand.
        We pay our respects to their Elders past and present.
      </p>
      <h3>Why we included this</h3>
      <p>
        Our team studies a Swinburne course, so we wanted to recognise the Traditional Owners of the
        land where our university began. An Acknowledgement of Country recognises Aboriginal and
        Torres Strait Islander peoples as the Traditional Owners of the land and shows respect for
        their continuing connection to Country (Reconciliation Australia, n.d.).
      </p>
      <p>
        It also fits the company we designed. Smart city projects change how land, streets and public
        spaces are used. Smart-flow therefore commits to:
      </p>
      <ul>
        <li>talking with Traditional Owners early in every council project;</li>
        <li>encouraging applications from Aboriginal and Torres Strait Islander peoples for all roles;</li>
        <li>designing digital services that are accessible to everyone in the community.</li>
      </ul>
    </section>

    <!-- Acknowledgements, GenAI credit and APA 7 references -->
    <section aria-labelledby="credits-heading" class="content-section about-credits-section">
      <h2 id="credits-heading">Acknowledgements and References</h2>
      <p>Group photo: taken by the Smart Flow team. Used with the permission of all members.</p>
      <!-- GenAI acknowledgement: the brief states that not crediting GenAI is plagiarism -->
      <h3>Use of generative AI</h3>
      <p>
        We used Claude, an AI assistant made by Anthropic, mainly as a learning aid. It helped us understand the
        assessment requirements, explained how the code works, guided us through setting up VS Code, Jira and GitHub,
        and helped us identify and fix mistakes. In Project Part 2, Claude also generated draft PHP and SQL code for
        some features (including this page's database loading), which we reviewed, adapted and tested ourselves.
        The team members' details, quotes and photo are our own.
      </p>
      <h3>References (APA 7)</h3>
      <!-- APA 7: references listed in alphabetical order by author -->
      <ul class="references">
        <li>
          Anthropic. (2026). <cite>Claude</cite> (Opus 5.5 version) [Large language model].
          <a href="https://claude.ai">https://claude.ai</a>
        </li>
        <li>
          Reconciliation Australia. (n.d.). <cite>Acknowledgement of Country and Welcome to Country</cite>.
          <a
            href="https://www.reconciliation.org.au/reconciliation/acknowledgement-of-country-and-welcome-to-country/">https://www.reconciliation.org.au/reconciliation/acknowledgement-of-country-and-welcome-to-country/</a>
        </li>
        <li>
          Swinburne University of Technology. (n.d.). <cite>Acknowledgement of Country</cite>.
          <a
            href="https://www.swinburne.edu.au/about/strategy-initiatives/moondani-toombadool-centre/acknowledgement/">https://www.swinburne.edu.au/about/strategy-initiatives/moondani-toombadool-centre/acknowledgement/</a>
        </li>
      </ul>
    </section>
  </main>
<?php include 'footer.inc'; ?>
