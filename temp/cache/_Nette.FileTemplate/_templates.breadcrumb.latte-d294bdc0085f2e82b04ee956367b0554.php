<?php //netteCache[01]000386a:2:{s:4:"time";s:21:"0.82692000 1374621560";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;s:64:"/var/www/cms/app/Menu/Components/Menu/templates/breadcrumb.latte";i:2;i:1374621560;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /var/www/cms/app/Menu/Components/Menu/templates/breadcrumb.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'vzkn87t1ce')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<nav class="breadcrumbs">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($breadcrumb) as $node): ?>
    <a href="<?php if (isset($node['link'])): if (isset($node['link_id'])): echo htmlSpecialChars($_presenter->link($node['link'], array('id'=>$node['link_id']))) ;else: echo htmlSpecialChars($_presenter->link($node['link'])) ;endif ;else: ?>
#<?php endif ?>"<?php if ($_l->tmp = array_filter(array($iterator->last?'current' : NULL))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
        <?php echo Nette\Templating\Helpers::escapeHtml($node['title'], ENT_NOQUOTES) ?>

    </a>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</nav>