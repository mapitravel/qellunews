<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
 
 global $base_root;
?>

<div id="main">
  <div id="header">
    <div id="header-inner" class="container_16">
      <h2 id="logo"><a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" rel="home"><span><?php print $site_name; ?></span></a></h2>
      <?php if ($site_slogan): ?>
      <?php print $site_slogan; ?>
      <?php endif; ?>
      <p id="header-mail">Reserve y consulte los tours las 24 horas: <strong>info@machupicchu.biz</strong></p>
    </div>
  </div>
  <div class="clear"></div>
  <!-- //#header -->
  
  <div id="main-container">
    <div id="content" class="container_16">
      <div id="main-content" class="grid_16">
        <div id="main-content-inner">
          <div id="content-body">
            <?php if($messages || $page['help']) : ?>
            <div id="extras"> <?php print $messages; ?> <?php print render($page['help']); ?>
              <?php if ($action_links): ?>
              <ul class="action-links">
                <?php print render($action_links); ?>
              </ul>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($tabs): ?>
            <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>
		<div id="welcome"><?php print render($page['welcome']); ?></div><div class="clear"></div>
            <div class="grid_9 alpha" id="homeleft"><?php print render($page['homeleft']); ?></div>
            <div class="grid_7 omega" id="homeright"><?php print render($page['homeright']); ?></div>
		<div class="clear"></div>
            <div class="grid_11 alpha" id="homebottom"><?php print render($page['homebottom']); ?></div>
            <div class="grid_5 omega" id="homemore"><?php print render($page['homemore']); ?></div>
		<div class="clear"></div>
            </div>
        </div>
      </div>
      <div class="clear"></div>
      <!-- //#content-body --> 
      <div id="sharebar"><?php print render($page['sharebar']); ?></div>
    </div>
    <!-- //#content --> 
  </div>
  <div class="clear"></div>
  <!-- //#main-container -->
  <div id="footer">
    <div id="footer-inner" class="container_16 region region-footer"> <?php print render($page['footer']); ?> </div>
  </div>
</div>
