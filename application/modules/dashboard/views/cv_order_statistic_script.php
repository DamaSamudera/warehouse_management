<script type="text/javascript">
    /**
     *
     */
    function get_info_detail(data) {
        console.log(data);
        $("#list_store_statistik").html("");
        for(var i = 0; i < data.length; i++){
            $("#list_store_statistik").append('<div data-index="' +i+ '"\n' +
                '                                             class="company-stat-box m-t-15 active padding-20 bg-master-lightest">\n' +
                '                                            <div>\n' +
                '                                                <button type="button" class="close close-store">\n' +
                '                                                    <i class="pg-close fs-12"></i>\n' +
                '                                                </button>\n' +
                '                                                <p class="company-name pull-left text-uppercase bold no-margin">\n' +
                '                                                    <span class="fa fa-circle text-success fs-11"></span>\n' +
                '                                                    ' + data[i].name+ '\n' +
                '                                                </p>\n' +
                '                                                <small class="hint-text m-l-10">' +data[i].code+ '</small>\n' +
                '                                                <div class="clearfix"></div>\n' +
                '                                            </div>\n' +
                '                                            <div class="m-t-10">\n' +
                '                                            <p class="pull-left small hint-text no-margin p-t-5">Alamat</p>\n' +
                '                                                <div class="pull-right">\n' +
                '                                                    <span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">'+ data[i].Total +'</span>\n' +
                '                                                </div>\n' +
                '                                                <div class="clearfix"></div>\n' +
                '                                            </div>\n' +
                '                                        </div>');
        }
    }

    /**
     *
     */
    function get_info_order_statistik() {
        $.getJSON(
            '<?= base_url('assets/sample/dashboard_order_statistik.json');?>',
            function (data) {
                console.log(data);
                get_info_detail(data.chart.summary);
                Highcharts.chart('container', {
                    chart: {
                        type: 'area'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    exporting: {
                        enabled: false
                    },
                    xAxis: {
                        categories: data.chart.category,
                        tickmarkPlacement: 'on',
                        title: {
                            enabled: false
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Percent'
                        }
                    },
                    tooltip: {
                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} millions)<br/>',
                        split: true
                    },
                    plotOptions: {
                        area: {
                            stacking: 'percent',
                            lineColor: '#ffffff',
                            lineWidth: 1,
                            marker: {
                                lineWidth: 1,
                                lineColor: '#ffffff'
                            },
                            events: {
                                legendItemClick: function (data) {
                                    console.log(data);
                                    console.log(this.name + ' clicked\n' +
                                        'Alt: ' + event.altKey + '\n' +
                                        'Control: ' + event.ctrlKey + '\n' +
                                        'Meta: ' + event.metaKey + '\n' +
                                        'Shift: ' + event.shiftKey);
                                    //return false;
                                    // <== returning false will cancel the default action
                                }
                            }
                        },
                    },
                    series: data.chart.series
                });

            }
        );
    }

    /**
     *
     */
    $('.close-store').click(function(e) {
        console.log("click close");
        $('#card-order-statistic').card({
            refresh: true
        });
    });
</script>