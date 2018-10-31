<aside class="sidebar">
  <?php
    echo do_shortcode('[avatar user='.$post->post_author.' size=300 class=img-fluid]');
  ?>
  <ul>
    <?php !dynamic_sidebar('sidebar') ?>
  </ul>
</aside>
