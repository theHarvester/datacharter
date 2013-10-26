//<pre>

{{--var_dump($categoryLabels)--}}



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
        yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value}°C',
                    style: {
                        color: '#89A54E'
                    }
                },
                title: {
                    text: 'Temperature',
                    style: {
                        color: '#89A54E'
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Rainfall',
                    style: {
                        color: '#4572A7'
                    }
                },
                labels: {
                    format: '{value} mm',
                    style: {
                        color: '#4572A7'
                    }
                },
                opposite: true
            }],
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
            ]
        }{{ ($j++ < $countLabels)? "," : " "; }}
        @endforeach
        ]
    });
});

{{--
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
