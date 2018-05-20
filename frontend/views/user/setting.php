<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Dropdown;
use backend\models\Advertisement;
use frontend\models\Messages;
use kartik\widgets\FileInput;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<main>

<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 account-settings-wrap">

  <div class="container">

    <h2 id="setting" class="">Account Settings</h2>

    <p id="ad_heading" class="">Here you can change your account settings</p>

    <!-- Nav tabs -->

    <?php // if (isset($_GET['unactive-page']) || isset($_GET['active-page'])|| isset($_GET['moderate-page'])) {echo 'class="active"'; $set_tab=1; } ?>

    <div class="card">

        <?php $set_tab=0; ?>

      <ul class="nav nav-tabs" role="tablist">

          <li id="ads_tab" role="presentation" <?php if(isset($_GET['ads'])) { echo 'class="active"'; } ?> ><a onclick="adLabel()"href="#ads" aria-controls="ads" role="tab" data-toggle="tab">Ads</a></li>

         <li  id="msg_tab" role="presentation" <?php if(isset($_GET['message'])) { echo 'class="active"'; } ?>><a onclick="messagesLabel()" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>

         <li  id="setting_tab" role="presentation" <?php if(isset($_GET['setting'])) { echo 'class="active"'; } ?>><a onclick="settingLabel()" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>

         <?php if ($company_user->is_company==1){?>

          <li role="presentation"><a onclick="companyUserLabel()" href="#companyusers" aria-controls="companyusers" role="tab" data-toggle="tab">Company Users</a></li>

         <?php }?>

     <li role="presentation" <?php if(isset($_GET['credits'])) { echo 'class="active"'; } ?>><a onclick="creditLabel()" href="#purchase" aria-controls="settings" role="tab" data-toggle="tab">Credit for Ads</a></li>

         

      </ul>



      <!-- Tab panes -->

      <div class="tab-content">

            <div class="tab-pane account-ads-wrap <?php if(isset($_GET['ads'])) { echo 'active'; } ?>" role="tabpanel" id="ads">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 account-ads-nav">

            <ul> 

              <li class="active-tab <?php if (isset($_GET['active-page'])) { echo 'active'; } ?> "><a id="active_id" href="#active" aria-controls="active" role="tab" data-toggle="tab"> Active (<?php echo $active_ads;?>)</a></li>
              <li class="active-tab <?php if (isset($_GET['unactive-page'])) { echo 'active'; } ?>"><a id="unactive_id" href="#inactive" aria-controls="inactive" role="tab" data-toggle="tab"> Unactive (<?php echo $inactive_ads;?>)</a></li>
              <li class="active-tab <?php if (isset($_GET['moderate-page'])) { echo 'active'; } ?>"><a id="moderate_id" href="#moderate" aria-controls="moderate" role="tab" data-toggle="tab"> Moderate (<?php echo $rejected_ads;?>)</a></li>
              <li class="active-tab <?php if (isset($_GET['pending-page'])) { echo 'active'; } ?>"><a id="pending_id" href="#pending" aria-controls="pending" role="tab" data-toggle="tab"> Pending (<?php echo $pending_ads;?>)</a></li>

            </ul>

              <form class="account-msg-search" role="search" onsubmit="return false;">

                  <input id="ad_search_id" type="text" class="form-control" placeholder="Search" value="">

                  <input id="search_hidden" type="hidden" class="form-control" placeholder="Search" value="1">

                 

              </form>

          </div>

          <div class="tab-content">

<!--             account-ads-blank 

            <div style="display:none;" class="account-ads-blank">

              <span><img src="template/img/no-ads-img.png"></span>

              <p>You don't have active Ads. Place an ad now!</p>

              <a class="btn-submit-ad" href="#"> <i class="fa fa-plus"></i> Submit an Ad</a>

            </div>

             /account-ads-blank -->



            <!-- table-responsive -->

<!--            <h3>Active Ads</h3>-->

            <div class="tab-pane account-msg-wrap <?php if ((!isset($_GET['unactive-page'])) && (!isset($_GET['moderate-page']))) { echo 'active'; } ?>" role="tabpanel" id="active">

              <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>

                    <th class="sort-list">Ad Title</th>

                    <th>Price</th>

                    

                    

                    <th>Status</th>



                    </thead>

                        <tbody id="active_advert">

                            <?php   

                            //print_r($advert_data);

                             if(!empty($advert_active)){

                            foreach($advert_active as $ad_data){

                                 if($ad_data->ad_status==1 && $ad_data->status==1)

                                     {

                                $full_date = date_parse($ad_data['created_date']);

                                        $day = $full_date['day'];

                                        $month = $full_date['month'];

                                        $year = $full_date['year'];

                                        

                                        $hour = $full_date['hour'];

                                        $minute = $full_date['minute'];

                                        

                                        $date_in_format = $day . ", " . $month . ", " . $year;

                                        $time_in_format = $hour . ":" . $minute

                                                

                                                ?>

                                

                            <tr>

                                <td><input type="checkbox" class="checkthis" /></td>

                                <td><?php echo $date_in_format . '<br>To: ' .$time_in_format?></td>

                                <td class="tbl-ad-dtl">

                                <span><?php echo $ad_data['advertise_title']; ?> </span>

                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/ad-view')?>&id=<?= $ad_data->id ?>"><i class="fa fa-external-link"></i> Preview</a>
                                <a id="<?= $ad_data->id ?>" href="#" onclick="copy_this(this)"><i class="fa fa-external-link"></i> Copy</a>

                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/edit-ad')?>&id=<?= $ad_data->id ?>"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                <a class="red" href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/delete')?>&id=<?= $ad_data->id;?>&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a> 
                                
                                <?php if($ad_data->sold_status==0){ ?>
                                <button id="makas<?=$ad_data->id?>" onclick="mark_sold(<?= $ad_data->id; ?>)" class="red btn_styl" href="#"><i class="fa fa-times"></i> Mark Sold</button>
                                <?php }else{?>
                                <a href="" class="btn_stylrd"><i class="fa fa-external-link"></i> Sold</a>
                                    <?php
                                }?>
                                
                                        </td>
                                <td><?php echo "<span style='color: green'><b>NOK</b></span> ".$ad_data['price']?> </td>

                               

                                

                                <?php 

                                if($ad_data->status==2){ ?>

                                <td>  <button type="button" class="btn btn-danger disabled"><i class="fa fa-arrow-down"></i>Rejected</button></td>

                             <?php   }else{

                                 

                            

                                if($ad_data->status==0){?>

                                <td><a href="#" class="btn btn-warning"><i class="fa fa-heartbeat "></i> Pending for review</a></td>

                                <?php } 

                                

                                else { if($ad_data->ad_status==1){?>

                                <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-danger"><i class="fa fa-arrow-down"></i> In-Active</a></td>

                                <?php } else {?>

                                 <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-primary"><i class="fa fa-arrow-up"></i> Active</a></td>

                                <?php } }  }?>

                                        </tr>

                                       

                            <tr>

                                <td colspan="2" class="ad-statistics-ttl">Statistics:</td>

                                <td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: <?=$ad_data['views']?></td>

                            </tr>

                            

                            <?php } }}?>

                                <tr><td colspan="6">

                                <nav class="text-right">



<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination_advert_active]); ?>

                    </nav></td></tr> 

                        </tbody>  



                </table>

              </div>

            </div>

            

             <div class="tab-pane account-msg-wrap <?php if (isset($_GET['unactive-page'])) { echo 'active'; } ?>" role="tabpanel" id="inactive">

                 <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>

                    <th class="sort-list">Ad Title</th>

                    <th>Price</th>

                    

                    

                    <th>Status</th>



                    </thead>

                        <tbody id="unactive_advert">

                            <?php 

                             if(!empty($advert_data_unactive)){

//                                 exit();

                            foreach($advert_data_unactive as $ad_data){ 

                                if($ad_data->ad_status==0){

                                $full_date = date_parse($ad_data['created_date']);

                                        $day = $full_date['day'];

                                        $month = $full_date['month'];

                                        $year = $full_date['year'];

                                        

                                        $hour = $full_date['hour'];

                                        $minute = $full_date['minute'];

                                        

                                        $date_in_format = $day . ", " . $month . ", " . $year;

                                        $time_in_format = $hour . ":" . $minute

                                                

                                                ?>

                                

                            <tr>

                                <td><input type="checkbox" class="checkthis" /></td>

                                <td><?php echo $date_in_format . '<br>To: ' .$time_in_format?></td>

                                <td class="tbl-ad-dtl">

                                    <span><?php echo $ad_data['advertise_title']; ?> </span>

                                    <a href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/Fad-view')?>&id=<?= $ad_data->id ?>"><i class="fa fa-external-link"></i> Preview</a>

                                    <a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/edit-ad')?>&id=<?= $ad_data->id ?>"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                    <a class="red" href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/delete')?>&id=<?= $ad_data->id;?>&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a> 

                                </td>

                                

                                <td><?php echo "<span style='color: green'><b>NOK</b></span> " .$ad_data['price']?> </td>

                               

                                

                                <?php 

                                if($ad_data->status==2){ ?>

                                <td>  <button type="button" class="btn btn-danger disabled"><i class="fa fa-arrow-down"></i>Rejected</button></td>

                             <?php   }else{

                                 

                            

                                if($ad_data->status==0){?>

                                <td><a href="#" class="btn btn-warning"><i class="fa fa-heartbeat "></i> Pending for review</a></td>

                                <?php } else { if($ad_data->ad_status==1){?>

                                <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-danger"><i class="fa fa-arrow-down"></i> In-Active</a></td>

                                <?php } else {?>

                                 <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-primary"><i class="fa fa-arrow-up"></i> Active</a></td>

                                <?php } }  }?>

                            </tr>

                                       

                            <tr>

                                <td colspan="2" class="ad-statistics-ttl">Statistics:</td>

                                <td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: <?= $ad_data->views ?></td>

                            </tr>

                            

                            <?php }} }?>

                                  <tr><td colspan="6">

                                <nav class="text-right">



<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination_advert_unactive]); ?>

                    </nav></td></tr>

                        </tbody>  



                </table>

              </div>

             </div>

               <div class="tab-pane account-msg-wrap <?php if (isset($_GET['moderate-page'])) { echo 'active'; } ?>" role="tabpanel" id="moderate">

                 <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>

                    <th class="sort-list">Ad Title</th>

                    <th>Price</th>

                    

                    

                    <th>Status</th>



                    </thead>

                        <tbody id="moderate_advert">

                           

                            <?php

                             if(!empty($advert_data_moderate)){

          

                            foreach($advert_data_moderate as $ad_data){ 

                                if($ad_data->status==2){

                                $full_date = date_parse($ad_data['created_date']);

                                        $day = $full_date['day'];

                                        $month = $full_date['month'];

                                        $year = $full_date['year'];

                                        

                                        $hour = $full_date['hour'];

                                        $minute = $full_date['minute'];

                                        

                                        $date_in_format = $day . ", " . $month . ", " . $year;

                                        $time_in_format = $hour . ":" . $minute

                                                

                                                ?>

                                

                            <tr>

                                <td><input type="checkbox" class="checkthis" /></td>

                                <td><?php echo $date_in_format . '<br>To: ' .$time_in_format?></td>

                                <td class="tbl-ad-dtl">

                                <span><?php echo $ad_data['advertise_title']; ?> </span>

                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/ad-view')?>&id=<?= $ad_data->id ?>"><i class="fa fa-external-link"></i> Preview</a>

                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/edit-ad')?>&id=<?= $ad_data->id ?>"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                <a class="red" href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/delete')?>&id=<?= $ad_data->id;?>&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a> </td>

                                

                                <td><?php echo "<span style='color: green'><b>NOK</b></span> " .$ad_data['price']?> </td>

                               

                                

                                <?php 

                                if($ad_data->status==2){ ?>

                                <td>  <button type="button" class="btn btn-danger disabled"><i class="fa fa-arrow-down"></i>Rejected</button></td>

                             <?php   }else{

                                 

                            

                                if($ad_data->status==0){?>

                                <td><a href="#" class="btn btn-warning"><i class="fa fa-heartbeat "></i> Pending for review</a></td>

                                <?php } else { if($ad_data->ad_status==1){?>

                                <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-danger"><i class="fa fa-arrow-down"></i> In-Active</a></td>

                                <?php } else {?>

                                 <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-primary"><i class="fa fa-arrow-up"></i> Active</a></td>

                                <?php } }  }?>

                                        </tr>

                                       

                            <tr>

                                <td colspan="2" class="ad-statistics-ttl">Statistics:</td>

                                <td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: <?=$ad_data['views']?></td>

                            </tr>

                            

                            <?php }} }?>

<tr><td colspan="6">

                                <nav class="text-right">



<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination_advert_moderate]); ?>

                    </nav></td></tr>

                        </tbody>  



                </table>

              </div>

             </div>
<div class="tab-pane account-msg-wrap <?php if (isset($_GET['moderate-page'])) { echo 'active'; } ?>" role="tabpanel" id="pending">

                 <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>

                    <th class="sort-list">Ad Title</th>

                    <th>Price</th>

                    

                    

                    <th>Status</th>



                    </thead>

                        <tbody id="moderate_advert">

                           

                            <?php

                             if(!empty($advert_data_pending)){

          

                            foreach($advert_data_pending as $ad_data){ 

                                if($ad_data->status==0){

                                $full_date = date_parse($ad_data['created_date']);

                                        $day = $full_date['day'];

                                        $month = $full_date['month'];

                                        $year = $full_date['year'];

                                        

                                        $hour = $full_date['hour'];

                                        $minute = $full_date['minute'];

                                        

                                        $date_in_format = $day . ", " . $month . ", " . $year;

                                        $time_in_format = $hour . ":" . $minute

                                                

                                                ?>

                                

                            <tr>

                                <td><input type="checkbox" class="checkthis" /></td>

                                <td><?php echo $date_in_format . '<br>To: ' .$time_in_format?></td>

                                <td class="tbl-ad-dtl">

                                <span><?php echo $ad_data['advertise_title']; ?> </span>

                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/ad-view')?>&id=<?= $ad_data->id ?>"><i class="fa fa-external-link"></i> Preview</a>

                                <a href="<?php echo Yii::$app->getUrlManager()->createUrl('site/edit-ad')?>&id=<?= $ad_data->id ?>"><i class="fa fa-pencil-square-o"></i> Edit</a>

                                <a class="red" href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/delete')?>&id=<?= $ad_data->id;?>&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a> </td>

                                

                                <td><?php echo "<span style='color: green'><b>NOK</b></span> " .$ad_data['price']?> </td>

                               

                                

                                <?php 

                                if($ad_data->status==2){ ?>

                                <td>  <button type="button" class="btn btn-danger disabled"><i class="fa fa-arrow-down"></i>Rejected</button></td>

                             <?php   }else{

                                 

                            

                                if($ad_data->status==0){?>

                                <td><a href="#" class="btn btn-warning"><i class="fa fa-heartbeat "></i> Pending for review</a></td>

                                <?php } else { if($ad_data->ad_status==1){?>

                                <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-danger"><i class="fa fa-arrow-down"></i> In-Active</a></td>

                                <?php } else {?>

                                 <td id="danger<?= $ad_data->id; ?>"><a  onClick="change_status(<?= $ad_data->id; ?>)" class="btn btn-primary"><i class="fa fa-arrow-up"></i> Active</a></td>

                                <?php } }  }?>

                                        </tr>

                                       

                            <tr>

                                <td colspan="2" class="ad-statistics-ttl">Statistics:</td>

                                <td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: <?=$ad_data['views']?></td>

                            </tr>

                            

                            <?php }} }?>

<tr><td colspan="6">

                                <nav class="text-right">



<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination_advert_moderate]); ?>

                    </nav></td></tr>

                        </tbody>  



                </table>

              </div>

             </div>
            <!-- /table-responsive -->

          </div>



       </div><!-- /Tab panes -->

       <div class="tab-pane account-msg-wrap  <?php if(isset($_GET['message'])) { echo 'active'; } ?> " role="tabpanel" id="messages">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 account-ads-nav">

            <ul>

              <li class="active-tab active" id="message_inbox"><a href="#inbox" aria-controls="inbox" role="tab" data-toggle="tab"> Inbox </a></li>

              <!--<li class="active-tab"><a href="#sent" aria-controls="sent" role="tab" data-toggle="tab"> Sent...</a></li>-->

              <li class="active-tab"><a href="#archive" aria-controls="archive" role="tab" data-toggle="tab"> Archive</a></li>

              

            </ul>

            <form class="account-msg-search" role="search" onsubmit="return false;">

                <!--<input id="message_search_id" type="text" class="form-control" placeholder="Search">-->

                <input id="search_hidden_messages" type="hidden" class="form-control" placeholder="Search" value="4">

                <input id="filter" type="text" class="form-control" placeholder="Type here...">

            </form>

          </div>

           <div class="tab-content">

          <div class="tab-pane account-msg-wrap active" role="tabpanel" id="inbox">

            <!-- account-ads-blank -->

            <div style="display:none;" class="account-ads-blank">

              <span><img src="template/img/no-ads-img.png"></span>

              <p>You don't have active Ads. Place an ad now!</p>

              <a class="btn-submit-ad" href="#"> <i class="fa fa-plus"></i> Submit an Ad</a>

            </div>

            <!-- /account-ads-blank -->



            <!-- table-responsive -->

            <h3>Received messages</h3>

           

          

            <div class="table-ads-msg-wrap">

              <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th>&nbsp</th>

                    <th>User name</th>

                    <th>Ad</th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>

                    <th></th>

                    <th></th>



                  </thead>



                  <tbody class="searchable" id="index_section">

                  

<?php 

if(isset($conversation_ids)){

$i=1; foreach($conversation_ids as $tinbox)

{    

    $user = \Yii::$app->user->identity->id;

     $conv =\frontend\models\ConvStatus::find()->where(['conv_id'=>$tinbox->id, 'user_id'=>$user])->one();

       if($conv['status']==1){

       

            ?>

                    <tr>

                      <td><input type="checkbox" class="checkthis" /></td>

                      <td class="ads-msg-icon">

                        

                        <a href="#" class=""><i class="fa fa-trash-o"></i></a>

                      </td>

                      <td class="ad-msg-username"><?= explode("@", $conversation->get_name($tinbox->from))[0] ?></td>

                      <td class="ad-dtl-msg">

                          <div class="msg_detil"><?= $conversation->ad_name($tinbox->ad_id) ?></div>

                        <p><?php // echo $tinbox->message ?> </p>

                        

                      </td>

                      

                      <td><?= $conversation->last_message_date($tinbox->id) ?>

                      </td>

                      <td class="ads-msg-icon"><a title="archive" onclick="archive(<?=$tinbox->id?>)" class="" href="#"><i class="fa fa-file-archive-o"></i></a> </td>

                      <td>

                       <a onclick="readed(<?= $tinbox->id; ?>)" id="imageDivLink<?=$i?>" href="javascript:toggle5('contentDivImg<?=$i?>', 'imageDivLink<?=$i?>');"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/plus.png"></a>

                       </td>

                    

                    </tr>

         <tr>

                <td align="center" colspan="6">

                         



            <div id="contentDivImg<?=$i?>"  style="display: none;">

               <div class="conversation-wrap">

                  <ul class="conversationnew" id="answersContainer<?= $tinbox->id; ?>">

                     <li class="saying root">

                        <div class="titlebar">

                          <p>

                             <span class="pull-right time"><?= $conversation->ad_created_date($tinbox->ad_id) ?></span>

                             <a class="tdnone link" href="#" id="" target="_blank"><span><?= $conversation->ad_name($tinbox->ad_id) ?></span></a>

                          </p>

                        </div>

                        <div class="cloud br5">

                           

                           <div class="msgbar">

                              <h4 class="" id="adTitle"><?= $conversation->ad_name($tinbox->ad_id) ?></h4>

                              <a class="" href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $tinbox->ad_id]) ?>" title="web developent &amp; Web Designe" target="_blank">

                              <span class="icon inlblk mini external2">&nbsp;</span> <span class="link tdnone"><span>view</span></span>

                              </a>

                              <small class="">Ad ID: <?= $tinbox->ad_id ?></small>

                           </div>

                        </div>

                         

                     </li>

                     

                     <?php 

                      $messagelist = Messages::find()->where(['conv_id'=>$tinbox->id])->orderBy(['id' => SORT_ASC])->all();

                       $user = \Yii::$app->user->identity->id;

                      foreach($messagelist as $message){

                     ?>

                     <li class="saying root <?php if($user==$message->from){ echo"my"; }else{ echo"your"; } ?>">

                        <div class="titlebar">

                           <p>

                           <a class="tdnone link" href="#" id="" target="_blank"><span><?php if($user!=$message->from) echo explode("@", $conversation->get_name($message->from))[0]; ?></span></a>

                           <span class="pull-right time"><?= $message->created; ?></span> <?php if($user==$message->from){ echo "Your answer"; }else{ echo""; }?></p>

                        </div>

                        <div class="cloud br5">

                           <p><?= $message->message; ?></p>

                        </div>

                        <div class="statusbar"><?php if($message->to_viewed==1){ echo "seen"; }else{ echo "not seen";} ?></div>

                     </li>

                      <?php } ?>

                  </ul>

                </div>

<div class="form-group col-xs-12 chat-msg">

    <label for="pwd">Message:</label><br />

    <textarea id="msg<?=$tinbox->id?>" type="text" class="form-control"></textarea>

    <input class="hidden" id="<?=$tinbox->ad_id ?>" value="<?=$tinbox->id ?>" type="text" class="form-control">

    <br />

    <button type="button" class="btn btn-primary" onclick="msg2(<?=$tinbox->ad_id ?>, <?=$tinbox->id ?>)" value="Reply">Reply&nbsp;<i class="fa fa-reply"></i></button>

</div>



               <!-- /conversation-wrap -->

            </div>



</td>

         </tr>  

                          

<?php $i++; } }}?>

         <tr><td colspan="6"><nav class="text-right">



<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]); ?>

                    </nav></td></tr>

                                      

                  </tbody>  



                </table>

              </div>

            </div>

            <!-- /table-responsive -->

       <div id="contentDivImg" style="display: none;">

<div class="conversation-wrap">

    <ul class="conversationnew" id="answersContainer<?php //  echo $tinbox->id; ?>">

       <li class="saying root ">

            <div class="titlebar">

              <p>

                 <span class="pull-right time">31 Jan, 01:28 am</span>

                 

              </p>

            </div>

            <div class="cloud br5">

              

              <div class="msgbar">

                  <h4 class="" id="adTitle">web developent &amp; Web Designe</h4>

                 

                  <small class="">Ad ID: 819269257</small>

              </div>

            </div>

       </li>

       <li class="saying root my ">

              <div class="titlebar">

                     <a></a>

                     <p><span class="pull-right time">5 Oct, 04:06 pm</span>Your answer</p>

              </div>

              <div class="cloud br5">

                     <p>Dear Sir/Madam, Please find my CV attached. For further inquiries, please contact me via email/Phone. Best Regards</p>

              </div>

              <div class="statusbar">Seen 11 Oct</div>

       </li>

    </ul>

</div><!-- /conversation-wrap -->

          </div>

          </div>

              <div class="tab-pane account-msg-wrap" role="tabpanel" id="sent">

            <!-- account-ads-blank -->

            <div style="display:none;" class="account-ads-blank">

              <span><img src="template/img/no-ads-img.png"></span>

              <p>You don't have active Ads. Place an ad now!</p>

              <a class="btn-submit-ad" href="#"> <i class="fa fa-plus"></i> Submit an Ad</a>

            </div>

            <!-- /account-ads-blank -->



            <!-- table-responsive -->

            <h3>Sent messages</h3>

            <div class="input-group msg-sel-wrap">

              <label>Show incoming messages for:</label>

              <select class="">

                <option>Choose</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

              </select>

           </div><!-- /msg-sel-wrap-->

            <div class="input-group msg-sel-wrap-small">

              <label>Show:</label>

              <select class="">

                <option>Choose</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

                <option>Lorem ipsum dolor sit amet, consectetur</option>

              </select>

            </div><!-- /msg-sel-wrap-->

            <div class="table-ads-msg-wrap">

              <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th>&nbsp</th>

                    <th>User</th>

                    <th>Ad</th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>



                  </thead>



                  <tbody>

<?php foreach($sent as $sents)

{    

    $from=explode("@",$sendero['username']);

    $to=explode("@",$receivero['username']);

    ?>

                    <tr>

                      <td><input type="checkbox" class="checkthis" /></td>

                      <td class="ads-msg-icon">

                        <a href="#" class=""><i class="fa fa-star-o"></i></a>

                        <a href="#" class=""><i class="fa fa-trash-o"></i></a>

                      </td>

                      <td class="ad-msg-username"><?= $from[0] ?>,<?= $to[0] ?></td>

                      <td class="ad-dtl-msg">

                        <h4><?= $addse['advertise_title'] ?></h4>

                        <p><?= $sents->message ?> </p>

                      </td>

                      <td><?= $sents->created ?></td>

                    </tr>

<?php } ?>

                    

                  

                  </tbody>  



                </table>

              </div>

            </div>

            <!-- /table-responsive -->

          </div>

                 <div class="tab-pane account-msg-wrap" role="tabpanel" id="archive">

            <!-- account-ads-blank -->

            <div style="display:none;" class="account-ads-blank">

              <span><img src="template/img/no-ads-img.png"></span>

              <p>You don't have active Ads. Place an ad now!</p>

              <a class="btn-submit-ad" href="#"> <i class="fa fa-plus"></i> Submit an Ad</a>

            </div>

            <!-- /account-ads-blank -->



            <!-- table-responsive -->

           

           

            <div class="table-ads-msg-wrap">

              <div class="table-responsive">

                 <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th>&nbsp</th>

                    <th>User name</th>

                    <th>Ad</th>

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>

                    <th></th>

                    <th></th>



                  </thead>



                  <tbody class="searchable" id="index_section">

                  

<?php 

if(!empty($conversation_ids)){

$i=1; foreach($conversation_ids as $tinbox)

{    

    $user = \Yii::$app->user->identity->id;

     $conv =\frontend\models\ConvStatus::find()->where(['conv_id'=>$tinbox->id, 'user_id'=>$user])->one();

       if($conv['status']==2){

            ?>

                    <tr>

                      <td><input type="checkbox" class="checkthis" /></td>

                      <td class="ads-msg-icon">

                        

                        <a href="#" class=""><i class="fa fa-trash-o"></i></a>

                      </td>

                      <td class="ad-msg-username"><?= explode("@", $conversation->get_name($tinbox->from))[0] ?></td>

                      <td class="ad-dtl-msg">

                        <h4><?= $conversation->ad_name($tinbox->ad_id) ?></h4>

                        <p><?php // echo $tinbox->message ?> </p>

                        

                      </td>

                      

                      <td><?= $conversation->last_message_date($tinbox->id) ?>

                      </td>

                      <td class="ads-msg-icon"><a onclick="arest(<?=$tinbox->id?>)" title="undo" class="" href="#"><i class="fa fa-retweet"></i></a> </td>

                      <td>

                       <a onclick="readed(<?= $tinbox->id; ?>)" id="imageDivLink<?=$i?>" href="javascript:toggle5('contentDivImg<?=$i?>', 'imageDivLink<?=$i?>');"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/plus.png"></a>

                       </td>

                    

                    </tr>

         <tr>

                <td align="center" colspan="6">

                         



            <div id="contentDivImg<?=$i?>"  style="display: none;">

               <div class="conversation-wrap">

                  <ul class="conversationnew" id="answersContainer<?= $tinbox->id; ?>">

                     <li class="saying root">

                        <div class="titlebar">

                          <p>

                             <span class="pull-right time"><?= $conversation->ad_created_date($tinbox->ad_id) ?></span>

                             <a class="tdnone link" href="#" id="" target="_blank"><span><?= $conversation->ad_name($tinbox->ad_id) ?></span></a>

                          </p>

                        </div>

                        <div class="cloud br5">

                           

                           <div class="msgbar">

                              <h4 class="" id="adTitle"><?= $conversation->ad_name($tinbox->ad_id) ?></h4>

                              <a class="" href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $tinbox->ad_id]) ?>" title="web developent &amp; Web Designe" target="_blank">

                              <span class="icon inlblk mini external2">&nbsp;</span> <span class="link tdnone"><span>view</span></span>

                              </a>

                              <small class="">Ad ID: <?= $tinbox->ad_id ?></small>

                           </div>

                        </div>

                         

                     </li>

                     

                     <?php 

                      $messagelist = Messages::find()->where(['conv_id'=>$tinbox->id])->orderBy(['id' => SORT_ASC])->all();

                       $user = \Yii::$app->user->identity->id;

                      foreach($messagelist as $message){

                     ?>

                     <li class="saying root <?php if($user==$message->from){ echo"my"; }else{ echo"your"; } ?>">

                        <div class="titlebar">

                           <p>

                           <a class="tdnone link" href="#" id="" target="_blank"><span><?php if($user!=$message->from) echo explode("@", $conversation->get_name($message->from))[0]; ?></span></a>

                           <span class="pull-right time"><?= $message->created; ?></span> <?php if($user==$message->from){ echo "Your answer"; }else{ echo""; }?></p>

                        </div>

                        <div class="cloud br5">

                           <p><?= $message->message; ?></p>

                        </div>

                        <div class="statusbar"><?php if($message->to_viewed==1){ echo "seen"; }else{ echo "not seen";} ?></div>

                     </li>

                      <?php } ?>

                  </ul>

                </div>

<div class="form-group col-xs-12 chat-msg">

    <label for="pwd">Message:</label><br />

    <textarea id="msg" type="text" class="form-control"></textarea>

    <input class="hidden" id="<?=$tinbox->ad_id ?>" value="<?=$tinbox->id ?>" type="text" class="form-control">

    <br />

    <button type="button" class="btn btn-primary" onclick="msg2(<?=$tinbox->ad_id ?>)" value="Reply">Reply&nbsp;<i class="fa fa-reply"></i></button>

</div>



               <!-- /conversation-wrap -->

            </div>



</td>

                          

                          

<!--                      </tr>

                      <tr style="display: table-row;">

<td>

<td class="ads-msg-icon">

<td class="ad-msg-username">ab</td>

<td class="ad-dtl-msg">

<td>2016-04-10 06:09:11 </td>

<td>

</tr>

<tr style="display: table-row;">

<td>

<td class="ads-msg-icon">

<td class="ad-msg-username">cd</td>

<td class="ad-dtl-msg">

<td>2016-04-10 06:09:11 </td>

<td>

</tr>

<tr style="display: table-row;">

<td>

<td class="ads-msg-icon">

<td class="ad-msg-username">ef</td>

<td class="ad-dtl-msg">

<td>2016-04-10 06:09:11 </td>

<td>

</tr>-->

<?php $i++; } }}?>

                                      

                  </tbody>  



                </table>

              </div>

            </div>

            <!-- /table-responsive -->

          </div>

           </div>

        </div><!-- /Tab panes -->

        <div role="tabpanel" class="tab-pane account-set-wrap <?php if(isset($_GET['setting'])) { echo 'active'; } ?> " id="settings">

          <div class="panel-group" id="accordion">

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#changecontactdetails">Change Contact Details</a>

                      </h4>

                  </div>

                  <div id="changecontactdetails" class="panel-collapse collapse">

                   <?php $form=ActiveForm::begin([

                       'method'=>'post',
                       'options' => ['enctype'=>'multipart/form-data']

                   ]); ?>

                      <div class="panel-body">

                          <div class="input-group setting-input-group setting-select-box row">

                 

                           <!--<label>State<b class="asterisk">*</b></label>-->

                           <div class="col-lg-9 col-md-9 col-sm-9">

    <label>State<b class="asterisk">*</b></label>

    <?php 

    

    echo Html::dropDownList('state',  $selection = $pre_detail->state, $state, ['class'=>'form-control', 'onchange'=>'select_city(this)']);

    echo "<br />";

    echo "<br />";

    ?>
                        

    

    <div id="city">

    <label>City<b class="asterisk">*</b></label>

    <?php         

    echo Html::dropDownList('city',  $selection = $pre_detail->city, $city, ['class'=>'form-control']);    

    ?>

    </div>    
                           </div>
                           
<!--  <div class="col-lg-3 col-md-3 col-sm-3">
     
    <img src="/cl/admin/uploads/bulding.png" alt="Mo image" class="img-circle" width="100px" height="100px">
    </div>                  -->

    

                             

                        </div><!-- /.setting-input-group-->
  <div class="row"> 
                    <div class="col-lg-9 col-md-9 col-sm-9">

                                            <div class="input-group setting-input-group">

                    <!--                          <label>Name<b class="asterisk">*</b></label>

                                              <input type="text" class="form-control" value="" placeholder="">-->

                                              <?= $form->field($detail_model, 'name')->textInput(['value'=>$pre_detail->name]) ?>

                                            </div><!-- /.setting-input-group-->

                                            <div class="input-group setting-input-group">

                    <!--                          <label>Phone<b class="asterisk">*</b></label>

                                              <input type="text" class="form-control" value="" placeholder="">-->

                                              <?= $form->field($detail_model, 'mobile')->textInput(['value'=>$pre_detail->mobile]) ?>

                                            </div><!-- /.setting-input-group-->

                                            <div class="input-group setting-input-group">

                                              <?= $form->field($detail_model, 'address')->textInput(['value'=>$pre_detail->address]) ?>
                                               <?= $form->field($detail_model, 'com_url')->textInput() ?>       
                                            </div><!-- /.setting-input-group-->
                                            <div class="col-lg-6 col-md-6 col-sm-6 input-group">
              
<img class="img-responsive" alt="No imge uploaded" src="<?=Yii::$app->request->baseUrl.'/user/' . $detail_model->id.'.'.$detail_model->img ?>"/>
<?php echo $form->field($detail_model, 'img')->fileInput(['accept' => 'image/*']) ?>
  </div>
                    </div>
                        <br /><br />
<!--                <div class="col-lg-3 col-md-3 col-sm-3">
                <img src="/cl/admin/uploads/bulding.png" alt="Mo image" class="img-circle" width="100px" height="100px">
                
                </div> -->
                        
  </div>
                        
                       <br /> <?=  Html::submitButton('Save Settings', ['class' => 'btn btn-login', 'name' => 'change-pass']) ?>
                         


                        
                



                      </div>   <?php ActiveForm::end(); ?>

                  </div>

              </div><!-- /Panel Default -->

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#changepassword">Change Password</a>

                      </h4>

                  </div>

                  <div id="changepassword" class="panel-collapse collapse">

                      <div class="panel-body">

                          <?php $form=ActiveForm::begin(); ?>

                        <div class="input-group setting-input-group">

<!--                          <label>New password<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">-->
                        
                         <?= $form->field($pass_model, 'password_hash')->passwordInput()->label("Password"); ?>

                        </div><!-- /.setting-input-group-->



                        <div class="input-group setting-input-group">

<!--                          <label>Reset New password<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">-->

                         <?= $form->field($pass_model, 'password_repeat')->passwordInput(); ?>

                        </div><!-- /.setting-input-group-->



                        <!--<a href="#" class="btn btn-login">Change Password</a>-->

                       <?=  Html::submitButton('Change Password', ['class' => 'btn btn-login', 'name' => 'change-pass']) ?>

                

                          <?php ActiveForm::end(); ?>

                        

                      </div>

                  </div>

              </div><!-- /Panel Default -->

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#changeemail">Change Email</a>

                      </h4>

                  </div>

                  <div id="changeemail" class="panel-collapse collapse">

                      <div class="panel-body">

                        <div class="input-group setting-input-group">

                          <label>New Email<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">

                        </div><!-- /.setting-input-group-->



                        <a href="#" class="btn btn-login">Save</a>

                      </div>

                  </div>

              </div> <!-- /Panel Default -->

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#emailnotifications">Email Notifications</a>

                      </h4>

                  </div>

                  <div id="emailnotifications" class="panel-collapse collapse">

                      <div class="panel-body">
                          <input id="notifi" type="checkbox"  <?php if($letter['status']==1){echo 'checked';}else{echo 'zero';} ?> /> Yes, I want to receive newsletter.</br> </br>
                        
                          <button class="btn btn-login" onclick="notification()">Save</button>

                      </div>

                  </div>

              </div> <!-- /Panel Default -->

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#deleteaccount">Delete Account</a>

                      </h4>

                  </div>

                  <div id="deleteaccount" class="panel-collapse collapse">

                      <div class="panel-body">
                          <p></p>
                        <a href="javascript:AlertIt();" class="btn btn-danger">Delete My Account</a>

                        <script type="text/javascript">

function AlertIt() {

var answer = confirm ("Do You Realy want to Delete user .");



if (answer)

window.location="<?= $url = Url::to(['user/deleteuser']) ?>";

}

</script>

<div id="myModal" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Confirmation</h4>

            </div>

            <div class="modal-body">

                <p>Do you want to save changes you made to document before closing?</p>

                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary">Save changes</button>

            </div>

        </div>

    </div>

</div>

                      </div>

                  </div>

              </div> <!-- /Panel Default -->

          </div><!-- /Panel Group -->

        </div>

        <div role="tabpanel" class="tab-pane account-set-wrap" id="companyusers">

          <div class="panel-group" id="accordion">

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#createusers">Create users</a>

                      </h4>

                  </div>

                  <div id="createusers" class="panel-collapse collapse">

                      <div class="panel-body">

                        

                        <div class="input-group setting-input-group setting-select-box">

                          <label>State<b class="asterisk">*</b></label>

                          <select class="form-control">

                            <option>Choose</option>

                            <option>Northern Norway (Nord-Norge/Nord-Noreg)</option>

                            <option>Trøndelag (alt. Midt-Norge/Midt-Noreg) </option>

                            <option>Western Norway (Vestlandet)</option>

                            <option>Southern Norway (Sørlandet or Agder)</option>

                            <option>Eastern Norway (Østlandet/Austlandet)</option>

                          </select>

                        </div><!-- /.setting-input-group-->



                        <div class="input-group setting-input-group">

                          <label>Email<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">

                        </div><!-- /.setting-input-group-->



                        <div class="input-group setting-input-group">

                          <label>Phone<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">

                        </div><!-- /.setting-input-group-->



<!--                         <div class="input-group setting-input-group">

                          <div class="checkbox">

                             <input type="checkbox" name="" value=""><label>Do not use this data when adding Ads</label>

                          </div>

                          <div class="checkbox">

                            <input type="checkbox" name="" value=""><label>Hide the link to 'All my Ads'</label>

                          </div>

                        </div> -->



                        <a href="#" class="btn btn-login">Save</a>



                      </div>

                  </div>

              </div><!-- /Panel Default -->

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#userpassword">Change password</a>

                      </h4>

                  </div>

                  <div id="userpassword" class="panel-collapse collapse">

                      <div class="panel-body">

                        <div class="input-group setting-input-group">

                          <label>New password<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">

                        </div><!-- /.setting-input-group-->



                        <div class="input-group setting-input-group">

                          <label>Reset New password<b class="asterisk">*</b></label>

                          <input type="text" class="form-control" value="" placeholder="">

                        </div><!-- /.setting-input-group-->



                        <a href="#" class="btn btn-login">Change Password</a>

                      </div>

                  </div>

              </div><!-- /Panel Default -->

                    <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#details">Details</a>

                      </h4>

                  </div>

                  <div id="details" class="panel-collapse collapse">

                      <div class="panel-body">

                        Lorem Ipsum is dummy text of the industry.</br>

                        Lorem Ipsum is dummy text of the industry.</br>

                        Lorem Ipsum is dummy text of the industry.

                      </div>

                  </div>

              </div> <!-- /Panel Default -->

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#deleteuser">Delete Account</a>

                      </h4>

                  </div>

                  <div id="deleteaccount" class="panel-collapse collapse">

                      <div class="panel-body">

                        <a href="#" class="btn btn-danger">Delete User</a>

                      </div>

                  </div>

              </div> <!-- /Panel Default -->

          </div><!-- /Panel Group -->

        </div><!-- /Tab panes -->

        <div role="tabpanel" class="tab-pane account-set-wrap <?php if(isset($_GET['credits'])) { echo 'active'; } ?> " id="purchase">

          <div class="panel-group" id="accordion">

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#buycredits">Buy Credits</a>

                      </h4>

                  </div>

                  <div id="buycredits" class="panel-collapse collapse">

                       <?php $form=ActiveForm::begin([

                       'method'=>'post',

                         'options'=>[

                             'name'=>'payment',

                             'id'=>'payform'

                         ]

                   ]); ?>

                      <div class="panel-body">
                          <div class="row">
<!--                               <div class="col-md-2">
                         Inter your credit
                               </div>-->
                              <div class="col-md-4">
                                  <input type="checkbox" onclick="enable_credit()"  id="selec" />  <label onclick="enable_credit()">Buy Credits</label>
                                  <input onkeyup="input_credit(this)" class="form-control" id="num"  type="text" placeholder="Input here..."  pattern= "[0-9]"></input>
                              </div>
                              </div>
                          <hr>
                         <label>Packages</label>
                          <ul class="rdio_btnnew">
                <?php foreach($packages as $package){?>
                              <li><input class="radioo" type="radio" name="package" onclick="set_credit(this)" value="<?= $package->price ?>"  class="rdo_main"> <?= $package->name ?> </li>
                <?php } ?>

                        </ul>
          
                        <?php echo $form->field($adscredit, 'credits', ['inputOptions' => ['id' => 'creditsdetailscredits', 'type'=>'hidden']])->label(false); ?>

                    <a href="#" class="btn btn-login" data-toggle="modal" data-target="#my">Buy</a>

                      

                      <?php ActiveForm::end(); ?>



                      </div>

              </div><!-- /Panel Default -->

              </div>

             

              <div class="panel panel-default">

                  <div class="panel-heading">

                      <h4 class="panel-title">

                          <a data-toggle="collapse" data-parent="#accordion" href="#creditsummary">Credit Summary</a>

                      </h4>

                  </div>

                  <div id="creditsummary" class="panel-collapse collapse">

                       <div class="panel-body">

                        <div class="table-ads-msg-wrap">

              <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th>Credits Quantity</th>

                    <th>Amount Paid</th>

                    <th>TAX Included (With the Amount)</th>

                    

                   

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>



                  </thead>



                  <tbody>

                 <?php foreach($credits_details as $credits_purchased){?>

                    <tr>

                      <td><input type="checkbox" class="checkthis" /></td>

                      <td class="ads-msg-icon">

                        <p><?= $credits_purchased->credits?></p>

                      </td>

                      <td class="ad-msg-username"><?= $credits_purchased->amount_paid?></td>

                      <?php $tax=$credits_purchased->amount_paid *(0.2);

                      ?>

                      <td class="ad-dtl-msg">

                        

                        <p><?= $tax ?></p>

                      </td>

                      <td><?= $credits_purchased->date?></td>

                    </tr>

                 <?php } ?>

                   



                  

                  </tbody>  



                </table>

              </div>

            </div>



                        <a href="<?= Url::toRoute(['/user/detail']) ?>" class="btn btn-primary btn-sm">Print Detail</a>

                      </div>

                      

                      <div class="panel-body">

                        

                      

              <div class="table-responsive">

                <table class="table table-bordred table-striped">

                  <thead>



                    <th><input type="checkbox" id="checkall" /></th>

                    <th>Ad Information</th>

                    <th>Credits Used</th>

                    <th>Date</th>

                    

                   

                    <th class="sort-list">Date <i class="fa fa-chevron-down"></i></th>



                  </thead>



                  <tbody>



                    <?php foreach($credits_expense as $credits_expenses){?>

                      <tr>

                      <td><input type="checkbox" class="checkthis" /></td>

                      <td class="ads-msg-icon">

                        <p><?= $title->ad_name($credits_expenses->ad_id)?></p>

                       

                      </td>

                      <td class="ad-msg-username"><?= $credits_expenses->credit_exp ?></td>

                      

                      <td><?= $credits_expenses->date?></td>

                    </tr>



                    <?php }?>

                    



                  

                  </tbody>  



                </table>

              </div>

            </div>



                        <a href="<?= Url::toRoute(['/user/detail']) ?>" class="btn btn-primary btn-sm">Print Detail</a>

                      </div>

                  </div>

              </div> <!-- /Panel Default -->

          </div><!-- /Panel Group -->
             <!-- Modal -->

<div class="container">

<div class="modal fade" id="my" role="dialog">

<div class="modal-dialog">



<!-- Modal content-->

<div class="modal-content">

<div class="modal-header mdl_head">

<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

<h4 class="modal-title">Select Payment Method</h4>

</div>

<div class="modal-body">

    <div class="main_pay">
        <div class="icondv">
        <a href="#" class="payment"  link="http://www.w3schools.com/jsref/met_element_setattribute.asp"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/quickpay.png" class="img-rounded" alt="Cinque Terre" width="104" height\="36"></a>
        </div>
         <div class="icondv">
   <a href="#" class="payment"  link="<?= Url::toRoute(['/user/paypal']) ?>">
         
       <form action="<?= Url::toRoute(['/user/paypal']) ?>">

           <input type="hidden" name="credit" id="credit" value="0"/>

       <img src="<?php echo Yii::getAlias('@web') ?>/design/img/payapl.png" class="img-rounded" alt="Cinque Terre" width="104" height="36">

       </form></a>
    
    </div>
    </div>

    <br clear="all">
<div class="modal-footer">

<?php //  Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'change-pass']) ?>

<button type="button" class="btn btn-default btn_mdl" data-dismiss="modal">Close</button>

</div>

</div>



</div>

</div>



</div>

                  </div>  

        </div>

      </div><!-- /Tab content -->

    </div><!-- /Card -->

  </div><!-- /container-->

</section>

   





   

<!-- Ads Boxes -->

<!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>

  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->

<!-- /Ads Boxes -->

</main>



<script>

    

    //Change main heading onclick event

    function adLabel(){

        document.getElementById("setting").innerHTML = "Your  Ads";

        document.getElementById("ad_heading").innerHTML = "You can manage your Active & Inactive Ads here";        

    }

    

    //Change main heading onclick event

    function messagesLabel(){

        document.getElementById("setting").innerHTML = "My Messages";

        document.getElementById("ad_heading").innerHTML = "Messages regarding your Ads and replies from other sellers";

    }

    

    //Change main heading onclick event

    function settingLabel(){

        document.getElementById("setting").innerHTML = "Account Settings";

        document.getElementById("ad_heading").innerHTML = "Here you can change your account settings";

    }

    

    //Change main heading onclick event

    function creditLabel(){

        document.getElementById("setting").innerHTML = "Credit Details";

        document.getElementById("ad_heading").innerHTML = "Here you can get all information about your Credit's ads";

    }
    
    function companyUserLabel(){

        document.getElementById("setting").innerHTML = "Company User Settings";

        document.getElementById("ad_heading").innerHTML = "Here you can manage your Company users settings";

    }

    

    

//    jQuery(document).ready(function() {

//        jQuery('ul li a').click(function() {

//        jQuery('ul').children().removeClass('active-tab');

//        jQuery(this).closest('li').addClass('active-tab');

//        jQuery('span').children().removeClass('active-tab');

//    });

    

    function select_city(item) {

    $.ajax({

        type: "GET",

        url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/select_city_for_user_details'); ?>",

        data: {

            id: item.value

        },



        success: function(data) {

            document.getElementById("city").innerHTML = data;

        }

    });

    }

    function toggle5(showHideDiv, switchImgTag) {

        var ele = document.getElementById(showHideDiv);

        var imageEle = document.getElementById(switchImgTag);

        if(ele.style.display == "none") {

            ele.style.display = "block";

            imageEle.innerHTML = '<img src="<?php echo Yii::getAlias('@web') ?>/design/img/minus.png">';

         }

         else {

             ele.style.display = "none";

             imageEle.innerHTML = '<img src="<?php echo Yii::getAlias('@web') ?>/design/img/plus.png">';

         }

         }

</script>

<script type="text/javascript">

    

jQuery(document).ready(function($) {// Starting - jQuery(document)

$("#num").keypress(function (e){
  var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
});

    //var selection_value = 1;

    $("#active_id").click(function(){ 

      $('#search_hidden').val(1);

    });

    

    $("#unactive_id").click(function(){ 

      $('#search_hidden').val(2);

    });    

    

    $("#moderate_id").click(function(){ 

      $('#search_hidden').val(3);

    });

    

    $("#message_inbox").click(function(){ 

      $('#search_hidden_messages').val(4);

    });

    

    $("#ad_search_id").keypress(function(e) {

        

        //Start Active Tab AJAX

        if($('#search_hidden').val() == 1){

            if(e.which == 13) {

        var search_value = $("#ad_search_id").val();



        //create an ajax request to change the category images.

        $.ajax({    

            type: 'GET',

            url: "<?php echo Yii::$app->getUrlManager()->createUrl('user/get_search_ad') ?>",

            data: 'search_value='+search_value,

            dataType: 'json', //expect html to be returned                

            contentType: "application/json; charset=utf-8",

            success: function(response){

                var messages = '';

                var active_count = '';              

                var response_count = response.length;

                active_count += '<a id="active_id" href="#active" aria-controls="active" role="tab" data-toggle="tab"> Active ('+ response_count +')</a></li>';

                for (i = 0; i < response.length; i++) {                

                    var date = response[i]["created_date"];

                    var str = date.split(' ');





                            if(response[i]["status"] ==1){

                                messages += '<tr><td><input type="checkbox" class="checkthis" /></td><td>'+str[0].split('-')+'<br>To: ' +str[1]+ '</td><td class="tbl-ad-dtl"><span>' +response[i]["advertise_title"]+ '</span><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fad-view&id= ' +response[i]["id"]+ '"><i class="fa fa-external-link"></i> Preview</a><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=site%2Fedit-ad&id='+response[i]["id"]+ '"><i class="fa fa-pencil-square-o"></i> Edit</a><a class="red" href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fdelete&id=' +response[i]["id"]+ '&users_id=' +response[i]["user_id"]+ '"><i class="fa fa-times"></i> Delete</a></td><td><span style="color: green"><b>NOK </b></span>' +response[i]["price"]+ '</td><td id="danger '+response[i]["id"]+'"><a  onClick="change_status('+response[i]["id"]+')" class="btn btn-danger"><i class="fa fa-arrow-down"></i> In-Active</a><tr><td colspan="2" class="ad-statistics-ttl">Statistics:</td><td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: 177</td></tr></td></tr>';

                                //alert("3");

                            }



                }

                

                $('#active_id').empty();

                $('#active_advert').empty();

                $('#active_id').html(active_count);

                $('#active_advert').html(messages);

            }

            });

            }   

        }//End Active AJAX

        

        //Start Un-Active Tab AJAX

        if($('#search_hidden').val() == 2){

            if(e.which == 13) {

            var search_value = $("#ad_search_id").val();

            

            $.ajax({    

            type: 'GET',

            url: "<?php echo Yii::$app->getUrlManager()->createUrl('user/get_search_unactive_ad') ?>",

            data: 'search_value='+search_value,

            dataType: 'json', //expect html to be returned                

            contentType: "application/json; charset=utf-8",

            success: function(response){

                var messages = '';

                var active_count = '';            

                var response_count = response.length;

                active_count += '<a id="unactive_id" href="#active" aria-controls="active" role="tab" data-toggle="tab"> Active ('+ response_count +')</a></li>';

                for (i = 0; i < response.length; i++) {                

                    var date = response[i]["created_date"];

                    var str = date.split(' ');

                        if(response[i]["status"] ==1){

                                messages += '<tr><td id="danger' +response[i]["id"]+ '"><input type="checkbox" class="checkthis" /></td><td>'+str[0].split('-')+'<br>To: ' +str[1]+ '</td><td class="tbl-ad-dtl"><span>' +response[i]["advertise_title"]+ '</span><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fad-view&id=' +response[i]["id"]+ '"><i class="fa fa-external-link"></i> Preview</a><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=site%2Fedit-ad&id=' +response[i]["id"]+ '"><i class="fa fa-pencil-square-o"></i> Edit</a><a class="red" href="<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/delete')?>&id=' +response[i]["id"]+ '&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a></td><td><span style="color: green"><b>NOK </b></span>' +response[i]["price"]+ '</td><td id="danger' +response[i]["id"]+ '"><a  onClick="change_status(' +response[i]["id"]+ ')" class="btn btn-primary"><i class="fa fa-arrow-up"></i> Active</a><tr><td colspan="2" class="ad-statistics-ttl">Statistics:</td><td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: 177</td</tr></td></tr>';

                        }

                        else{

                            alert("No record found. Please try again");

                        }

                    }

			

                //$('#active_id').empty();

                $('#unactive_advert').empty();

                //$('#active_id').html(active_count);

                $('#unactive_advert').html(messages);

                }

            });

            }

        }//End Un-Active Tab AJAX

        

        //Start Moderate Tab AJAX

        if($('#search_hidden').val() == 3){

            if(e.which == 13) {

            var search_value = $("#ad_search_id").val();

            

            $.ajax({    

            type: 'GET',

            url: "<?php echo Yii::$app->request->baseUrl.  '/index.php?r=user/get_search_moderate_ad' ?>",

            data: 'search_value='+search_value,

            dataType: 'json', //expect html to be returned                

            contentType: "application/json; charset=utf-8",

            success: function(response){

                var messages = '';

                var active_count = '';            

                var messages_pending = '';

                var response_count = response.length;

                //active_count += '<a id="unactive_id" href="#active" aria-controls="active" role="tab" data-toggle="tab"> Active ('+ response_count +')</a></li>';

                for (i = 0; i < response.length; i++) {                

                    var date = response[i]["created_date"];

                    var str = date.split(' ');

                        if(response[i]["status"] ==2){

                            //alert(response[i]["user_id"]);

                                messages += '<tr><td id="danger' +response[i]["id"]+ '"><input type="checkbox" class="checkthis" /></td><td>'+str[0].split('-')+'<br>To: ' +str[1]+ '</td><td class="tbl-ad-dtl"><span>' +response[i]["advertise_title"]+ '</span><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fad-view&id=' +response[i]["id"]+ '"><i class="fa fa-external-link"></i> Preview</a><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=site%2Fedit-ad&id=' +response[i]["id"]+ '"><i class="fa fa-pencil-square-o"></i> Edit</a><a class="red" href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fdelete&id=' +response[i]["id"]+ '&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a></td><td><span style="color: green"><b>NOK </b></span>' +response[i]["price"]+ '</td><td><button type="button" class="btn btn-danger disabled"><i class="fa fa-arrow-down"></i>Rejected</button></td><tr><td colspan="2" class="ad-statistics-ttl">Statistics:</td><td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: 177</td></tr></td></tr>';

                        }

                        else if(response[i]["status"] ==0){

                            messages_pending += '<tr><td id="danger' +response[i]["id"]+ '"><input type="checkbox" class="checkthis" /></td><td>'+str[0].split('-')+'<br>To: ' +str[1]+ '</td><td class="tbl-ad-dtl"><span>' +response[i]["advertise_title"]+ '</span><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fad-view&id=' +response[i]["id"]+ '"><i class="fa fa-external-link"></i> Preview</a><a href="<?php echo Yii::getAlias('@web') ?>/index.php?r=site%2Fedit-ad&id=' +response[i]["id"]+ '"><i class="fa fa-pencil-square-o"></i> Edit</a><a class="red" href="<?php echo Yii::getAlias('@web') ?>/index.php?r=advertisement%2Fdelete&id=' +response[i]["id"]+ '&users_id=<?= Yii::$app->user->id; ?>"><i class="fa fa-times"></i> Delete</a></td><td><span style="color: green"><b>NOK </b></span>' +response[i]["price"]+ '</td><td><a href="#" class="btn btn-warning"><i class="fa fa-heartbeat "></i> Pending for review</a></td><tr><td colspan="2" class="ad-statistics-ttl">Statistics:</td><td colspan="4" class="ad-statistics-dtl"><i class="fa fa-eye"></i> Views: 177</td></tr></td></tr>';

                            

                        }

                        else{

                            alert("No record found. Please try again");

                        }

                    }

			

                //$('#active_id').empty();

                $('#moderate_advert').empty();

                //$('#active_id').html(active_count);

                $('#moderate_advert').html(messages);

                }

            });

            }

        }//End Moderate Tab AJAX

        

        //-----------------------------------------------------------------------

        

        

        

        //-------------------------------------------------------------------------

    }); // KeyPress function

    

    $("#message_search_id").keypress(function(e) {

    

    //Start Message Inbox Tab AJAX

        if($('#search_hidden_messages').val() == 4){

            if(e.which == 13) {

            var search_value = $("#message_search_id").val();

            

            $.ajax({    

            type: 'GET',

            url: "<?php echo Yii::$app->request->baseUrl.  '/index.php?r=user/get_inbox_messages_ad' ?>",

            data: 'search_value='+search_value,

            dataType: 'json', //expect html to be returned                

            contentType: "application/json; charset=utf-8",

            success: function(response){

                var messages = '';

                var active_count = '';            

                var messages_pending = '';

                var response_count = response.length;

                

                //active_count += '<a id="unactive_id" href="#active" aria-controls="active" role="tab" data-toggle="tab"> Active ('+ response_count +')</a></li>';

                for (i = 0; i < response.length; i++) {                

                    var date = response[i]["created_date"];

                    var str = date.split(' ');

                            //alert(response[i]["user_id"]);

//                                messages += '<tr><td><input type="checkbox" class="checkthis" /></td><td class="ads-msg-icon"><a href="#" class=""><i class="fa fa-trash-o"></i></a></td><td class="ad-msg-username"><?php // explode("@", $conversation->get_name($tinbox->from))[0] ?></td><td class="ad-dtl-msg"><h4><?php // $conversation->ad_name($tinbox->ad_id) ?></h4><p><?php // echo $tinbox->message ?> </p></td><td><?php // $conversation->last_message_date($tinbox->id) ?></td><td><a onclick="readed( '+ response[i]["id"] + ')" id="imageDivLink<?$i?>" href="javascript:toggle5("contentDivImg<?$i?>", "imageDivLink<?$i?>");"><img src="<?php// echo Yii::getAlias("@web") ?>/design/img/plus.png"></a></td></tr>';

                                //messages += '<h1>Yo yo</h1>';

                        

//                        else{

//                            alert("No record found. Please try again");

//                        }

                    }

			

                //$('#active_id').empty();

                        $('#index_section').empty();

                //$('#active_id').html(active_count);

                        $('#index_section').html(messages);

                }

            });

            }

        }//End Moderate Tab AJAX

    

    

    }); // KeyPress function

    

  





    

  });// Ending - jQuery(document)
function input_credit(input)
  {
//        $( "#num" ).prop( "disabled", false );
////         $('#creditsdetailscredits').attr('checked', false);
//          $('#radio').prop('checked', false);
           document.getElementById('creditsdetailscredits').value = input.value;
  }
function enable_credit()
  {
        $( "#num" ).prop( "disabled", false );
//         $('#creditsdetailscredits').attr('checked', false);
          $('.radioo').prop('checked', false);
  }
  function set_credit(radio)
  {
      $('#creditsdetailscredits').prop('checked', false);
      $('#num').val(null);
      $('#selec').prop('checked', false);
//      console.log(radio.value);
        $( "#num" ).prop( "disabled", true );
      document.getElementById('creditsdetailscredits').value = radio.value;
//      console.log(document.getElementById('creditsdetailscredits').value);

  }

  function copy_this(ad_id){

      $("#"+ad_id.id).html("<i class='fa fa-external-link'></i> <b> Copying....</b>");
       
    $.ajax({    
            type: "GET",
            url: "<?php echo Yii::$app->getUrlManager()->createUrl('user/copyad') ?>",
            data: "id="+ad_id.id,
//            dataType: "JSON",   //expect html to be returned                
            success: function(response){
            location.reload();
             }
            });
        
           
  }
  
  
  function notification(){
  var url;
     var c=document.getElementById('notifi');
      if (c.checked) {
    url = "<?php echo Yii::$app->getUrlManager()->createUrl('user/emailnotification') ?>"
  } else { 
      url = "<?php echo Yii::$app->getUrlManager()->createUrl('user/emailnotificationun') ?>"
   
  }
   $.ajax({    
            type: "GET",
            url: url,
//            data: "id="+ad_id.id,
//            dataType: "JSON",   //expect html to be returned                
            success: function(response){
            location.reload();
             }
            });
  }

</script>