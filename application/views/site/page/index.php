
<ul class="bxslider" id="banner">
    <?php foreach ($banners->result() as $banner): ?>
        <li><img src="<?php echo base_url("uploads/banners/".$banner->bnr_image); ?>" class="responsive-img"></li>
    <?php endforeach ?>

<!--     <li><img src="/images/pic1.jpg" /></li>
<li><img src="/images/pic2.jpg" /></li>
<li><img src="/images/pic3.jpg" /></li>
<li><img src="/images/pic4.jpg" /></li> -->
</ul>

<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider();
    });
</script>