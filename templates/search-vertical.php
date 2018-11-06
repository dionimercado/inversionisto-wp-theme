
<div class="row">
  <div class="col-12">
    <div class="form-group">
      <?php
      $categories = get_terms( array(
        'taxonomy' => 'prop_category',
        'hide_empty' => false
      ) );

      if ( !empty($categories) ) :
        $output = '<select class="select2" name="categoria">';
        $output.= '<option value="any">Tipo de inmueble</option>';
        foreach( $categories as $category ) {
          if( $category->parent == 0 ) {
            $output.= '<option value="'. esc_attr( $category->slug ) .'">'. esc_html( $category->name ) .'</option>';
          }
        }
        $output.='</select>';
        echo $output;
      endif;
      ?>
    </div>
  </div>
  <div class="col-12">
    <div class="form-group">
      <?php
      $areas = get_terms( array(
        'taxonomy' => 'prop_area',
        'hide_empty' => false
      ) );

      if ( !empty($areas) ) :
        $output = '<select class="select2-search form-control" multiple="multiple" name="sectores[]">';
        $output.= '<option value="-1">Sector</option>';
        foreach( $areas as $area ) {
          if( $area->parent == 0 ) {
            $output.= '<optgroup label="'. esc_attr( $area->name ) .'">';
            $output.= '<option value="'. esc_attr( $area->slug ) .'">Todos los sectores</option>';
            foreach( $areas as $subarea ) {
              if($subarea->parent == $area->term_id) {
              $output.= '<option value="'. esc_attr( $subarea->slug ) .'">'. esc_html( $subarea->name ) .'</option>';
              }
            }
            $output.='</optgroup>';
          }
        }
        $output.='</select>';
        echo $output;
      endif;
      ?>
    </div>
  </div>
  <div class="col-12">
    <div class="form-group">
      <select class="select2 form-control" name="habitaciones">
        <option value="any">Habitaciones</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
  </div>
  <div class="col-12">
    <div class="form-group">
      <select class="select2 form-control" name="parqueos">
        <option value="any">Parqueos</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
  </div>
  <div class="col-12">
    <div class="form-group">
      <select class="select2 form-control" name="banos">
        <option value="any">Baños</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <select class="select2 form-control" name="moneda" id="currency">
      <option value="dop" selected>Pesos</option>
      <option value="usd">Dólares</option>
    </select>
  </div>
  <div class="col-12">
    <div class="d-flex mt-4">
      <label for="price_from">Precio:</label>
      <div class="d-flex justify-content-between w-100">
        <span style="color: #cf9f11;">
          <span style="display: inline-block; margin-right: -5px; margin-left: 7px;" id="price_currency_from">RD$</span>
          <span id="price_from_span"></span>
          <input type="hidden" id="price_from" name="precio_desde" readonly style="border:0; width: 140px; color: #cf9f11;background-color: transparent;">
        </span>
        <span style="color: #cf9f11;">
          <span style="display: inline-block; margin-right: -5px; margin-left: 7px;" id="price_currency_to">RD$</span>
          <span id="price_to_span"></span>
          <input type="hidden" id="price_to" name="precio_hasta" readonly style="border:0; width: 108px; color: #cf9f11; background-color: transparent;">+
        </span>
      </div>
    </div>
    <div id="price_range"></div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary btn-block mt-5" type="submit"><?php _e('Buscar Propiedades') ?></button>
  </div>
</div>
