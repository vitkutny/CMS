<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.77241700 1374621560";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;s:60:"/var/www/cms/app/Menu/Components/Menu/templates/navbar.latte";i:2;i:1374621560;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /var/www/cms/app/Menu/Components/Menu/templates/navbar.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'd8yuzfmzvu')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block nav
//
if (!function_exists($_l->blocks['nav'][] = '_lb650c8dec7a_nav')) { function _lb650c8dec7a_nav($_l, $_args) { extract($_args)
?><ul<?php if ($_l->tmp = array_filter(array($level==0?'left':'dropdown'))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php $level++ ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($menu) as $node): $subMenu=$node->related('node')->order('position')->order('title') ?>
        <li<?php if ($_l->tmp = array_filter(array(isset($breadcrumb[$node->id])?'active' : NULL,$subMenu->count()?'has-dropdown' : NULL))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
            <a href="<?php echo htmlSpecialChars($_presenter->link($node->link, array('id'=>$node->link_id))) ?>">
                <?php echo Nette\Templating\Helpers::escapeHtml($node->title, ENT_NOQUOTES) ?>

            </a>
<?php if ($subMenu->count()): call_user_func(reset($_l->blocks['nav']), $_l, array('menu'=>$subMenu) + get_defined_vars()) ;endif ?>
        </li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
</ul><?php
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
$level=0 ;if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['nav']), $_l, get_defined_vars()) ; 