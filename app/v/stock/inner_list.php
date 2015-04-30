<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>内部流转的编号</th>
  			<th>涉及到的仓库编号</th>
  			<th>数量</th>
        <th>物品的名称</th>
        <th>流转类型</th>
        <th>涉及到的库存项编号</th>
        <th>创建时间</th>
        <!--<th>操作</th>-->
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
  			<td><?php echo $v['Transitionid']?></td>
  			<td><?php echo $v['I_T_Wid']?></td>
        <td><?php echo $v['Amount']?></td>
        <td><?php echo $v['Items_Iname']?></td>
        <td><?php echo $v['Operate']?></td>
        <td><?php echo $v['Stockid'];?></td>
        <td><?php echo $v['Time'];?></td>        
  			<!--<td><a href="?/warehouse/edit/Wid/<?php echo $v['Wid'];?>">编辑</a></td>-->
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
  <?php echo $pagination;?>
</div>