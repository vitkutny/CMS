<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.78281300 1374621633";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;s:53:"/var/www/cms/app/Page/Admin/templates/Home/view.latte";i:2;i:1374621633;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /var/www/cms/app/Page/Admin/templates/Home/view.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ojtbho80cl')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9e99cd2345_content')) { function _lb9e99cd2345_content($_l, $_args) { extract($_args)
?><a class="button expand" href="<?php echo htmlSpecialChars($_control->link("Page:add")) ?>
">
    <i class="icon-plus-sign-alt"></i> Add new page
</a>
<?php if ($pages->count()): ?>
    <div>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($pages) as $page): ?>
        <h3 class="subheader"><?php echo Nette\Templating\Helpers::escapeHtml($page->node->title, ENT_NOQUOTES) ?></h3>
        <a class="small button pull-right" href="<?php echo htmlSpecialChars($_control->link("Page:edit", array('id'=>$page->id))) ?>
">
            <i class="icon-edit"></i> Edit
        </a>
        <p><?php echo Nette\Templating\Helpers::escapeHtml($template->truncate($template->striptags($page->content), 250), ENT_NOQUOTES) ?></p>
<?php if ($_l->ifs[] = (!$iterator->last)): ?>        <hr>
<?php endif ;if (array_pop($_l->ifs)): endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>    </div>
<?php else: ?>
    <p class="alert-box">
        There's no page already.
    </p>
<?php endif ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 