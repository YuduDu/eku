<form class="form-inline" method="post" action="">
  <div class="form-group">
      <label>入库操作员工编号：<?php echo $_SESSION['STOCK_Sid'];?></label>
      <input type="hidden" name="Approver_id" value="<?php echo $_SESSION['STOCK_Sid'];?>">
  </div>
  <br>

  <div class="radio">
    <label>选择入库单：</label>
      <label>已有的</label> <input type="radio" name="InboundStyle" value="1" checked>
      <label>创建新的</label> <input type="radio" name="InboundStyle" value="2">
  </div>
  <br>

  <select class="form-control _old_inbound" name="Inbound_id_old">
    <?php foreach($inbound as $v){ ?>
    <option value="<?php echo $v['Inbound_id'];?>"><?php echo $v['Inbound_id'].':供货商'.$v['Suppliers_Sid'].',送货人姓名'.$v['Deliverer'];?></option>
    <?php }?>
  </select>
  <br class="_old_inbound">

  <div class="_new_inbound" style="display:none;">
    <div class="form-group">
      <label>供应商编号</label>
      <input type="text" name="Suppliers_Sid" class="form-control">
    </div>
    <div class="form-group">
      <label>送货人姓名</label>
      <input type="text" name="Deliverer" class="form-control" >
    </div>
  </div>

  <div class="form-group">
    <label>物品名称</label>
    <input type="text" name="Inbound_Iname" class="form-control">
  </div>
  <div class="form-group">
    <label>仓库号</label>
    <input type="text" name="Warehouse_Wid" class="form-control" >
  </div>
  <div class="form-group">
    <label>区域号</label>
    <input type="text" name="Stockarea" class="form-control" >
  </div><br>
  <div class="form-group">
    <label>数量</label>
    <input type="text" name="Amount" class="form-control" >
  </div>
  <div class="form-group">
    <label>单价</label>
    <input type="text" name="Unit_Price" class="form-control" >
  </div>
  
  <br><div class="form-group"><button type="submit" name="addInBound" class="btn btn-default">添加货物</button></div>
</form>

<script type="text/javascript">
$(function(){
    $('input[name="InboundStyle"]').click(function(){
        var val = $(this).val();
        if(val == "1"){
            $('._old_inbound').show();
            $('._new_inbound').hide();
        }else{
            $('._old_inbound').hide();
            $('._new_inbound').show();
        }
    });
});
</script>