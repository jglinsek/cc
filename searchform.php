<?php
/**
 * @package WordPress
 * @subpackage Apex_Theme
 */
?>

<?php $apex_searchfieldtext = __('Search Our Site...', 'apex'); ?>

<div id="search">   
    <form class="searchform" method="get" action="<?php echo home_url(); ?>/">
    <input name="s" id="s" type="text" onFocus="if(this.value == '<?php echo $apex_searchfieldtext ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $apex_searchfieldtext ?>'; }" value="<?php echo $apex_searchfieldtext ?>" />
    </form>
</div>