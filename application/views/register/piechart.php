<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>





<?php 
//echo '<pre>';
//print_r($my_investors);

        $totalamount=0;
        $others_amount=0;
        $investorshare='';
        for($i=0;$i<sizeof($my_investors);$i++)
        {
            $totalamount+=$my_investors[$i]->amount;
            $amount[$i]=$my_investors[$i]->amount;
            $firstname[$i]=$my_investors[$i]->firstname;
            //echo sizeof($my_investors);
            if($i<=4)
            {
                $data[$i]="['".$firstname[$i]."',".$amount[$i]."]";
                $investorshare.=$data[$i].',';
            }
            if(sizeof($my_investors)>5 && $i>4)
            {
                $others_amount+=$my_investors[$i]->amount;
                
                
            }
            
        }
        $investorshare.="['Others',".$others_amount."]";
        //echo $others_amount;
        //echo $investorshare;
        //exit(); 
                    
            
?>
<?php //echo $firstname[0];?>
<?php //echo $amount[1];?>


<div id="container" style="min-width: 510px; height: 400px; max-width: 700px; margin: 0 auto"></div>
<script>
$(function () {
        
        // Radialize the colors
        Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
            return {
                radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        });
        
        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false            },
            title: {
                text: 'Browser market shares at a specific website, 2014'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    <?php echo $investorshare;?>
                    //['Others',   0.7]
                ]
                /*      data: [
                    ['Firefox',   45.0],
                    ['IE',       26.8],
                    {
                        name: 'Chrome',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Safari',    8.5],
                    ['Opera',     6.2],
                    ['Others',   0.7]
                ]*/
            }]
        });
    });
    
 </script>
<?php $this->load->view('common/footer');?>




