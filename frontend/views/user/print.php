
           
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
                                <tr>
					<th><span>Due Date</span></th>
					<td><span>January 1, 2012</span></td>
				</tr>
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
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
                                <tr>
					<th><span>TAX 20%</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
				<tr>
					<th><span>Amount Paid</span></th>
					<td><span data-prefix>$</span><span>0.00</span></td>
				</tr>
				<tr>
					<th><span>Balance Due</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
			</table>
		</article>
  
		