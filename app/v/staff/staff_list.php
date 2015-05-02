<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
        <th>员工的编号</th>
        <th>员工的名字</th>
  			<th>员工类型编号</th>
  			<th>电话</th>
  			<th>操作</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
        <td><?php echo $v['Sid']?></td>
        <td><?php echo $v['Sname']?></td>
  			<td><?php echo $v['SCid']?></td>
  			<td><?php echo $v['Sphone']?></td>
  			<td><a href="?/staff/staff_edit/Sid/<?php echo $v['Sid'];?>">编辑</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
</div>