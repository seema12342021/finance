
    var sparklineLogin = function() { 
       
  
        $("#spark1").sparkline([2,4,4,6,8,5,6,4,8,6,6,2 ], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#fff',
            fillColor: '#1e88e5',
            maxSpotColor: '#1e88e5',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#1e88e5'
        });
        $("#spark2").sparkline([234, 44, 333, 4442, 333 ,4444,333], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#fff',
            fillColor: '#21c1d6',
            minSpotColor:'#21c1d6',
            maxSpotColor: '#21c1d6',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#21c1d6'
        });
        $("#spark3").sparkline([0, 2045], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#fff',
            fillColor: '#ffb22b',
            maxSpotColor: '#ffb22b',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#ffb22b'
        });
        $("#spark4").sparkline([2,4,4,6,8,5,6,4,8,6,6,2], {
            type: 'line',
            width: '100%',
            height: '50',
 			lineColor: '#fff',
            fillColor: '#1e88e5',
            maxSpotColor: '#1e88e5',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#1e88e5'
        });
        $("#spark5").sparkline([2,4,4,6,8,5,6,4,8,6,6,2], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#fff',
            fillColor: '#21c1d6',
            minSpotColor:'#21c1d6',
            maxSpotColor: '#21c1d6',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#21c1d6'
        });
        $("#spark6").sparkline([0, 5678], {
            type: 'line',
            width: '100%',
            height: '50',
           lineColor: '#fff',
            fillColor: '#ffb22b',
            maxSpotColor: '#ffb22b',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#ffb22b'
        });
        $('#sparklinedash').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#26c6da'
        });
         $('#sparklinedash2').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
          $('#sparklinedash3').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#03a9f3'
        });
           $('#sparklinedash4').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '50',
            barWidth: '2',
            resize: true,
            barSpacing: '5',
            barColor: '#f62d51'
        });
       
   }
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
