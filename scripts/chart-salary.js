// Pie Chart
var labels = ['Less than $20K', '$20K - $30K', '$30K - $40K', '$40K - $50K', '$50K - $60K', 'More than $60K'];

// Width and Height of SVG
var svgWidth = d3.select('#chart-salary').style('width').slice(0, -2);
var svgHeight = 600;

d3.select('#chart-salary').append('svg')
    .attr('width',svgWidth)
    .attr('height',svgHeight)
    .style('display','display: inline-block');

// Set SVG
var svg = d3.select('#chart-salary svg')

var radius = Math.min(svgWidth,svgHeight) / 2 - 100;
var g = svg.append('g').attr('transform', "translate(" + svgWidth / 2 + "," + svgHeight / 2 + ")");

var color = d3.scaleLinear()
    .domain([0, salary.length])
    .range(['#3353FF','#FF0000']);

// Generate pie
var pie = d3.pie()
    .sort(null)
    .startAngle(1.1 * Math.PI)
    .endAngle(3.1 * Math.PI)

var arc = d3.arc()
    .innerRadius(0)
    .outerRadius(radius);

//Generate groups
var arcs = g.selectAll("arc")
    .data(pie(salary))
    .enter()
    .append("g")
    .attr("class", "arc")

arcs.append("path")
    .style('fill', function(d,i) { return color(i); })
    .transition().delay(function(d,i) {
        return i * 300;
    })
    .duration(400).ease(d3.easeExp)
    .attrTween('d', function(d) {
        var i = d3.interpolate(d.startAngle, d.endAngle);
        return function(t) {
            d.endAngle = i(t);
            return arc(d);
        }
    })
    .transition()
    .delay(-500)
    .duration(1000).ease(d3.easeExp)
    .attrTween('d', function(d) {
        var i = d3.interpolateNumber(0, radius-70);
        return function(t) {
            var r = i(t);
            var arc = d3.arc()
                .outerRadius(radius)
                .innerRadius(r);
            return arc(d);
        };
    })

arcs.append('text')
    .attr('transform', function(d) {
        var c = arc.centroid(d);
        return "translate(" + c[0] * 2.5 +"," + c[1] * 2.2 + ")";
    })
    .data(salary)
    .text(function(d) {
        if (d === 0.00) {
            d3.select(this).attr('display','none');
        }
    })
    .style("font-size", 22)
    .attr('text-anchor', 'middle')
	.transition().duration(2000)
      .delay(0)
      .tween('text', function(d) {
        var element = this;
        var i = d3.interpolate(0, d);
        return function(t) {
            d3.select(element).text(i(t).toFixed(2));
        };
    });


var legendG = svg.selectAll('.legend')
    .data(pie(salary))
    .enter().append('g')
    .attr('transform', function(d,i) {
        return 'translate(' + (svgWidth / 12) + ',' + (i * 25 + 20) + ')';
    })
    .attr('class', 'legend');

legendG.append('circle')
    .attr("r", 10)
    .attr('fill', function(d,i) {
        return color(i);
    });

legendG.append("text") // add the text
    .text(function(d,i){
        return labels[i];
    })
    .style("font-size", 16)
    .attr("y", 5)
    .attr("x", 15);