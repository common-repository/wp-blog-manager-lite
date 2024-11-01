<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( $select_tax == 'select' ) {
    ?>
    <option value = "select" ><?php echo _e( 'Choose Terms', WPBM_TD );
    ?></option>
    <?php
} else {
    ?>
    <option value = "select" ><?php echo _e( 'Choose Term', WPBM_TD ); ?></option>
    <?php
    echo $this -> wpbm_fetch_category_list( $select_tax, $wpbm_option[ 'simple_taxonomy_terms' ] );
}
