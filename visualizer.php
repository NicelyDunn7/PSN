<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        //If the user is not logged in, redirect to the login page
        session_start();
        if(strcmp($_SESSION['type'],'user') !== 0 && strcmp($_SESSION['type'],'business') !== 0){
                header('Location: index.php');
        }

        //Connect to the database through the automated script
        include 'controllers/dbcreds.php';

        //Using the user's userid fetch the university they attended
        $userid = $_SESSION['user_id'];
        $getUniversity = "SELECT University FROM User WHERE User_Id='$userid' LIMIT 1;";
        $result = mysqli_fetch_array(mysqli_query($link, $getUniversity));
        $university = $result['University'];

        //Using the user's university fetch the number of employed graduates
        $getEmployed = "SELECT COUNT(Employed) as employed FROM User WHERE UniCompleted='y' AND Employed='y' AND University='$university';";
        $result = mysqli_fetch_assoc(mysqli_query($link, $getEmployed));
        $employed = $result['employed'];

        //Using the user's university fetch the number of unemployed graduates
        $getUnemployed = "SELECT COUNT(Employed) as unemployed FROM User WHERE UniCompleted='y' AND Employed='n' AND University='$university';";
        $result = mysqli_fetch_assoc(mysqli_query($link, $getUnemployed));
        $unemployed = $result['unemployed'];

        $graduates = $employed + $unemployed;

        mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
    <title>PSN</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="jumbotron-container">
    <div class="jumbotron">
        <div class="header"><?php echo "$university" ?></div>
        <div class="header">Employment Rate</div>
        <div id="chart" class="chart-container"></div>
    </div>
</div>
<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script>
var dataset = [
    { name: 'Employed', percent: <?php echo number_format($employed/$graduates*100, 2) ?> },
    { name: 'Unemployed', percent: <?php echo number_format($unemployed/$graduates*100, 2) ?> },
];

var pie=d3.layout.pie()
  .value(function(d){return d.percent})
  .sort(null)
  .padAngle(.03);

var w=300,h=300;

var outerRadius=w/2;
var innerRadius=100;

var color = d3.scale.category10();

var arc=d3.svg.arc()
  .outerRadius(outerRadius)
  .innerRadius(innerRadius);

var svg=d3.select("#chart")
  .append("svg")
  .attr({
      width:w,
      height:h,
      class:'shadow'
  }).append('g')
  .attr({
      transform:'translate('+w/2+','+h/2+')'
  });
var path=svg.selectAll('path')
  .data(pie(dataset))
  .enter()
  .append('path')
  .attr({
      d:arc,
      fill:function(d,i){
          return color(d.data.name);
      }
  });

path.transition()
  .duration(1000)
  .attrTween('d', function(d) {
      var interpolate = d3.interpolate({startAngle: 0, endAngle: 0}, d);
      return function(t) {
          return arc(interpolate(t));
      };
  });


var restOfTheData=function(){
    var text=svg.selectAll('text')
        .data(pie(dataset))
        .enter()
        .append("text")
        .transition()
        .duration(200)
        .attr("transform", function (d) {
            return "translate(" + arc.centroid(d) + ")";
        })
        .attr("dy", ".4em")
        .attr("text-anchor", "middle")
        .text(function(d){
            return d.data.percent+"%";
        })
        .style({
            fill:'#fff',
            'font-size':'10px'
        });

    var legendRectSize=20;
    var legendSpacing=7;
    var legendHeight=legendRectSize+legendSpacing;


    var legend=svg.selectAll('.legend')
        .data(color.domain())
        .enter()
        .append('g')
        .attr({
            class:'legend',
            transform:function(d,i){
                //Just a calculation for x & y position
                return 'translate(-35,' + ((i*legendHeight)-65) + ')';
            }
        });
    legend.append('rect')
        .attr({
            width:legendRectSize,
            height:legendRectSize,
            rx:20,
            ry:20
        })
        .style({
            fill:color,
            stroke:color
        });

    legend.append('text')
        .attr({
            x:30,
            y:15
        })
        .text(function(d){
            return d;
        }).style({
            fill:'lightgrey',
            'font-size':'14px'
        });
};

setTimeout(restOfTheData,1000);
</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<link href="jumbotron.css" rel="stylesheet">
<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
<style>
body {
    background-color: #222D3A;
    width: 100%;
    font-family: 'Roboto', sans-serif;
    height: 100%;
}

table {
    height: 61px;
}

button.nav-btn {
    margin-top: auto;
}

#nav-button4{
    margin-bottom: 0px;
}

#search-bar{
    margin-top: auto;
}

div.jumbotron {
    margin-top: 10%;
    margin-right: auto;
    margin-left: auto;
}

.jumbotron {
    /*margin: 0 auto;
    width:350px;
    margin-top:0px;*/
    margin: 10% auto 0px auto;
    width:350px;
    background-color: black;
    border-radius: 5px;
    box-shadow: 0px 0px 1px 0px #06060d;
}

.header{
    background-color: #black;
    height:40px;
    color:lightgrey;
    text-align: center;
    line-height: 40px;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    font-weight: 400;
    font-size: 1.5em;
    text-shadow: 1px 1px #06060d;
}

#chart {
    width: 330px;
    margin-left: auto;
    margin-right: auto;
}

.chart-container{
    padding:15px;
}

.shadow {
    -webkit-filter: drop-shadow( 0px 3px 3px rgba(0,0,0,.5) );
    filter: drop-shadow( 0px 3px 3px rgba(0,0,0,.5) );
}
</style>
</body>
</html>
