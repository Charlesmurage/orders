<?php
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use miloschuman\highcharts\Highcharts;

use backend\models\Items;
use backend\models\OrderItem;

/* @var $this yii\web\View */

$this->title = 'Dashboard';

/*
 [
         ['type' => 'column','name' => 'Apple', 'data' => [1]],
         ['type' => 'column', 'name' => 'Orange', 'data' => [5]]
]
*/
$data = [];
$data2 = [];
$items = Items::find()->all();
$days = 7;
$today = Date('Y-m-d'); // 2019-09-10
$range_days = range(0,7, 1);

$dates = [];
for ($i = 0; $i < $days; $i++) {
    $dates[] = date('Y-m-d', strtotime("-$i days"));
}

foreach($items as $item){
    $sales = OrderItem::find()->where(['item_id' => $item->id])->count();
    $data[] = [
        'type' => 'column',
        'name' => $item->name,
        'data' => [
            (int) $sales
        ],
    ];
    // historical sales
    $historical_sales = [];
    foreach($dates as $date) {
        // 2019-09-13
        $sale = OrderItem::find()->where(['item_id' => $item->id])
        ->andWhere('DATE(created_at) =' .new \yii\db\Expression('DATE("'. $date.'")'))
        ->count();
        $historical_sales[] = (int) $sale;
    };
    $data2[] = [
        'type' => 'spline',
        'name' => $item->name,
        'data' => $historical_sales,
    ];

};

?>
<div class="site-index">
    <div class="body-content">

        <!-- <div class="row">
            
            <div class="col-lg-4">
            <div class="card">
            <h4><b>ADD ITEMS</b></h4> 
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAABlBMVEX///8AAABVwtN+AAAA70lEQVR4nO3PwQnAIADAQN1/aSco9SEY5G6CZAwAgE9z0+3OX0ZqjNQYqTFSY6TGSI2RGiM1RmqM1BipMVJjpMZIjZEaIzVGaozUGKkxUmOkxkiNkRojNUZqjNQYqTFSY6TGSI2RGiM1RmqM1ARGdhNKjNQYqTFSY6TGSI2RGiM1RmqM1BipMVJjpMZIjZEaIzVGaozUGKkxUvP2yBmBhDOM1BipMVJjpMZIjZEaIzVGaozUGKkxUmOkxkiNkRojNUZqjNQYqTFSY6TGSI2RGiM1RmqM1BipMVJjpMZIjZEaIzVGaozUGKl5ZgQAuGgBSyEyAZIszUAAAAAASUVORK5CYII=" alt="Avatar" style="width:100% ">
            
                
                
                </div>
                <p><a class="btn btn-default" href="<?= Url::to(['items/index']) ?>">Add Items &raquo;</a></p>
            </div>
            <div class="col-lg-4">
            <h4><b>ORDERS</b></h4> 

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="<?= Url::to(['order/index']) ?>">View Orders &raquo;</a></p>
            </div>
            <div class="col-lg-4">
            <div class="card">
            <h4><b>USERS</b></h4> 
            <img src="data:image/png;base64,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" alt="Avatar" style="width:100% ">
            
                
                
                </div>

                <p><a class="btn btn-default" href="<?= Url::to(['user/index']) ?>">View Users &raquo;</a></p>
            </div>
        </div>
-->

<?php
echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Total Orders'],
      'xAxis' => [
         'categories' => ['Items']
      ],
      'yAxis' => [
         'title' => ['text' => 'Sales']
      ],
      'series' => $data,
   ]
]);
?>
<?='<br>'?>
<?php
echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Weekly Insights'],
      'xAxis' => [
         'categories' => $dates,
      ],
      'yAxis' => [
         'title' => ['text' => 'Sales']
      ],
      'series' =>  $data2,
   ]
]);
?>

    </div> 
</div>
