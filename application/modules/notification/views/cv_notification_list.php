<div class="notification-item unread clearfix">
    <!-- START Notification Item-->
    <div class="heading open">
        <a href="#" class="text-complete pull-left">
            <i class="pg-map fs-16 m-r-10"></i>
            <span class="bold">New</span>
            <span class="fs-12 m-l-10"><?= $type; ?></span>
        </a>
        <div class="pull-right">
            <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                <div><i class="fa fa-angle-left"></i>
                </div>
            </div>
            <span class=" time">few sec ago</span>
        </div>
        <div class="more-details">
            <div class="more-details-inner">
                <h5 class="semi-bold fs-16"><?= $content; ?></h5>
                <p class="small hint-text">
                    Commented on john Smiths wall.
                    <br> via pages framework.
                </p>
            </div>
        </div>
    </div>
    <!-- END Notification Item-->
    <!-- START Notification Item Right Side-->
    <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
        <a href="#" class="mark"></a>
    </div>
    <!-- END Notification Item Right Side-->
</div>