
root = d3.csvParse(root);

var svgWidth = d3.select('#chart-cluster').style('width').slice(0, -2);
var svgHeight = d3.select('#chart-cluster').style('height').slice(0, -2);

d3.select('#chart-cluster').append('svg')
    .attr('width',svgWidth)
    .attr('height',svgHeight)
    .style('display','display: inline-block');

var svg = d3.select('#chart-cluster svg')
var g = svg.append("g")
    .attr("transform", "translate(" + (svgWidth / 2 - 100) + "," + (svgHeight / 2 - 50) + ")")
    .attr('id','cluster');

var stratify = d3.stratify()
    .parentId(function (d) {
        return d.id.substring(0, d.id.lastIndexOf("."));
    });

var tree = d3.cluster()
    .size([200, 200])
    .separation(function (a, b) {
        return (a.parent == b.parent ? 1 : 2) / a.depth;
    });


var root = tree(stratify(root)
    .sort(function (a, b) {
        return (a.height - b.height) || a.id.localeCompare(b.id);
    }));

var link = g.selectAll(".link")
    .data(root.descendants().slice(1))
    .enter().append("path")
    .attr("class", "link")
    .attr("d", function (d) {
        return "M" + project(d.x, d.y) +
            "C" + project(d.x, (d.y + d.parent.y) / 2) +
            " " + project(d.parent.x, (d.y + d.parent.y) / 2) +
            " " + project(d.parent.x, d.parent.y);
    });

var node = g.selectAll(".node")
    .data(root.descendants())
    .enter().append("g")
    .attr("class", function (d) {
        return "node" + (d.children ? " node--internal" : " node--leaf");
    })
    .attr("transform", function (d) {
        return "translate(" + project(d.x, d.y) + ")";
    });

node.append("circle")
    .attr("r", function(d,i) {
        if (i === 0)
            return 3.6;
        else
            return 2.6;
    });

node.append("text")
    .attr("x", function (d) {
        return d.x < 180 === !d.children ? 6 : -6;
    })
    .style("text-anchor", function (d) {
        return d.x < 180 === !d.children ? "start" : "end";
    })
    .attr("transform", function (d) {
        return "rotate(" + (d.x < 180 ? d.x - 90 : d.x + 90) + ")";
    })
    .style("font-size","12px")
    .style("font-weight", function(d,i) {
        if (i === 0)
            return "bold"
        else 
            return "normal";
    })
    .text(function (d) {
        return d.id.substring(d.id.lastIndexOf(".") + 1);
    });

function project(x, y) {
    var angle = (x - 90) / 180 * Math.PI,
        radius = y;
    return [radius * Math.cos(angle), radius * Math.sin(angle)];
}
