<form class="form-inline" method="post" action="">
  <div class="form-group">
    <label>物品的大类</label>
    <input type="text" value="<?php echo $res['ICname'];?>" name="ICname" class="form-control">
  </div>
  <div class="form-group">
    <label>物品的大类</label>
  <select class="form-control" name="Spec">
    <option <?php echo $res['Spec']=='原材料'?'selected':'';?> value="原材料">原材料</option>
    <option <?php echo $res['Spec']=='半成品'?'selected':'';?> value="半成品">半成品</option>
    <option <?php echo $res['Spec']=='成品'?'selected':'';?> value="成品">成品</option>
  </select>
  </div>
  
  <br><div class="form-group">  
    <button type="submit" name="item_category_edit" class="btn btn-default">修改</button>
  </div>
</form>