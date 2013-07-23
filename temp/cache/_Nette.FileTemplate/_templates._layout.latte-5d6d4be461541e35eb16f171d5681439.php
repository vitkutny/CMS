<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.72716600 1374621453";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;s:51:"/var/www/cms/app/Page/Front/templates/@layout.latte";i:2;i:1374621453;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /var/www/cms/app/Page/Front/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '7hckt8o02p')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block module
//
if (!function_exists($_l->blocks['module'][] = '_lb4df86773c3_module')) { function _lb4df86773c3_module($_l, $_args) { extract($_args)
;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = $frontLayout; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['module']), $_l, get_defined_vars()) ; 