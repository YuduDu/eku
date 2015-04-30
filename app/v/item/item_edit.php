<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>物品的名称</label>
    <input type="text" value="<?php echo $res['Iname'];?>" name="Iname" class="form-control">
  </div>
  <div class="form-group">
    <label>物品的大类</label>
    <input type="text" value="<?php echo $res['ICname'];?>" name="ICname" class="form-control">
  </div>
  <div class="form-group">
    <label>物品的计量单位</label>
    <input type="text" value="<?php echo $res['Unit'];?>" name="Unit" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="item_edit" class="btn btn-default">修改</button>
  </div>
</form>