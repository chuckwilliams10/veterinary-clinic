
<ul class="bxslider" id="banner">
    <?php foreach ($banners->result() as $banner): ?>
        <li><img src="<?php echo base_url("uploads/banners/".$banner->bnr_image); ?>" class="responsive-img"></li>
    <?php endforeach ?> 
</ul>

<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });
</script>