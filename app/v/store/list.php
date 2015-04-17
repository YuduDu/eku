<ul class="eku-list" >
<?
if(is_array($records )){
foreach ($records as $r ){ ?>
  <li>
    <div>ekuid <?=$r['eku_id']?></div>
    <div>ekuid <?=$r['pid']?></div>
    <div>ekuid <?=$r['pname']?></div>
    <div>ekuid <?=$r['unit']?></div>
    <div>ekuid <?=$r['num']?></div>
    <div>ekuid <?=$r['action']?></div>
    <div>ekuid <?=$r['action_label']?></div>
    <div>ekuid <?=$r['alert_level']?></div>
    <div>ekuid <?=$r['kuwei']?></div>
    <div>ekuid <?=$r['datetime']?></div>
    <div>ekuid <?=$r['doer']?></div>
    <div>ekuid <?=$r['remark']?></div>
    <div>ekuid <?=$r['category']?></div>
    <div>ekuid <?=$r['balance']?></div>
    <div>ekuid <?=$r['cur_balance']?></div>
    <div>
      <a href="/eku/view/<?=$r['id']?>" >查看</a>
      <a href="/eku/edit/<?=$r['id']?>" >编辑</a> 
    </div>
  </li>
<?  }
}?>
</ul>
<?=isset($pagination)?$pagination:''?>