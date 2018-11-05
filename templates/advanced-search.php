
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="form-tab" data-toggle="tab" data-type="venta" href="#form" role="tab" aria-controls="venta" aria-selected="true">Venta</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" data-type="alquiler" role="tab" aria-controls="alquiler" aria-selected="false">Alquiler</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane show active" id="form" role="tabpanel" aria-labelledby="venta-tab">
    <form class="p-5" action="<?php echo get_post_type_archive_link('property') ?>" method="get">
      <?php get_template_part('templates/search', 'form') ?>
      <input type="hidden" name="accion" id="action" value="venta">
    </form>
  </div>
  <!-- <div class="tab-pane" id="alquiler" role="tabpanel" aria-labelledby="alquiler-tab">
    <form class="p-5" action="<?php echo get_post_type_archive_link('property') ?>" method="get">
      <?php get_template_part('templates/search', 'form') ?>
      <input type="hidden" name="accion" id="action" value="alquiler">
    </form>
  </div> -->
</div>
