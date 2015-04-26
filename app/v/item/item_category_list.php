<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>物品的大类</th>
  			<th>这一大类物品的类型（原材料/半成品/成品）</th>
  			<th>查看物品列表</th>
        <th>修改</th>
        <th>删除</th>
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
  			<td><?php echo $v['ICname']?></td>
  			<td><?php echo $v['Spec']?></td>
  			<td><a href="?/item/item_see/ICname/<?php echo $v['ICname'];?>">查看</a></td>
        <td><a href="?/item/item_mod/ICname/1">修改</a></td>
        <td><a href="?/item/item_remove/ICname/1">删除</a></td>
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
</div>