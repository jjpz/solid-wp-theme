<?php foreach ($args['posts'] as $award) { ?>
    <?php $content = apply_filters('the_content', $award->post_content); ?>
    <?php if (!empty($content)) { ?>
    <div class="col-md-4">
        <div class="award">
            <div class="icon-award">
                <svg class="svg-award" width="26" height="67" viewBox="0 0 26 67">
                    <g><path style="fill:currentColor;" d="M3.875,43.958c0,0,0.312,4.98,5.344,8.184c5.036,3.204,9.42,1.208,9.42,1.208s-0.316-4.983-5.348-8.184C8.254,41.96,3.877,43.957,3.875,43.958z" /><path style="fill:currentColor;" d="M13.723,60.757c0,0,0.923,3.395,4.797,4.858c3.875,1.464,6.563-0.568,6.563-0.568s-0.922-3.396-4.795-4.86C16.413,58.724,13.724,60.758,13.723,60.757z" /><path style="fill:currentColor;" d="M0.96,26.235c0,0-0.706,4.899,3.61,9.081c4.315,4.174,9.045,3.172,9.045,3.172s0.705-4.9-3.612-9.076C5.689,25.232,0.96,26.235,0.96,26.235z" /><path style="fill:currentColor;" d="M14.611,0.854c0,0-1.827,2.872-0.179,6.749c1.648,3.884,5.007,4.631,5.007,4.631s1.824-2.869,0.178-6.75C17.969,1.603,14.611,0.854,14.611,0.854z" /><path style="fill:currentColor;" d="M5.265,10.819c0,0-1.527,4.142,1.542,8.615c3.066,4.473,7.452,4.503,7.452,4.503s1.523-4.141-1.542-8.612C9.649,10.853,5.267,10.823,5.265,10.819z" /></g>
                </svg>
            </div>
            <div class="award-content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    <?php } ?>
<?php } ?>