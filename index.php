<?php
include('header.php');
$network_info = $client->getinfo ();
$network_info = $client->getinfo ();
if($network_info == ""){
$blk_trans = "0";
$blk_mdiff = "0";
$blk_amount = "0";
$blk_size = "0";
$blk_ver = "0";
$blk_flgd = "unknown";
$blk_bits = "unknown";
$blk_nonce = "0";
$blk_confirm = "0";
echo "Error connect to RPC_Client.";
}else{
$net_speed = $client->getmininginfo ();
$net_diff = $client->getdifficulty ();
$net_speedh = $net_speed["netmhashps"];
if($net_sf == "H/s"){
$net_speedh *= 1000;
$net_speedh *= 1000;
}
if($net_sf == "KH/s"){
$net_speedh *= 1000;
}
if($net_sf == "GH/s"){
$net_speedh /= 1000;
}
if($net_sf == "TH/s"){
$net_speedh /= 1000;
$net_speedh /= 1000;
}
if($net_sf == "PH/s"){
$net_speedh /= 1000;
$net_speedh /= 1000;
$net_speedh /= 1000;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="row">
<div class="col-lg-12">
<br/><br/>
<div id="imaginary_container">
<form id="searchform" role="search" method="POST" action="/info.php">
<div id="custom-search-input">
<div class="input-group col-md-12">
<input type="blkinf" id="blkinf" name="blkinf" class="form-control" placeholder="<?php echo $langconst['blkh'] ?>" autocomplete="off">
<span class="input-group-btn">
<button class="btn btn-default"><?php echo $langconst['scr'] ?></button>
</span>
</div>
</div>
</form>
</div>
</div>
</div>
<br/><br/>
<div class="row text-center">
<div class="col-md-3">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['cblk'] ?></b>
</div>
<div class="panel-body"><?php echo $network_info["blocks"] ?></div>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['diff'] ?></b>
</div>
<div class="panel-body"><?php echo $net_diff["proof-of-work"] ?></div>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['ms'] ?></b>
</div>
<div class="panel-body"><?php echo $network_info["moneysupply"] ?></div>
</div>
</div>
<div class="col-md-3">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['ns'] ?> <?php echo $net_sf ?></b>
</div>
<div class="panel-body"><?php echo $net_speedh ?></div>
</div>
</div>
</div>
</div>
</div>
<br/>
<script type="text/javascript">
            var coin_id = 1;
        </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/scripts.js"></script>
<script src="//maps.google.com/maps/api/js"></script>
<script src="/js/highstock/js/highstock.js"></script>
<script src="/js/highstock/js/modules/exporting.js"></script>
<div id="sub-content"><div id="blockchain">
<div id="no-more-tables">
<table id="table_blocks" class="col-md-12 cf table table-hover">
<thead class="cf">
<tr>
<th style="font-weight: 600;border-bottom: 2px solid #36a9e1;"><?php echo $langconst['hght'] ?></th>
<th style="font-weight: 600;border-bottom: 2px solid #36a9e1;"><?php echo $langconst['flg'] ?></th>
<th style="font-weight: 600;border-bottom: 2px solid #36a9e1;"><?php echo $langconst['tranz'] ?></th>
<th style="font-weight: 600;border-bottom: 2px solid #36a9e1;"><?php echo $langconst['amnt'] ?></th>
<th style="font-weight: 600;border-bottom: 2px solid #36a9e1;"><?php echo $langconst['diff'] ?></th>
</tr>
</thead>
<tbody>
<?php 
if($network_info == ""){
$blk_trans = "0";
$blk_mdiff = "0";
$blk_amount = "0";
$blk_size = "0";
$blk_ver = "0";
$blk_flgd = "unknown";
$blk_bits = "unknown";
$blk_nonce = "0";
$blk_confirm = "0";
}else{
$vt_blk = $v_blk;
$vt_get = $_GET['limit'];
$v_blk += $vt_get;
if($network_info["blocks"] <= $v_blk){
$v_blk = $network_info["blocks"];
}
for ($ig = 1; $ig <= $v_blk; $ig++) {
$blk_height = $network_info["blocks"];
$block_index = $blk_height - $ig;
$block_hashs = $client->getblockhash($block_index);
$blk_info = $client->getblock($block_hashs);
$blk_mdiff = $blk_info["difficulty"];
$blk_tx = $blk_info["tx"];
$blk_trans = count($blk_tx);
$blk_amount = $blk_info["mint"];
$blk_flgd = $blk_info["flags"];
if (strpos($blk_flgd, 'proof-of-work') !== false)
{
$blk_flgd = "POW";
$cls_ldl = "label label-default";
} else {
$blk_flgd = "POS";
$cls_ldl = "label label-success";
}
	      echo '<tr>
               <td data-title="Height" class="mobile-header"><a href="info.php?blkc=',$block_index.'" title="',$fullname.' block #',$block_index.'">',$block_index.'</a></td>
               <td data-title="Flags"><span class="',$cls_ldl.'">',$blk_flgd.'</span></td>
               <td data-title="Transactions">',$blk_trans.'</td>
               <td data-title="Amount">',$blk_amount.' <small>',$short.'</small></td>
			   <td data-title="Difficulty">',$blk_mdiff.'</td>
            </tr>';
}
}
?>
</tbody>
</table>
</div>
</div>
</body>
</html>
