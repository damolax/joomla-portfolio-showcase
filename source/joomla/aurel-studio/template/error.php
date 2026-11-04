<?php
defined('_JEXEC') or die;
use Joomla\CMS\Uri\Uri;
$status = isset($this->error) ? (int) $this->error->getCode() : 500;
http_response_code($status);
$root = rtrim(Uri::root(true), '/');
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?php echo $status; ?> — AUREL Studio</title><link rel="stylesheet" href="<?php echo $root; ?>/media/templates/site/aurel_studio/css/site.css"></head><body><main class="not-found"><div class="container"><div class="eyebrow">PAGE NOT AVAILABLE</div><h1><?php echo $status; ?></h1><h2>Not quite where<br><em>you expected.</em></h2><a href="<?php echo $root ?: '/'; ?>" class="text-link">RETURN HOME ↗</a></div></main></body></html>