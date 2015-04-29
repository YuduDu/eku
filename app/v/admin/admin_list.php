<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
        <th>用户名</th>
  			<th>密码</th>
  			<th>员工编号</th>
  			<th>修改</th>
        <th>删除</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
        <td><?php echo $v['Username'];?></td>
        <td><?php echo $v['Password'];?></td>
        <td><?php echo $v['Staffs_Sid'];?></td>
        <td><a href="?/admin/admin_edit/Username/<?php echo $v['Username'];?>">修改</a></td>  
  			<td><a href="?/admin/admin_remove/Username/<?php echo $v['Username'];?>">删除</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
</div>