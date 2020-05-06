// Bar Chart


// Width and Height of SVG
var svgWidth = d3.select('#chart-work').style('width').slice(0, -2) - 50;
var svgHeight = d3.select('#chart-work').style('height').slice(0, -2) - 50;

d3.select('#chart-work').append('svg')
    .attr('width',svgWidth)
    .attr('height',svgHeight)
    .style('display','display: inline-block');

var svg = d3.select('#chart-work svg');

var yScale = d3.scaleLinear()
    .domain([0, 100])
    .range([svgHeight - 75, 0]);

var xScale = d3.scaleBand()
    .domain(types)
    .range([0, svgWidth - 50]);

var colors = d3.scaleLinear()
    .domain([0, percentage.length])
    .range(['#001244','#EAD9D9']);

// Axes

var xAxis = d3.axisBottom()
    .scale(xScale);

var xScale = d3.scaleBand()
    .domain(d3.range(0, percentage.length))
    .range([0, svgWidth]);

var yAxis = d3.axisLeft()
    .scale(yScale);

// Y-Axis
svg.append('g')
    .attr('transform', 'translate(50,50)')
    .call(yAxis);

// X-Axis
var xAxisTranslate = svgHeight - 20;

svg.append('g')
    .attr('transform', 'translate(50,' + (xAxisTranslate - 5) + ')')
    .attr('id','x-axis')
    .call(xAxis);

// Render

width = svgWidth - 50;
height = xAxisTranslate;

var widthScale = d3.scaleBand()
    .domain(d3.range(0, percentage.length))
    .range([0, width]);

svg.append('svg')
    .attr('id','bar-render')
    .attr('width', width)
    .attr('height', height - 5)
    .attr('x', 51 + 20)
    .style('background', 'white')
    .selectAll('rect')
        .data(percentage)
        .enter().append('rect')
            .style('fill',(d,i) => colors(i))
            .attr('width', widthScale.bandwidth() - 40)
            .attr('height', (d) => 0)
            .attr('x', (d,i) => widthScale(i))
            .attr('y', (d) => height)
            .transition().duration(2000).ease(d3.easePoly)
                .delay(function(d,i) { return i * 200 })
                .attr('height', (d) => height - yScale(d) + - 45)
                .attr('y', (d) => yScale(d) + 50);
                

svg.select('#bar-render').selectAll('text')
    .data(percentage)
    .enter().append('text')
        .text(function(d) {
            return 0;
        })
        .attr('x', (d,i) => widthScale(i) + (widthScale.bandwidth() / 2) - 20)
        .attr('y', height - 10)
        .attr('fill',"black")
        .attr('text-anchor','middle')
        .transition().duration(2000).ease(d3.easePoly)
            .delay(function(d,i) { return i * 200 })
            .attr('y', (d) => yScale(d) + 40)
            .tween('text', function(d) {
                var element = this;
                var i = d3.interpolate(0, d);
                return function(t) {
                    d3.select(element).text(i(t).toFixed(2) + "%");
                };
            });

svg.selectAll("#x-axis g text")
    .style("font-size","16px");

    // Add title
svg.append("text")
    .attr("x", (svgWidth / 2))             
    .attr("y", 30)
    .attr("text-anchor", "middle")  
    .style("font-size", 22) 
    .text("Alumni in Economic Sectors");




