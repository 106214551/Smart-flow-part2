-- ============================================================
-- about_table.sql - Team members for the About page
-- Group: G02 - Smart-flow
-- Author: Khadija Boussaha (106237257)
--
-- about.php reads this table to build the member cards
-- (contributions + quotes) and the fun facts table.
--
-- Run it in phpMyAdmin (SQL tab) on the group database.
-- Safe to re-run: it drops and recreates the table.
-- utf8mb4 is needed so the Arabic quotes are stored correctly.
-- ============================================================

SET NAMES utf8mb4;

DROP TABLE IF EXISTS about;

CREATE TABLE about (
    member_id          INT AUTO_INCREMENT PRIMARY KEY,
    full_name          VARCHAR(50)  NOT NULL,
    student_id         CHAR(9)      NOT NULL UNIQUE,
    part1_contribution TEXT         NOT NULL,
    part2_contribution TEXT         NOT NULL,
    quote_text         TEXT         NOT NULL,
    quote_lang         VARCHAR(10)  NOT NULL,   -- e.g. ar-QA, used in the lang attribute
    quote_dialect      VARCHAR(30)  NOT NULL,   -- e.g. Qatari Arabic, shown before the translation
    quote_translation  TEXT         NOT NULL,
    quote_source       VARCHAR(50)  NULL,       -- shown in <cite>, only if the quote has a source
    quote_source_ref   VARCHAR(50)  NULL,       -- e.g. chapter and verse
    dream_job          VARCHAR(80)  NOT NULL,
    favourite_snack    VARCHAR(60)  NOT NULL,
    hometown           VARCHAR(60)  NOT NULL,
    display_order      INT          NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO about
(full_name, student_id, part1_contribution, part2_contribution,
 quote_text, quote_lang, quote_dialect, quote_translation, quote_source, quote_source_ref,
 dream_job, favourite_snack, hometown, display_order)
VALUES
('Mohammed Sami Aljattal', '106218087',
 'Home page (index.html) and its CSS, including the background graphic, merged-cell table, search box and footer links.',
 'Converted index.html to index.php and built manage.php for displaying, filtering, searching and sorting EOIs.',
 'الحلم ما له حدود، وكل خطوة صغيرة تقربني من مستقبلي.', 'ar-QA', 'Qatari Arabic',
 '"Dreams have no limits, and every small step brings me closer to my future."', NULL, NULL,
 'Doctor (now studying cybersecurity instead!)', 'Chips and Coca-Cola', 'Doha, Qatar', 1),

('Malik Al Badri', '106195601',
 'Jobs page (jobs.html) and its CSS, including job research and the floated aside.',
 'Converted jobs.html to jobs.php, created the jobs table so job descriptions load from the database, and built the job search.',
 'ما تبدي تخسر إلا لمن تبدي تستسلم', 'ar-IQ', 'Iraqi Arabic',
 '"You only start losing when you start giving up."', NULL, NULL,
 'Chief AI security engineer', 'Grilled shrimp and coffee', 'Baghdad, Iraq', 2),

('Rabie Abdullah', '106242400',
 'Application page (apply.html) and its CSS, including form validation and the Flexbox/Grid form layout.',
 'Converted apply.html to apply.php, created the EOI table, and built process_eoi.php with server-side validation.',
 'ما كان لله بقى و اتصل، وما كان لغيره انقطع وانفصل', 'ar-SY', 'Arabic',
 '"Whatever is done for Allah stays and endures, and whatever is done for other than Him cuts off and fades away."', NULL, NULL,
 'Leading a cybersecurity-oriented company', 'Strawberry milk and chips', 'Joulan, Syria', 3),

('Khadija Boussaha', '106237257',
 'About page (about.html): its content and structure, including the team details, group photo and fun facts table, and the first draft of its CSS. Also set up and managed the team''s Jira board (epics, user stories, tasks and sprints).',
 'Converted about.html to about.php and created the about table, so member details, contributions and fun facts load from the database. Built deleting EOIs by job reference and changing EOI status, and managed the Jira board.',
 'قريني وانا سيدك', 'ar-DZ', 'Algerian Arabic',
 '"Teach me, and I will become your master." A student who is taught well can one day surpass the teacher.', NULL, NULL,
 'Still deciding, and keeping my options open!', 'Schweppes', 'Constantine, Algeria', 4),

('Sara Kneina', '106214551',
 'Shared CSS (styles.css) and the page-specific CSS files, the embedded and inline CSS, GitHub repository setup and GitHub Pages deployment.',
 'Set up the project folder, GitHub repository and branches. Built the shared header, navigation and footer includes, settings.php, and the manager login, authentication and logout. Led the shared CSS, final integration and the ZIP and SQL submission.',
 'وعسى أن تكرهوا شيئًا وهو خير لكم وعسى أن تحبوا شيئًا وهو شر لكم', 'ar', 'Arabic',
 '"Perhaps you dislike something and it is good for you, and perhaps you love something and it is bad for you."', 'Qur''an', 'Surah Al-Baqarah, 2:216',
 'Still exploring', 'Toblerone', 'Syria and Algeria', 5);
