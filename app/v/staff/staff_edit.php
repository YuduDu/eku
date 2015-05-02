<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>员工的编号</label>
    <input type="text" disabled name="Sid" value="<?php echo $res['Sid'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>名字</label>
    <input type="text" name="Sname" value="<?php echo $res['Sname'];?>" class="form-control">
  </div>
  <div class="form-group">
    <label>员工类型的编号</label>
    <input type="text" name="SCid" value="<?php echo $res['SCid']; ?>" class="form-control">
  </div>
  <div class="form-group">
    <label>电话</label>
    <input type="text" name="Sphone" value="<?php echo $res['Sphone'];?>" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="staff_edit" class="btn btn-default">修改</button>
  </div>
</form>