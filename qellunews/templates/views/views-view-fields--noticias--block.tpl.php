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
 # 	print print_r(array_keys($fields), 1);
	$title = $fields['title']->content;
	$body = $fields['body']->content;
	$path = $fields['path']->content;
	$tax = $fields['field_tags']->content;	
	$created_day = date("d m Y", strtotime($fields['created']->content));
	$created = strtotime($fields['created']->content);
	$field_image = $fields['field_picture']->content;
	$now = date("d m Y");
	
	if($created_day == $now) :
		$created = "Hoy " . format_date($created, 'custom', 'g:i a');
	else :
		$created = format_date($created, 'custom', 'd F Y');
	endif;
	
	$noimg = '<img src="/sites/default/files/noticia.jpg" alt="Machupicchu Noticias" width="140" height="105" />';
	
	if ($field_image == '') :
		$field_image = sprintf('<a href="%s">%s</a>', $path, $noimg);
	endif;
?>
<div class="noticia">
	<h2><?php print $title; ?></h2>
    <div class="noticia-meta">
    	<?php print $created; ?> | <?php print $tax; ?>
    </div>
    <div class="noticia-content">
    	<div class="noticia-image">
        	<?php print $field_image; ?>
        </div>
        <div class="noticia-body">
        	<?php print $body; ?> <a href="<?php print $path; ?>">Leer m&aacute;s...</a>
        </div>
    </div>
    <div class="noticia-social">
    	<ul>
            <li class="social"><g:plusone size="medium" href="<?php print $path; ?>"></g:plusone></li>
        	<li class="social"><fb:like href="<?php print $path; ?>" send="false" layout="button_count" width="100" show_faces="false"></fb:like></li>
            <li class="social"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php print $path; ?>" data-count="horizontal" data-via="MapiTravel4All" data-lang="es" data-text="<?php print strip_tags($title); ?>">Tweet</a></li>
           
        </ul>        
    </div>
</div>
<div class="clear"></div>
