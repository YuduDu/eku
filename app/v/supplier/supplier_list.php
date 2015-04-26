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
  			<th>查看</th>
        <th>编辑</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
        <td><?php echo $v['Sid'];?></td>
  			<td><?php echo $v['Sname'];?></td>
  			<td><?php echo $v['Scontact'];?></td>
        <td><?php echo $v['Saddress'];?></td>
        <td><?php echo $v['Spostcode'];?></td>
        <td><?php echo $v['Sphone'];?></td>
        <td><?php echo $v['Sbank'];?></td>
        <td><?php echo $v['Saccount'];?></td>
        <td><a href="?/supplier/see_supplier/Sid/<?php echo $v['Sid'];?>">查看</td>
  			<td><a href="?/supplier/mod_supplier/Sid/<?php echo $v['Sid'];?>">编辑</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
</div>