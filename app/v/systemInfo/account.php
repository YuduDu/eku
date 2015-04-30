<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>员工编号</label>
    <input type="text" value="<?php echo $user['Staffs_Sid'];?>" disabled name="Staffs_Sid" class="form-control">
    <input type="hidden" value="<?php echo $user['Staffs_Sid'];?>" name="Staffs_Sid">
  </div>
  <div class="form-group">
    <label>用户名</label>
    <input type="text" value="<?php echo $user['Username'];?>" disabled class="form-control">
    <input type="hidden" value="<?php echo $user['Username'];?>" name="Username">
  </div>
  <div class="form-group">
    <label>密码</label>
    <input type="text" name="Password" class="form-control">
  </div>
  
  <br><div class="form-group">
    <button type="submit" name="edit_pwd" class="btn btn-default">修改</button>
  </div>
</form>