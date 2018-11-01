    <footer class="footer pb-0">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-5">
            <ul>
              <?php !dynamic_sidebar('footer1') ?>
            </ul>
          </div>
          <div class="col-md-3">
            <ul>
              <?php !dynamic_sidebar('footer2') ?>
            </ul>
          </div>
          <div class="col-md-3">
            <ul>
              <?php !dynamic_sidebar('footer3') ?>
            </ul>
          </div>
          <div class="col-md-3">
            <ul>
              <?php !dynamic_sidebar('footer4') ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="copyright border-top pt-4 mt-5">
        <div class="container">
          <div class="row">
            <div class="col-9 col-md-8">
              <p class="text-black-50">&copy; <?php echo date("Y") ?> <?php bloginfo('name') ?>. <span class="d-none d-md-inline-block">Todos los derechos reservados.</span></p>
            </div>
            <div class="col-3 col-md-4 text-center text-md-right">
              <a href="/wp-admin/" class="text-black-50"><?php _e('Admin') ?></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer() ?>
  </body>
</html>
