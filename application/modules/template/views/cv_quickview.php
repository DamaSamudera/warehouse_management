<!--START QUICKVIEW -->
<div id="quickview" class="quickview-wrapper" data-pages="quickview">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="" data-target="#quickview-notes" data-toggle="tab">
            <a style="color: white">Notes</a>
        </li>
    </ul>
    <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview" style="cursor: pointer"><i
            class="pg-close text-white"></i></a>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- BEGIN Notes !-->
        <div class="active tab-pane no-padding" id="quickview-notes">
            <?php $this->load->view('note/v_base'); ?>
        </div>
        <!-- END Notes !-->
    </div>
</div>
<!-- END QUICKVIEW-->