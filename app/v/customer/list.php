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
        <th>查看客户详情</th>
  			<th>修改</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
        <td><?php echo $v['Cid'];?></td>
        <td><?php echo $v['Cname'];?></td>
        <td><?php echo $v['Ccontact'];?></td>
        <td><?php echo $v['Caddress'];?></td>
        <td><?php echo $v['Cpostcode'];?></td>
        <td><?php echo $v['Cphone'];?></td>
  			<td><?php echo $v['Cbank'];?></td>
  			<td><?php echo $v['Caccount'];?></td>
        <td><a href="?/customer/customer_detail/Cid/<?php echo $v['Cid'];?>">查看</a></td>  
  			<td><a href="?/customer/customer_edit/Cid/<?php echo $v['Cid'];?>">编辑</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
</div>