//<pre>

{{--
    var_dump($chartData[0]->unit);
    die();
--}}

var colors = new Array();
colors[0] = "#d97373";
colors[1] = "#63b9ff";
colors[2] = "#7290db";
colors[3] = "#73d97f";
colors[4] = "#dfb506";
colors[5] = "#89E894";
colors[6] = "#CCCCCC";
colors[7] = "#003366";
colors[8] = "#3399CC";
colors[9] = "#CDB99C";
colors[10] = "#330000";
colors[11] = "#FFD800";
colors[12] = "#587058";
colors[13] = "#587498";
colors[14] = "#E86850";


$(function () {
    $('#chart{{ $chartId }}').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: '{{ $title }}'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
                month: '%e. %b',
                year: '%b'
            }
        },
        yAxis: { // Primary yAxis
                labels: {
                    format: '{value} {{$chartData[0]->unit}}',
                    style: {
                        color: '#222'
                    }
                },
                title: {
                    text: '{{$chartData[0]->axis_label}}',
                    style: {
                        color: '#222'
                    }
                }
            },
        tooltip: {
            formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                    Highcharts.dateFormat('%e. %b', this.x) +': '+ this.y +' m';
            }
        },
        
        series: [
        <? $j=1; $countLabels = count($categoryLabels); ?>
        @foreach($categoryLabels as $key => $value)
        {
            name: '{{ $key }}',
            data: [
            	<? $totalRows = count($value); $i = 1 ?>
            	@foreach($value as $values)
            		[Date.UTC( {{ date('Y, m, d, H, i, s', strtotime($values[1])) }} ), {{$values[0]}}]
            		@if($totalRows != $i)
            		,
            		@endif
            		<? $i++; ?>
            	@endforeach
            ],
            color: colors[{{rand(0,14)}}]
        }{{ ($j++ < $countLabels)? "," : " "; }}
        @endforeach
        ]
    });
});

{{--
    #FFA963 orange
    #63b9ff blue

yAxis: {
            labels: {
                formatter: function() {
                    return this.value +' Kg';
                },
                style: {
                    color: '#89A54E'
                }
            },
            title: {
                text: 'Weight'
            },
            min: 0,

        },

    --}}

//</pre>
