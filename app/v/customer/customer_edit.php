<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>客户公司名称</label>
    <input type="text" value="<?php echo $res['Cname'];?>" name="Cname" class="form-control">
  </div>
  <div class="form-group">
    <label>客户联系人姓名</label>
    <input type="text" name="Ccontact" value="<?php echo $res['Ccontact'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>客户地址</label>
    <input type="text" name="Caddress" value="<?php echo $res['Caddress'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>客户邮编</label>
    <input type="text" name="Cpostcode" value="<?php echo $res['Cpostcode'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>客户电话</label>
    <input type="text" name="Cphone" value="<?php echo $res['Cphone'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>客户银行</label>
    <input type="text" name="Cbank" value="<?php echo $res['Cbank'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>客户银行账号</label>
    <input type="text" name="Caccount" value="<?php echo $res['Caccount'];?>" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="customer_edit" class="btn btn-default">修改</button>
  </div>
</form>