// Dot Plot


// Width and Height of SVG
var svgWidth = d3.select('#plot-months').style('width').slice(0, -2);
var svgHeight = d3.select('#plot-months').style('height').slice(0, -2);

var xFormat = "%Y-%m-%d";

var svg = d3.select("#plot-months")
    .append('svg')
        .attr("width", svgWidth - 50)
        .attr("height", svgHeight)
    .append("g")
        .attr("transform","translate(0,0)");

minDate = Date.parse(minRange);
maxDate = Date.parse(maxRange);

let ids = dateData.map(dateData => dateData.id);
//let gradDates = dateData.map(dateData => dateData.grad_date);
//let employDates = dateData.map(dateData => dateData.employ_date);
//let datesAll = gradDates.concat(gradDates,employDates)

var y = d3.scaleBand()
    .domain(ids)
    .range([0,svgHeight - 200]);

var x = d3.scaleTime()
    .domain([minDate, maxDate])
    .range([0,svgWidth - 150]);

var g = svg.append("g")
    .attr('transform','translate(0,0)');

g.append("g")
    .attr('transform','translate(70,' + (svgHeight - 130) + ')')
    .call(d3.axisBottom(x).tickFormat(d3.timeFormat(xFormat)))
    .selectAll("text")
        .attr('transform','translate(20,30)rotate(60)')
g.append("g")
    .attr('transform','translate(70,70)')
    .call(d3.axisLeft(y));

var line = d3.line()
    .x(function(d, i) {
        return x(i);
    })
    .y(function(d) {
        return y(d);
    });

// Lines
svg.selectAll("myline")
    .data(dateData)
    .enter().append("line")
        .attr("x1", function(d) { return x(Date.parse(d.grad_date)); })
        .attr("x2", function(d) { return x(Date.parse(d.employ_date)); })
        .attr("y1", function(d) { return y(d.id); })
        .attr("y2", function(d) { return y(d.id); })
        .attr('transform','translate(70,' + (80 + (80/y.domain().length)) + ')')
        .attr("stroke", "grey")
        .attr("stroke-width", "2px")

console.log(y.domain().length*10);

// Circles of variable 1
svg.selectAll("mycircle")
    .data(dateData)
    .enter()
    .append("circle")
        .attr("cx", function(d) { return x(Date.parse(d.grad_date)); })
        .attr("cy", function(d) { return y(d.id); })
        .attr("r", "6")
        .attr('transform','translate(70,' + (80 + (80/y.domain().length)) + ')')
        .style("fill", "#9AA4C0");

svg.selectAll("mycircle")
    .data(dateData)
    .enter()
    .append("circle")
        .attr("cx", function(d) { return x(Date.parse(d.employ_date)); })
        .attr("cy", function(d) { return y(d.id); })
        .attr("r", "6")
        .attr('transform','translate(70,' + (80 + (80/y.domain().length)) + ')')
        .style("fill", "#0E2562");

var labels = ['Graduation Date','Employment Date'];

var legendG = svg.append('g')
    .attr('transform', 'translate(100,' + (svgHeight - 50) + ')')
    .attr('class', 'legend')

legendG.append('circle')
    .attr("r", 6)
    .attr('fill',  "#9AA4C0");
legendG.append('circle')
    .attr('transform', 'translate(200,0)')
    .attr("r", 6)
    .attr('fill',  "#0E2562");

legendG.append("text") // add the text
    .text("Graduation Date")
    .style("font-size", 14)
    .attr("y", 5)
    .attr("x", 15);
legendG.append("text") // add the text
    .text("Employment Date")
    .style("font-size", 14)
    .attr("y", 5)
    .attr("x", 215);

// Add title
svg.append("text")
    .attr("x", (svgWidth / 2))             
    .attr("y", 40)
    .attr("text-anchor", "middle")  
    .style("font-size", 22) 
    .text("Graduation to Employment Duration");
