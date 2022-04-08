
<?php if(mobileTabletCheck()==1): ?>
    <?php echo $__env->make('fontend.partial.mobile_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('fontend.partial.desktop_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<a id="button_move_to_top" style="display: none; #eef0f1;"><img style="width:100%;" src="<?php echo e(asset('/images/ICON/arrowup.png')); ?>"> </a>

<script>



    $('.desktop-search-field').on('input', function () {
        var search_query = $(this).val();
        if (search_query.length >= 1) {
            $(".desktop-search-menu").show();
            jQuery.ajax({
                type: "GET",
                url: "<?php echo e(url('search_engine/')); ?>?search_query=" + search_query,
                success: function (data) {

                    jQuery(".desktop-search-menu").html(data.html);
                }
            });
        } else {
            jQuery(".desktop-search-menu").html('');

        }
    });

    var btn = jQuery('#button_move_to_top');
    jQuery(window).scroll(function (e) {
        var scroll = jQuery(document).scrollTop();
        if (scroll > 30) {
            btn.show();
        } else {
            btn.hide();
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, '300');
    });
</script>
<script>
    $(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('.topfixedheader').addClass('fixed-header');
    }
    else {
        $('.topfixedheader').removeClass('fixed-header');
    }
});
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/partial/footer.blade.php ENDPATH**/ ?>