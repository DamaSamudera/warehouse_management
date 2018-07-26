<?php $this->load->view('cv_form_step1_script'); ?>
<?php $this->load->view('cv_form_step3_script'); ?>

<script type="text/javascript">

    $('#form-action-product').bootstrapWizard({
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('#form-action-product').find('.pager .next').hide();
                $('#form-action-product').find('.pager .finish').show().removeClass('disabled hidden');
            } else {
                $('#form-action-product').find('.pager .next').show();
                $('#form-action-product').find('.pager .finish').hide();
            }

            var li = navigation.find('li a.active').parent();

            var btnNext = $('#form-action-product').find('.pager .next').find('button');
            var btnPrev = $('#form-action-product').find('.pager .previous').find('button');

            // remove fontAwesome icon classes
            function removeIcons(btn) {
                btn.removeClass(function (index, css) {
                    return (css.match(/(^|\s)fa-\S+/g) || []).join(' ');
                });
            }

            if ($current > 1 && $current < $total) {

                var nextIcon = li.next().find('.fa');
                var nextIconClass = nextIcon.attr('class').match(/fa-[\w-]*/).join();

                removeIcons(btnNext);
                btnNext.addClass(nextIconClass + ' btn-animated from-left fa');

                var prevIcon = li.prev().find('.fa');
                var prevIconClass = prevIcon.attr('class').match(/fa-[\w-]*/).join();

                removeIcons(btnPrev);
                btnPrev.addClass(prevIconClass + ' btn-animated from-left fa');
            } else if ($current == 1) {
                // remove classes needed for button animations from previous button
                btnPrev.removeClass('btn-animated from-left fa');
                removeIcons(btnPrev);
            } else {
                // remove classes needed for button animations from next button
                btnNext.removeClass('btn-animated from-left fa');
                removeIcons(btnNext);
            }
        },
        onNext: function (tab, navigation, index) {
            console.log("Showing next tab");
        },
        onPrevious: function (tab, navigation, index) {
            console.log("Showing previous tab");
        },
        onInit: function () {
            $('#form-action-product ul').removeClass('nav-pills');
        }

    });

    $('#form_action').submit(function(){
        var form = $(this);
        $('input').each(function(i){
            var self = $(this);
            try{
                var v = self.autoNumeric('get');
                self.autoNumeric('destroy');
                self.val(v);
            }catch(err){
                console.log("Not an autonumeric field: " + self.attr("name"));
            }
        });
        return true;
    });

</script>