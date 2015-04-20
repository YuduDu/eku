<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  			<th>员工类型ID</th>
  			<th>员工类型描述</th>
  			<th>操作</th>
  		</tr>
      </thead>
      <tbody>
  		<? foreach($res as $v) {?>
  		<tr>
  			<td><?=$v['SCid']?></td>
  			<td><?=$v['SType']?></td>
  			<td><a href="">编辑</a></td>
  		</tr>
  		<? }?>
    	</tbody>
  </table>
</div>