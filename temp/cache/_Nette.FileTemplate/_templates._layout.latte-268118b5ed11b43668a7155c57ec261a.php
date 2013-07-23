<?php //netteCache[01]000372a:2:{s:4:"time";s:21:"0.74845300 1374621453";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkFiles";}i:1;s:50:"/var/www/cms/app/CMS/Front/templates/@layout.latte";i:2;i:1374621453;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /var/www/cms/app/CMS/Front/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'ymi2rbwr39')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block core
//
if (!function_exists($_l->blocks['core'][] = '_lb2a8acd3bda_core')) { function _lb2a8acd3bda_core($_l, $_args) { extract($_args)
?><div class="contain-to-grid">
    <nav class="top-bar">
        <ul class="title-area">
            <li class="name">
                <h1>
                    <a href="<?php echo htmlSpecialChars($_control->link($home->link, array('id'=>$home->link_id))) ?>
">
                        <i class="icon-home"></i> <?php echo Nette\Templating\Helpers::escapeHtml($home->title, ENT_NOQUOTES) ?>

                    </a>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
<?php $_ctrl = $_control->getComponent("menu"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->renderNavbar('front') ?>
        </section>
    </nav>
</div>
<div class="row">
    <div class="column">
<?php $_ctrl = $_control->getComponent("menu"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->renderBreadcrumb() ;$iterations = 0; foreach ($flashes as $flash): ?>
        <p data-alert class="alert-box <?php echo htmlSpecialChars($flash->type) ?>">
            <?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?>

            <a href="#" class="close">&times;</a>
        </p>
<?php $iterations++; endforeach ?>
    </div>
    <div class="column">
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'module', $template->getParameters()) ?>
    </div>
</div><?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = '../../templates/@layout.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['core']), $_l, get_defined_vars()) ; 