<?php
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        
        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    '<li class="header">Menu</li>',
                    
                    ['label' => '<i class="glyphicon glyphicon-lock"></i><span>Home</span>', 'url' => ['/site/index']],

                    [
                        'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sign in</span>', //for basic
                        'url' => ['/site/login'],
                        'visible' =>Yii::$app->user->isGuest
                    ],
                ],
            ]
        );
        ?>

         <ul class="sidebar-menu">
             
<!--             <li class="treeview">
                <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">
                    <i class="fa fa-share"></i> <span>Home</span> 
                </a>
            </li>
            -->
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>advertisment </span><i class="fa fa-angle-left pull-right"></i> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['advertisement/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Advertisment</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['commercial-search-ads/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Ads on Search</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['commercial-ads/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Commercial Ads</a>
                    </li>
                   
                </ul>
            </li>
            
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Admin </span><i class="fa fa-angle-left pull-right"></i> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['admin/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Admins</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['user/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Users</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['organization/view', 'id'=>1]) ?>"><span class="glyphicon glyphicon-lock"></span>Organizational info</a>
                    </li>
                   
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Category </span><i class="fa fa-angle-left pull-right"></i> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['category/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Category</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['filter-name/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Filter Name</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['filter-name/filter-details']) ?>"><span class="glyphicon glyphicon-lock"></span> Filter Details</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['optional-fields/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Opetional Fields</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['credit-packages/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Credit Packages</a>
                    </li>
                     
                </ul>
            </li>
            
            
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Regions</span><i class="fa fa-angle-left pull-right"></i> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['country/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Country</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['region/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Regions</a>
                    </li>
                     <li><a href="<?= \yii\helpers\Url::to(['city/index']) ?>"><span class="glyphicon glyphicon-lock"></span> City</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['postcode/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Postcodes</a>
                    </li>
                   
                </ul>
            </li>
  
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Content</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['content/index']) ?>"><span class="glyphicon glyphicon-lock"></span> Pages and Content</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['content-inner/index']) ?>"><span class="fa fa-dashboard"></span> Content in Side Page</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['promotion-deals/index']) ?>"><span class="fa fa-dashboard"></span> Promotion Deals</a>
                    </li>

                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>News-Letter</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/newsletter']) ?>"><span class="glyphicon glyphicon-lock"></span>Newsletter</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['newsletter/sendmail']) ?>"><span class="fa fa-dashboard"></span>Send Newsletter</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['newsletter/history']) ?>"><span class="fa fa-dashboard"></span>History</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['newsletter-subscription/index']) ?>"><span class="fa fa-dashboard"></span>Subscribers</a>
                    </li>

                </ul>
            </li>
        </ul>

    </section>

</aside>
