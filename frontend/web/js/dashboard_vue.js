$(document).ready(function(){

    var dashboard = new Vue({
        el: '#dashboard',
        data: {},
        methods: {
            init_charts: function(){

                // TRACKING GRAPH
                Highcharts.chart('tracker_graph', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Historic World Population by Region'
                    },
                    subtitle: {
                        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
                    },
                    xAxis: {
                        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Population (millions)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' millions'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [
                        {
                            name: 'Year 1800',
                            data: [107, 31, 635, 203, 2]
                        }, 
                        {
                            name: 'Year 1900',
                            data: [133, 156, 947, 408, 6]
                        }, 
                        {
                            name: 'Year 2012',
                            data: [1052, 954, 4250, 740, 38]
                        }
                    ]
                });
                
                // SUMMARY GRAPH
                Highcharts.chart('summary_graph', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Historic World Population by Region'
                    },
                    subtitle: {
                        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
                    },
                    xAxis: {
                        categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Population (millions)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' millions'
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [
                        {
                            name: 'Year 1800',
                            data: [107, 31, 635, 203, 2]
                        }, 
                        {
                            name: 'Year 1900',
                            data: [133, 156, 947, 408, 6]
                        },
                        {
                            name: 'Year 2012',
                            data: [1052, 954, 4250, 740, 38]
                        }
                    ]
                });

            }
        },
        computed: {}
    });
    dashboard.init_charts();

});