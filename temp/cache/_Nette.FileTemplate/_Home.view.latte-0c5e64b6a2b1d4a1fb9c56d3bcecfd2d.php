<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.64230100 1374621632";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;s:53:"/var/www/cms/app/Menu/Admin/templates/Home/view.latte";i:2;i:1374621632;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /var/www/cms/app/Menu/Admin/templates/Home/view.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0kowvuefwk')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb93787cb8b9_content')) { function _lb93787cb8b9_content($_l, $_args) { extract($_args)
?><ul>
<?php $iterations = 0; foreach ($lists as $list): ?>    <li>
        <a href="<?php echo htmlSpecialChars($_control->link("List:Edit", array('id'=>$list->id))) ?>
">
            <?php echo Nette\Templating\Helpers::escapeHtml($list->title, ENT_NOQUOTES) ?>

        </a>
    </li>
<?php $iterations++; endforeach ?></ul><?php
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 