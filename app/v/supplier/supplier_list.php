<div class="table-responsive">
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
        <th>供应商编号</th>
  			<th>供应商名字</th>
  			<th>联系人</th>
        <th>供应商地址</th>
        <th>供应商邮编</th>
        <th>供应商电话</th>
        <th>供应商银行</th>
        <th>供应商银行地址</th>        
  			<th>操作</th>
  		</tr>
      </thead>
      <tbody>
  		<? foreach($res as $v) {?>
  		<tr>
        <td><?=$v['Sid']?></td>
  			<td><?=$v['Sname']?></td>
  			<td><?=$v['Scontact']?></td>
        <td><?=$v['Saddress']?></td>
        <td><?=$v['Spostcode']?></td>
        <td><?=$v['Sphone']?></td>
        <td><?=$v['Sbank']?></td>
        <td><?=$v['Saccount']?></td>
  			<td><a href="">编辑</a></td>
  		</tr>
  		<? }?>
    	</tbody>
  </table>
</div>