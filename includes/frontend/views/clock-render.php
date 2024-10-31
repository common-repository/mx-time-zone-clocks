<?php 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$clean_str = str_replace( '/', '-', esc_attr($data['time_zone']) );
$clock_id = 'mx-clock-' . strtolower( $clean_str ) . rand( 0, 1000 );

if($data['clock_id'] !== '') {
    $clock_id = esc_attr($data['clock_id']);
} 

?>

<?php if( $clock_id !== '' ) : ?>

    <style>

        div.<?php echo esc_attr($clock_id); ?> *,
        div.<?php echo esc_attr($clock_id); ?> {
            font-size: <?php echo intval($data['clock_font_size']) . 'px !important;'; ?>
        }

        div.<?php echo esc_attr($clock_id); ?> {
            text-align: <?php echo esc_attr($data['text_align']).';'; ?>
        }
        
    </style>

<?php endif; ?>

<div class="mx-localize-time">

    <?php if( $data['clock_upload'] == 'false' ) : ?>

        <div 
            class='<?php echo esc_attr($data['clock_id']); ?> mx-clock-live-el'
            data-bg-img-url='<?php echo MXMTZC_PLUGIN_URL; ?>includes/admin/assets/img/<?php echo esc_attr($data['clock_type']); ?>'
            data-time_zone='<?php echo esc_attr($data['time_zone']); ?>'
            data-city_name='<?php echo html_entity_decode(esc_attr($data['city_name'])); ?>'
            data-date_format='<?php echo intval($data['time_format']); ?>'
            data-digital_clock='<?php echo esc_attr($data['digital_clock']); ?>'
            data-lang='<?php echo esc_attr($data['lang']); ?>'
            data-lang_for_date='<?php echo esc_attr($data['lang_for_date']); ?>'
            data-show_days='<?php echo esc_attr($data['show_days']); ?>'
            data-showSecondHand='<?php echo esc_attr($data['show_seconds']); ?>'
            data-arrow_type='<?php echo esc_attr($data['arrow_type']); ?>'
            data-super_simple='<?php echo esc_attr($data['super_simple']); ?>'
            data-arrows_color='<?php echo esc_attr($data['arrows_color']); ?>'
        >
            <div class="mx-timezone-clock-loader">loading...</div>
        </div>

    <?php else : ?>

        <div 
            class='<?php echo esc_attr($data['clock_id']); ?> mx-clock-live-el'
            data-bg-img-url='<?php echo esc_attr($data['clock_upload']); ?>'
            data-time_zone='<?php echo esc_attr($data['time_zone']); ?>'
            data-city_name='<?php echo html_entity_decode(esc_attr($data['city_name'])); ?>'
            data-date_format='<?php echo intval($data['time_format']); ?>'
            data-digital_clock='<?php echo esc_attr($data['digital_clock']); ?>'
            data-lang='<?php echo esc_attr($data['lang']); ?>'
            data-lang_for_date='<?php echo esc_attr($data['lang_for_date']); ?>'
            data-show_days='<?php echo esc_attr($data['show_days']); ?>'
            data-showSecondHand='<?php echo esc_attr($data['show_seconds']); ?>'
            data-arrow_type='<?php echo esc_attr($data['arrow_type']); ?>'
            data-super_simple='<?php echo esc_attr($data['super_simple']); ?>'
            data-arrows_color='<?php echo esc_attr($data['arrows_color']); ?>'
        >
            <div class="mx-timezone-clock-loader">loading...</div>
        </div>

    <?php endif; ?>

</div>
