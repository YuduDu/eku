<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>仓库编号</th>
  			<th>仓库负责员工的编号</th>
  			<th>操作</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
  			<td><?php echo $v['Wid']?></td>
  			<td><?php echo $v['Admin_id']?></td>
  			<td><a href="?/warehouse/edit/Wid/<?php echo $v['Wid'];?>">编辑</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
  <?php echo $pagination;?>
</div>