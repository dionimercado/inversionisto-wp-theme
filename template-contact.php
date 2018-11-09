<?php
/* Template Name: Contact */

get_header();

?>

<main class="wrapper" style="margin-top: 85px;">
  <iframe class="mb-md-5 contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21363.56034620889!2d-70.70914265288393!3d19.449962667530748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1cf5e75836045%3A0xe7456fe5636eeb43!2sMonumento+a+los+H%C3%A9roes+de+la+Restauraci%C3%B3n%2C+Santiago+De+Los+Caballeros+51000%2C+Dominican+Republic!5e0!3m2!1sen!2sus!4v1541648828669" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="contact-info mt-4">
          <h1>Contactos</h1>
          <ul class="mb-4">
            <li>
              <p><strong>Ubicaci&oacute;n: </strong>Santiago, Rep. Dominicana</p>
              <p><strong>Tel&eacute;fono: </strong>+1 (809) 804-1718</p>
              <p><strong>Email: </strong>inversionisto@gmail.com</p>
            </li>
          </ul>
          <h1>S&iacute;guenos</h1>
          <div class="social-icons">
            <a href="https://facebook.com/inversionisto" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com/inversionisto" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="mailto:inversionisto@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>
            <a href="tel:+18098041718" target="_blank"><i class="fa fa-phone"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="">
          <?php while( have_posts() ) : the_post(); the_content(); endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer() ?>
