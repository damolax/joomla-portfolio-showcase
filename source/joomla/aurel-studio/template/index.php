<?php
/**
 * AUREL Studio Joomla site template.
 * Site pages and their content are managed in Joomla; this provides
 * a branded site shell and module positions, not demo page imports.
 */
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Router\Route;
$app = Factory::getApplication();
$root = rtrim(Uri::root(true), '/');
$media = $root . '/media/templates/site/aurel_studio';
$params = $this->params;
$ctaLabel = htmlspecialchars((string) $params->get('cta_text', 'Discuss a project'), ENT_QUOTES, 'UTF-8');
$ctaUrl = htmlspecialchars((string) $params->get('cta_url', 'index.php?option=com_contact&view=categories'), ENT_QUOTES, 'UTF-8');
$footerText = htmlspecialchars((string) $params->get('footer_text', 'Independent architectural design studio'), ENT_QUOTES, 'UTF-8');
$menu = $app->getMenu()->getActive();
$menuClass = $menu ? ' menu-' . (int) $menu->id : '';
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($this->direction, ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <jdoc:include type="metas" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#202724">
    <link rel="icon" type="image/svg+xml" href="<?php echo $media; ?>/images/favicon.svg">
    <link rel="stylesheet" href="<?php echo $media; ?>/css/site.css">
    <link rel="stylesheet" href="<?php echo $media; ?>/css/upgrade.css">
    <link rel="stylesheet" href="<?php echo $media; ?>/css/cms.css">
    <jdoc:include type="styles" />
    <jdoc:include type="scripts" />
    <script src="<?php echo $media; ?>/js/site.js" defer></script>
</head>
<body class="aurel-joomla<?php echo $menuClass; ?>">
    <a class="skip-link" href="#main-content">Skip to content</a>
    <div class="reading-progress" aria-hidden="true"></div>
    <header class="site-header">
        <a class="brand" href="<?php echo Route::_('index.php'); ?>" aria-label="Home">
            <img class="brand-logo" src="<?php echo $media; ?>/images/logo-light.svg" alt="AUREL Studio / Interiors">
        </a>
        <nav class="site-nav" aria-label="Primary navigation">
            <jdoc:include type="modules" name="menu" style="none" />
        </nav>
        <div class="aurel-header-search">
            <jdoc:include type="modules" name="search" style="none" />
        </div>
        <a class="header-cta" href="<?php echo $ctaUrl; ?>"><?php echo $ctaLabel; ?> ↗</a>
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">☰</button>
        <nav class="mobile-nav" aria-label="Mobile navigation">
            <jdoc:include type="modules" name="mobile-menu" style="none" />
        </nav>
    </header>
    <jdoc:include type="modules" name="hero" style="none" />
    <jdoc:include type="modules" name="breadcrumbs" style="none" />
    <jdoc:include type="message" />
    <main id="main-content" class="aurel-content container">
        <div class="aurel-main"><jdoc:include type="component" /></div>
        <?php if ($this->countModules('sidebar')) : ?>
        <aside class="aurel-sidebar" aria-label="Related information">
            <jdoc:include type="modules" name="sidebar" style="none" />
        </aside>
        <?php endif; ?>
    </main>
    <jdoc:include type="modules" name="bottom" style="none" />
    <section class="closing">
        <div class="container">
            <div class="eyebrow">EVERY IDEA BEGINS SOMEWHERE</div>
            <div class="closing-grid"><h2>Where vision<br><em>finds its place.</em></h2>
                <a class="circle-link" href="<?php echo $ctaUrl; ?>" aria-label="Start a conversation">↗</a>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="aurel-footer-row">
                <a class="footer-logo" href="<?php echo Route::_('index.php'); ?>">
                    <img src="<?php echo $media; ?>/images/logo-light.svg" alt="AUREL Studio / Interiors">
                </a>
                <div class="aurel-footer-modules">
                    <jdoc:include type="modules" name="footer-1" style="none" />
                    <jdoc:include type="modules" name="footer-2" style="none" />
                    <jdoc:include type="modules" name="footer-3" style="none" />
                </div>
            </div>
            <div class="footer-bottom">
                <span><?php echo $footerText; ?> / <?php echo (int) date('Y'); ?></span>
                <span>Architecture, interiors and a sense of place.</span>
            </div>
        </div>
    </footer>
    <button id="back-to-top" type="button" aria-label="Back to top">↑</button>
</body>
</html>