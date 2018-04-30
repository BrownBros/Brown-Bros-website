<nav role="navigation">
  <div id="menuToggle">
    <input type="checkbox" />
    <span></span>
    <span></span>
    <span></span>
    <ul id="menu">
<?php
        foreach ($page_links as $page_link) {
          echo $page_link;
        }?>
    </ul>
  </div>
  <div class="crumb"><?php echo $page_crumb; ?></div>
</nav>
