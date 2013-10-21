//<pre>

{{--var_dump($categoryLabels)--}}



$(function () {
    $('#chart1').highcharts({
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
        yAxis: {
            title: {
                text: 'Shit son you need a label'
            },
            min: 0
        },
        tooltip: {
            formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                    Highcharts.dateFormat('%e. %b', this.x) +': '+ this.y +' m';
            }
        },
        
        series: [
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
        }
        @endforeach
        ]
    });
});

//</pre>
