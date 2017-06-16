<?php
use yii\helpers\Html;

$this->title = 'Graph';
$this->params['breadcrumbs'][] = ['label' => 'Traffic', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<h1>Graph</h1>

<div id= 'container' class = "traffic-graph" style= "width:100%; height:400px">
    <script>
        $(function () { 
            var myChart = Highcharts.chart('container', {
                chart: {
                type: 'line'
                },
                title: {
                    text: 'Website Traffic'
                },
                xAxis: {
                	title: {
                		text: 'Weeks'
                	},
                    categories: [
                    	<?php
							for( $i=0; $i<count($model); $i++){
								echo '\'';
								echo Html::encode("{$model[$i]->week}");
	 							echo '\'';
	 							echo ',';
	 						}
	 					?>]
                },
                yAxis: {
                    title: {
                    text: 'Traffic'
                }
            },
            series: [{
                name: 'Traffic',
                data: [<?php
							for( $i=0; $i<count($model); $i++){
								echo Html::encode("{$model[$i]->traffic}");
	 							echo ',';
	 						}
	 					?>]
            }]
        });
    });

    </script>