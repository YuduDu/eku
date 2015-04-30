<?php
$m->table = 'Outbound_details';
$m->key = 'Outbound_id';
?>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>出库单编号</th>
  			<th>出库单对应的客户编号</th>
  			<th>出库单创建时间</th>
        <th>负责出库的员工编号</th>
        <th>送货人的姓名</th>
        <th>出库单物品详情</th>
        <!--<th>操作</th>-->
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
  			<td><?php echo $v['Outbound_id']?></td>
  			<td><?php echo $v['Customer_Cid']?></td>
        <td><?php echo $v['Createtime']?></td>
        <td><?php echo $v['Approver_id']?></td>
        <td><?php echo $v['Consignee']?></td>
        <td>
          <?php
            $r = $m->get_one($v['Outbound_id']);
            echo '物品:'.$r['Outbound_Iname'].'<br>'
            .'数量:'.$r['Amount'].'<br>'
            .'单价:'.$r['Unit_price'].'<br>'
            .'库存项编号:'.$r['Outbound_Stockid'].'<br>'
            .'仓库编号:'.$r['Warehouse_Wid'];
          ?>
        </td>
  			<!--<td><a href="?/warehouse/edit/Wid/<?php echo $v['Wid'];?>">编辑</a></td>-->
  		</tr>
  		<?php }?>
    	</tbody>
  </table>
  <?php echo $pagination;?>
</div>