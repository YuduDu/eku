<h4>供应商基本信息</h4>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
        <th>供应商编号</th>
  			<th>供应商名字</th>
  			<th>联系人</th>
        <th>供应商地址</th>
        <th>供应商邮编</th>
        <th>供应商电话</th>
        <th>供应商银行</th>
        <th>供应商银行地址</th>        
  		</tr>
      </thead>
      <tbody>
  		<tr>
        <td><?php echo $sup['Sid'];?></td>
  			<td><?php echo $sup['Sname'];?></td>
  			<td><?php echo $sup['Scontact'];?></td>
        <td><?php echo $sup['Saddress'];?></td>
        <td><?php echo $sup['Spostcode'];?></td>
        <td><?php echo $sup['Sphone'];?></td>
        <td><?php echo $sup['Sbank'];?></td>
        <td><?php echo $sup['Saccount'];?></td>
  		</tr>
    	</tbody>
  </table>
</div>

<h4>供货记录</h4>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>供应商编号</th>
        <th>入库单创建时间</th>
        <th>交易金额</th>
        <th>入库单编号</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($suppliers_order as $v) {?>
      <tr>
        <td><?php echo $v['Sid'];?></td>
        <td><?php echo $v['CreateTime'];?></td>
        <td><?php echo $v['Money'];?></td>
        <td><?php echo $v['Inbound_id'];?></td>
      </tr>
      <?php }?>
      </tbody>
  </table>
</div>