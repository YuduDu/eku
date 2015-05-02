<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>仓库编号</label>
    <input type="text" disabled value="<?php echo $res['Wid'];?>" name="Wid" class="form-control">
  </div>
  <div class="form-group">
    <label>仓库负责员工的编号</label>
    <input type="text" value="<?php echo $res['Admin_id'];?>" name="Admin_id" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="warehouses_edit" class="btn btn-default">修改</button>
  </div>
</form>