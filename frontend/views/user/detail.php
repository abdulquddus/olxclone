<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/design/css/style.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
		<script src="<?php //echo Yii::getAlias('@web') ?>/design/js/script.js"></script>
	</head>
	<body>
		<header>
			<h1>Credits Detail</h1>
			<address contenteditable>
				<p>Jonathan Neal</p>
				<p>101 E. Chzzapman Ave<br>Orange, CA 92866</p>
				<p>(800) 555-1234</p>
			</address>
			<span><img alt="" src="<?php echo Yii::getAlias('@web') ?>/design/img/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span>101138</span></td>
				</tr>
				<tr>
					<th><span>Issuing Date</span></th>
					<td><span>January 1, 2012</span></td>
				</tr>
<!--                                <tr>
					<th><span>Due Date</span></th>
					<td><span>January 1, 2012</span></td>
				</tr>-->
<!--				<tr>
					<th><span>Amount Due</span></th>
					<td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
				</tr>-->
                                
			</table>
			<table class="inventory">
				<thead>
					<tr>
                                            	<th><span>Item</span></th>
						<th><span>Description</span></th>
						<th><span>Credits Quantity</span></th>
						<th><span>Amount Paid</span></th>
						<th><span>TAX (20%)</span></th>
                                                <th><span>Date</span></th>
					</tr>
				</thead>
				<tbody>

                    <?php foreach($credits_details as $credits_detail){?>
					<tr>
						<td><!--<a class="cut">-</a>--><span>Credit purchase</span></td>
						<td><span>Purchase Review</span></td>
						
                      
                      <td><span>
                        <p><?= $credits_detail->credits ?></p>
                        <?php
                        $tax=$credits_detail->amount_paid*(0.2);
                        
                        $actualamount=$credits_detail->amount_paid-$tax;
                            ?>
                     </span> </td>
                      <td><span><?= $actualamount ?></span></td>
                      <td><span><?= $tax?></span></td>
                      <td><span><?= $credits_detail->date?></span></td>
                    
					</tr>
                                        <?php }?>
				</tbody>
			</table>
			<!-- <a class="add">+</a> -->
			<table class="balance">
                           <?php
                           
                        $total_tax=$sumamount*(0.2);
                        $total_amount=$sumamount-$total_tax;
                        
                            ?>
                            
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>$</span><span><?= $total_amount ?></span></td>
				</tr>
                                <tr>
					<th><span>TAX 20%</span></th>
					<td><span data-prefix>$</span><span><?= $total_tax ?></span></td>
				</tr>
				<tr>
					<th><span>Amount Paid</span></th>
					<td><span data-prefix>$</span><span><?= $sumamount ?></span></td>
				</tr>
<!--				<tr>
					<th><span>Balance Due</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>-->
			</table>
		</article>
		<aside>
			<h1><span>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
	</body>
</html>