<?php

$height_desktop = $height_desktop_small = $height_on_tabs = $height_on_tabs_portrait = $height_on_mob = $height_on_mob_landscape = '';
$id = uniqid('infuse-spacer-');
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
?>
<style>


<?php if($height_desktop !== '') :?>
    <?php printf( "#%s { height: %spx;}",  $id, $height_desktop); ?>
<?php endif; ?>

@media screen and (max-width: 1440px) {
    <?php if($height_desktop_small !== '') :?>
        <?php printf( "#%s { height: %spx;}",  $id, $height_desktop_small); ?>
    <?php endif; ?>
}

@media screen and (min-width: 1200px) and (max-width: 1299px) {
    <?php if($height_desktop_smaller !== '') :?>
        <?php printf( "#%s { height: %spx;}",  $id, $height_desktop_smaller); ?>
    <?php endif; ?>
}

@media screen and (max-width: 1199px) {
    <?php if($height_on_tabs !== '') :?>
        <?php printf( "#%s { height: %spx;}",  $id, $height_on_tabs); ?>
    <?php endif; ?>
}

@media screen and (max-width: 991px) {
    <?php if($height_on_tabs_portrait !== '') :?>
        <?php printf( "#%s { height: %spx;}",  $id, $height_on_tabs_portrait); ?>
    <?php endif; ?>
}

@media screen and (max-width: 767px) {
    <?php if($height_on_mob_landscape !== '') :?>
        <?php printf( "#%s { height: %spx;}",  $id, $height_on_mob_landscape); ?>
    <?php endif; ?>
}

@media screen and (max-width: 575px) {
    <?php if($height_on_mob !== '') :?>
        <?php printf( "#%s { height: %spx;}",  $id, $height_on_mob); ?>
    <?php endif; ?>
}

</style>
<div id="<?php echo $id; ?>"></div>