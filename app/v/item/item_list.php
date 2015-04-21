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
  		<? foreach($res as $v) {?>
  		<tr>
  			<td><?=$v['SCid']?></td>
  			<td><?=$v['SType']?></td>
  			<td><a href="?/item/item_see/ICname/1">查看</a></td>
        <td><a href="?/item/item_mod/ICname/1">修改</a></td>
        <td><a href="?/item/item_remove/ICname/1">删除</a></td>
  		</tr>
  		<? }?>
    	</tbody>
  </table>
</div>