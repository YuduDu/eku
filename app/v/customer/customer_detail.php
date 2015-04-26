<h4>供应商基本信息</h4>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
        	<th>客户编号</th>
  			<th>客户公司名称</th>
  			<th>客户联系人姓名</th>
        	<th>客户地址</th>
        	<th>客户邮编</th>
        	<th>客户电话</th>
        	<th>客户银行</th>
        	<th>客户银行账号</th>        
  		</tr>
      </thead>
      <tbody>
  		<tr>
        	<td><?php echo $customer['Cid'];?></td>
  			<td><?php echo $customer['Cname'];?></td>
  			<td><?php echo $customer['Ccontact'];?></td>
	        <td><?php echo $customer['Caddress'];?></td>
	        <td><?php echo $customer['Cpostcode'];?></td>
	        <td><?php echo $customer['Cphone'];?></td>
	        <td><?php echo $customer['Cbank'];?></td>
	        <td><?php echo $customer['Caccount'];?></td>
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
      <tr>
        <td>假数据</td>
        <td>假数据</td>
        <td>假数据</td>
        <td>假数据</td>
      </tr>
      <?php foreach($res as $v) {?>
      <tr>
        <td><?php echo $v['Sid'];?></td>
        <td><?php echo $v['Sname'];?></td>
        <td><?php echo $v['Scontact'];?></td>
        <td><?php echo $v['Saddress'];?></td>
      </tr>
      <?php }?>
      </tbody>
  </table>
</div>