<h4>供应商基本信息</h4>
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
  		</tr>
      </thead>
      <tbody>
  		<tr>
        <td><?=$sup['Sid']?></td>
  			<td><?=$sup['Sname']?></td>
  			<td><?=$sup['Scontact']?></td>
        <td><?=$sup['Saddress']?></td>
        <td><?=$sup['Spostcode']?></td>
        <td><?=$sup['Sphone']?></td>
        <td><?=$sup['Sbank']?></td>
        <td><?=$sup['Saccount']?></td>
  		</tr>
    	</tbody>
  </table>
</div>

<h4>供货记录</h4>
<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>供应商编号</th>
        <th>入库单创建时间</th>
        <th>交易金额</th>
        <th>入库单编号</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>假数据</td>
        <td>假数据</td>
        <td>假数据</td>
        <td>假数据</td>
      </tr>
      <? foreach($res as $v) {?>
      <tr>
        <td><?=$v['Sid']?></td>
        <td><?=$v['Sname']?></td>
        <td><?=$v['Scontact']?></td>
        <td><?=$v['Saddress']?></td>
      </tr>
      <? }?>
      </tbody>
  </table>
</div>