<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

$portfolio = require __DIR__ . '/includes/data.php';
$profile = $portfolio['profile'];

require __DIR__ . '/includes/header.php';
?>

<section class="hero container">
    <div class="hero-content">
        <p class="hero-badge">
            <span class="pulse"></span>
            Available for opportunities
        </p>
        <h1 class="hero-title">
            Hi, I'm <span class="gradient-text"><?= e($profile['name']) ?></span>
        </h1>
        <p class="hero-role"><?= e($profile['role']) ?></p>
        <p class="hero-summary"><?= e($profile['summary']) ?></p>
        <div class="hero-actions">
            <a href="#contact" class="btn btn-primary">Get in touch</a>
            <a href="#projects" class="btn btn-outline">View projects</a>
        </div>
        <ul class="hero-stats">
            <li>
                <strong><?= e($profile['experience']) ?></strong>
                <span>Experience</span>
            </li>
            <li>
                <strong><?= e($profile['location']) ?></strong>
                <span>Location</span>
            </li>
            <li>
                <strong><?= count($portfolio['projects']) ?>+</strong>
                <span>Projects</span>
            </li>
        </ul>
    </div>
    <div class="hero-card">
        <div class="code-window">
            <div class="code-window-bar">
                <span></span><span></span><span></span>
            </div>
            <pre class="code-window-body"><code><span class="kw">class</span> <span class="cls">Developer</span> {
  <span class="prop">name</span> = <span class="str">"<?= e($profile['name']) ?>"</span>;
  <span class="prop">role</span> = <span class="str">"Senior PHP"</span>;
  <span class="prop">stack</span> = [
    <span class="str">"PHP"</span>, <span class="str">"Laravel"</span>,
    <span class="str">"Symfony"</span>, <span class="str">"MySQL"</span>
  ];
  <span class="fn">build</span>() {
    <span class="kw">return</span> <span class="str">"innovative solutions"</span>;
  }
}</code></pre>
        </div>
        <ul class="hero-contact">
            <li>
                <span class="label">Email</span>
                <a href="mailto:<?= e($profile['email']) ?>"><?= e($profile['email']) ?></a>
            </li>
            <li>
                <span class="label">Phone</span>
                <a href="tel:<?= e(preg_replace('/\s+/', '', $profile['phone'])) ?>"><?= e($profile['phone']) ?></a>
            </li>
            <li>
                <span class="label">Social</span>
                <a href="<?= e($profile['facebook']) ?>" target="_blank" rel="noopener noreferrer">Facebook</a>
            </li>
        </ul>
    </div>
</section>

<section id="about" class="section container">
    <header class="section-header">
        <span class="section-tag">About</span>
        <h2>Profile Summary</h2>
    </header>
    <p class="lead"><?= e($profile['summary']) ?></p>
    <div class="about-grid">
        <article class="info-card">
            <h3>Education</h3>
            <ul class="timeline">
                <?php foreach ($portfolio['education'] as $edu): ?>
                <li>
                    <strong><?= e($edu['degree']) ?></strong>
                    <span><?= e($edu['institution']) ?> · <?= e($edu['year']) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </article>
        <article class="info-card">
            <h3>Languages</h3>
            <div class="tag-list">
                <?php foreach ($portfolio['languages'] as $lang): ?>
                <span class="tag"><?= e($lang) ?></span>
                <?php endforeach; ?>
            </div>
            <h3 class="mt-lg">Certifications</h3>
            <div class="tag-list">
                <?php foreach ($portfolio['certifications'] as $cert): ?>
                <span class="tag tag-accent"><?= e($cert) ?></span>
                <?php endforeach; ?>
            </div>
        </article>
    </div>
</section>

<section id="skills" class="section section-alt">
    <div class="container">
        <header class="section-header">
            <span class="section-tag">Skills</span>
            <h2>Technical Expertise</h2>
        </header>
        <div class="skills-grid">
            <?php foreach ($portfolio['skills'] as $category => $items): ?>
            <article class="skill-card">
                <h3><?= e($category) ?></h3>
                <ul>
                    <?php foreach ($items as $skill): ?>
                    <li><?= e($skill) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="experience" class="section container">
    <header class="section-header">
        <span class="section-tag">Career</span>
        <h2>Work Experience</h2>
    </header>
    <div class="timeline-vertical">
        <?php foreach ($portfolio['experience'] as $job): ?>
        <article class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
                <time><?= e($job['period']) ?></time>
                <h3><?= e($job['role']) ?> · <?= e($job['company']) ?></h3>
                <p><?= e($job['description']) ?></p>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<section id="projects" class="section section-alt">
    <div class="container">
        <header class="section-header">
            <span class="section-tag">Portfolio</span>
            <h2>Selected Projects</h2>
        </header>
        <div class="projects-grid">
            <?php foreach ($portfolio['projects'] as $project): ?>
            <article class="project-card">
                <div class="project-card-top">
                    <h3><?= e($project['name']) ?></h3>
                    <span class="project-tech"><?= e($project['tech']) ?></span>
                </div>
                <p><?= e($project['description']) ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="contact" class="section container">
    <header class="section-header">
        <span class="section-tag">Contact</span>
        <h2>Let's work together</h2>
        <p class="section-sub">Send a message — it's stored in MySQL and emailed to <?= e($profile['email']) ?>.</p>
    </header>
    <div class="contact-layout">
        <div class="contact-info">
            <a class="contact-block" href="mailto:<?= e($profile['email']) ?>">
                <span class="contact-icon">✉</span>
                <div>
                    <strong>Email</strong>
                    <span><?= e($profile['email']) ?></span>
                </div>
            </a>
            <a class="contact-block" href="tel:<?= e(preg_replace('/\s+/', '', $profile['phone'])) ?>">
                <span class="contact-icon">📞</span>
                <div>
                    <strong>Phone</strong>
                    <span><?= e($profile['phone']) ?></span>
                </div>
            </a>
            <div class="contact-block">
                <span class="contact-icon">📍</span>
                <div>
                    <strong>Location</strong>
                    <span><?= e($profile['location']) ?></span>
                </div>
            </div>
        </div>
        <form class="contact-form" id="contact-form" action="<?= e(base_url()) ?>/contact.php" method="post" novalidate>
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required maxlength="120" autocomplete="name" placeholder="Your name">
                    <span class="field-error" data-for="name"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required maxlength="180" autocomplete="email" placeholder="you@example.com">
                    <span class="field-error" data-for="email"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required maxlength="200" placeholder="Project inquiry">
                <span class="field-error" data-for="subject"></span>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required rows="5" maxlength="5000" placeholder="Tell me about your project..."></textarea>
                <span class="field-error" data-for="message"></span>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary" id="contact-submit">
                    <span class="btn-text">Send message</span>
                    <span class="btn-loading" hidden>Sending…</span>
                </button>
                <p class="form-status" id="form-status" role="status" aria-live="polite"></p>
            </div>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
