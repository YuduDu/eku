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
  		<? foreach($res as $v) {?>
  		<tr>
        <td><?=$v['Sid']?></td>
        <td><?=$v['Sname']?></td>
  			<td><?=$v['SCid']?></td>
  			<td><?=$v['Sphone']?></td>
  			<td><a href="">编辑</a></td>
  		</tr>
  		<? }?>
    	</tbody>
  </table>
</div>