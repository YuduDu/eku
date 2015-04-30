<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>物品的名称</th>
  			<th>物品的大类</th>
        <th>物品的计量单位</th>
        <th>修改</th>
        <th>删除</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($items as $v) {?>
  		<tr>
  			<td><?php echo $v['Iname'];?></td>
  			<td><?php echo $v['ICname'];?></td>
        <td><?php echo $v['Unit'];?></td>
        <td><a href="?/item/item_edit/Iname/<?php echo urlencode($v['Iname']);?>">修改</a></td>
        <td><a href="?/item/item_remove/Iname/<?php echo urlencode($v['Iname']);?>">删除</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
</div>