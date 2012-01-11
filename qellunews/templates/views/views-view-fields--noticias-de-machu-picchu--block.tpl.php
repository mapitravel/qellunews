<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php 
	$title = $fields['title']->content;
	$description = $fields['description']->content;
	$timestamp = strtotime($fields['timestamp']->content);
	$timestamp = format_date($timestamp, 'custom', 'd \d\e F \d\e\l Y');
	$link = $fields['link']->content;
?>

<div class="noticia"> <?php print $title; ?>
  <p class="noticia-fecha"><?php print $timestamp; ?></p>
  <p class="noticia-description"><?php print $description; ?> <a href="<?php print $link; ?>">Leer m&aacute;s...</a></p>
  <ul class="noticia-social">
    <li class="node-social">
      <g:plusone size="medium" href="<?php print $link; ?>"></g:plusone>
    </li>
    <li class="node-social">
      <fb:like href="<?php print $link; ?>" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
    </li>
    <li class="node-social"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php print $link; ?>" data-count="horizontal" data-via="MapiTravel4All" data-lang="es" data-text="<?php print strip_tags($title); ?>">Tweet</a> </li>
  </ul>
</div>
<div class="clear"></div>
