<?php
$top_nav_self = '<li class="%3$s">%2$s</li>';
$top_nav_always = '<li class="top_nav_1"><a href="%1$s" title="%2$s">%2$s</a></li>';
$top_nav_child = '<li class="%3$s"><a href="%1$s" title="%2$s"><span class="child_link">%2$s</span></a></li>';
$top_nav_sibling = '<li class="%3$s"><a href="%1$s" title="%2$s">%2$s</a></li>';
$top_nav_menu = '<ul id="top_nav_menu">%s</ul>';
$top_nav_body = <<<'TOP_NAV_BODY'
<nav role="navigation">
<div id="top_nav_menuToggle"><input type="checkbox" /><span></span><span></span><span></span><ul id="top_nav_menu">%1$s</ul></div>%2$s
</nav>
TOP_NAV_BODY;
$foot_nav_link = '<a href="%1$s" title="%2$s">[%2$s]</a>';
$foot_nav_line = '<div id="foot_nav">%s</div>';
$crumb_nav = '<div class="crumb"><a href="%1$s" title="%2$s">%2$s</a></div>';
$crumb_nav_tail = '<div class="crumb">%s</div>';
$crumb_nav_line = '<div id="crumb_line">%s</div>';
?>
