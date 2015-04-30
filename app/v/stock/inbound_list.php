<?php
$m->table = 'Inbound_details';
$m->key = 'Inbound_id';
?>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>入库单编号</th>
  			<th>入库单创建时间</th>
  			<th>同意入库的员工编号</th>
        <th>供货商编号</th>
        <th>送货人姓名</th>
        <th>入库单物品详情</th>
        <!--<th>操作</th>-->
  		</tr>
      </thead>
      <tbody>
  		<?php foreach($res as $v) {?>
  		<tr>
  			<td><?php echo $v['Inbound_id']?></td>
  			<td><?php echo $v['CreateTime']?></td>
        <td><?php echo $v['Approver_id']?></td>
        <td><?php echo $v['Suppliers_Sid']?></td>
        <td><?php echo $v['Deliverer']?></td>
        <td>
          <?php
            $r = $m->get_one($v['Inbound_id']);
            echo '物品:'.$r['Inbound_Iname'].'<br>'
            .'数量:'.$r['Amount'].'<br>'
            .'单价:'.$r['Unit_Price'].'<br>'
            .'库存项编号:'.$r['Inbound_Stockid'].'<br>'
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