<?php
defined('_JEXEC') or die;
$app = \Joomla\CMS\Factory::getApplication();
?><!DOCTYPE html><html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"><head><jdoc:include type="metas" /><jdoc:include type="styles" /><jdoc:include type="scripts" /></head><body class="aurel-joomla-template"><header><jdoc:include type="modules" name="navigation" style="none" /></header><main><jdoc:include type="component" /></main><footer><jdoc:include type="modules" name="footer" style="none" /></footer></body></html>