<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/26/2018
 * Time: 7:50 PM
 */

class Template_m extends CI_Model{

    /**
     * @return data['css','js']
     */
    public function datatable()
    {
        $data['css'] = '<link href="'. base_url("assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css") . '" rel="stylesheet" type="text/css" />
                        <link href="'. base_url("assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css") . '" type="text/css" rel="stylesheet">
                        <link href="'. base_url("assets/plugins/datatables-responsive/css/datatables.responsive.css") . '" media="screen" type="text/css" rel="stylesheet" >';

        $data['js']  = '<script src="'. base_url("assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/datatables-responsive/js/datatables.responsive.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/datatables-responsive/js/lodash.min.js") . '" type="text/javascript"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function upload()
    {
        $data['css'] = '<link href="'. base_url("assets/plugins/dropzone/css/dropzone.css") . '" rel="stylesheet" type="text/css">';

        $data['js']  = '<script type="text/javascript" src="'. base_url("assets/plugins/dropzone/dropzone.min.js") . '"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function select2(){
        $data['css'] = NULL;
        $data['js']  = '<script type="text/javascript" src="'. base_url("assets/plugins/select2/js/select2.full.min.js") . '"></script>';
        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function datepicker()
    {
        $data['css'] = '<link href="'. base_url("assets/plugins/bootstrap-datepicker/css/datepicker3.css") . '" rel="stylesheet" type="text/css" media="screen">';

        $data['js']  = '<script src="'. base_url("assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js") . '" type="text/javascript"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function  chart(){
//        $data['css'] = '<link href="'. base_url("assets/plugins/nvd3/nv.d3.min.css") . '" rel="stylesheet" type="text/css">
//                        <link href="'. base_url("assets/plugins/rickshaw/rickshaw.min.css") . '" rel="stylesheet" type="text/css">';
//
//        $data['js']  = '<script src="'. base_url("assets/plugins/nvd3/lib/d3.v3.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/nv.d3.min.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/src/utils.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/src/tooltip.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/src/interactiveLayer.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/src/models/axis.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/src/models/line.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/nvd3/src/models/lineWithFocusChart.js") . '" type="text/javascript"></script>
//                        <script src="'. base_url("assets/plugins/rickshaw/rickshaw.min.js") . '" type="text/javascript"></script>';
        $data['css'] = NULL;
        $data['js'] = '<script src="'. base_url("assets/plugins/highcharts/highcharts.js") . '" type="text/javascript"></script>
                       <script src="'. base_url("assets/plugins/highcharts/modules/exporting.js") . '" type="text/javascript"></script>';
        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function gallery(){
        $data['css'] = '<link href="'. base_url("assets/plugins/jquery-metrojs/MetroJs.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/codrops-dialogFx/dialog.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/codrops-dialogFx/dialog-sandra.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/owl-carousel/assets/owl.carousel.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/jquery-nouislider/jquery.nouislider.css") . '" rel="stylesheet" type="text/css" media="screen" />';

        $data['js']  = '<script src="'. base_url("assets/plugins/jquery-metrojs/MetroJs.min.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/imagesloaded/imagesloaded.pkgd.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/jquery-isotope/isotope.pkgd.min.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/codrops-dialogFx/dialogFx.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/owl-carousel/owl.carousel.min.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/jquery-nouislider/jquery.nouislider.min.js") . '" type="text/javascript"></script>
                        <script src="'. base_url("assets/plugins/jquery-nouislider/jquery.liblink.js") . '" type="text/javascript"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function typehead(){
        $data['css'] = NULL;

        $data['js']  = '<script src="'. base_url("assets/plugins/bootstrap-typehead/typeahead.bundle.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/bootstrap-typehead/typeahead.jquery.min.js") . '"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function tabs(){
        $data['css'] = NULL;

        $data['js']  = '<script src="'. base_url("assets/plugins/bootstrap-collapse/bootstrap-tabcollapse.js") . '" type="text/javascript"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
        public function validation(){
        $data['css'] = NULL;

        $data['js']  = '<script src="'. base_url("assets/plugins/jquery-validation/js/jquery.validate.min.js") . '" type="text/javascript"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function froala(){
        $data['css'] = '<link href="'. base_url("assets/plugins/froala/css/froala_editor.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/froala_style.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/code_view.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/colors.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/emoticons.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/image_manager.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/image.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/line_breaker.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/quick_insert.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/table.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/file.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/char_counter.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/video.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/emoticons.css") . '" rel="stylesheet" type="text/css" media="screen" />
                        <link href="'. base_url("assets/plugins/froala/css/plugins/fullscreen.css") . '" rel="stylesheet" type="text/css" media="screen" />';

        $data['js']  = '<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
                        <script src="'. base_url("assets/plugins/froala/js/froala_editor.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/align.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/code_beautifier.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/code_view.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/colors.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/emoticons.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/draggable.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/font_size.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/font_family.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/image.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/image_manager.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/line_breaker.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/quick_insert.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/link.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/lists.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/paragraph_format.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/paragraph_style.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/video.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/table.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/url.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/emoticons.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/file.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/entities.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/inline_style.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/entities.min.js") . '"></script>
                        <script src="'. base_url("assets/plugins/froala/js/plugins/fullscreen.min.js") . '"></script>';

        return $data;
    }

    /**
     * @return data['css','js']
     */
    public function formwizard(){
        $data['css'] = NULL;

        $data['js']  = '<script type="text/javascript" src="'. base_url("assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js") . '"></script>';

        return $data;
    }

}