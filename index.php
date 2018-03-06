<?php
include('header.php');
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
$net_speedh = $net_speed["networkhashps"];

if( $net_speedh<1000 )
{
	$net_sf = "H/s";
}
else
{
 	$net_speedh=$net_speedh/1000;
	if( $net_speedh<1000 )
	{
		$net_sf = "KH/s";
	}
	else
	{
		$net_speedh=$net_speedh/1000;
		if( $net_speedh<1000 )
		{
			$net_sf = "MH/s";
		}
		else
		{
			$net_speedh=$net_speedh/1000;
			if( $net_speedh<1000 )
			{
				$net_sf = "GH/s";
			}
			else
			{
			$net_speedh=$net_speedh/1000;
			if( $net_speedh<1000 )
			{
				$net_sf = "TH/s";
			}
			}
		}
	}
}

/*

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

*/

}
?>
<!DOCTYPE html>
<html lang="en">
<div class="container">
<div class="row">
<div class="col-lg-18">
<div class="row">
<div class="col-lg-12">
<br/><br/>
<div id="imaginary_container">
<form id="searchform" role="search" method="POST" action="api.php">
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
<div class="col-md-2">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['cblk'] ?></b>
</div>
<div class="panel-body"><?php echo $network_info["blocks"] ?></div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['diff'] ?></b>
</div>
<div class="panel-body"><?php echo number_format( $net_diff, 3, '.', '' ) ?></div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['ms'] ?></b>
</div>
<div class="panel-body"><?php $network_info1 = $client->gettxoutsetinfo (); echo number_format($network_info1["total_amount"], 3, '.', '' ); ?></div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['ns'] ?> <?php echo $net_sf ?></b>
</div>
<div class="panel-body"><?php echo number_format( $net_speedh, 3, '.', '' ) ?></div>
</div>
</div>
<div class="col-md-2">
<div class="panel panel-default info-panel">
<div class="panel-heading">
<b><?php echo $langconst['conn'] ?></b>
</div>
<div class="panel-body"><a data-toggle="modal" data-target="#GetNodeList" id="showGetNodeList" href="#!network"><?php echo $network_info["connections"] ?></a></div>
</div>
</div>
</div>
</div>
</div>
<br/>
<script type="text/javascript">
            var coin_id = 1;
        </script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="//maps.google.com/maps/api/js"></script>
<script src="js/highstock/js/highstock.js"></script>
<script src="js/highstock/js/modules/exporting.js"></script>
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
// if (strpos($blk_flgd, 'proof-of-work') !== false)
// {
$blk_flgd = "POW";
$cls_ldl = "label label-default";
// } else {
// $blk_flgd = "POS";
// $cls_ldl = "label label-success";
// }
	      echo '<tr>
               <td data-title="Height" class="mobile-header"><a href="info.php?blkc=',$block_index.'" title="',$fullname.' block #',$block_index.'">',$block_index.'</a></td>
               <td data-title="Flags"><span class="',$cls_ldl.'">',$blk_flgd.'</span></td>
               <td data-title="Transactions">',$blk_trans.'</td>
               <td data-title="Amount">',number_format( $blk_amount, 3, '.', '' ).' <small>',$short.'</small></td>
			   <td data-title="Difficulty">',number_format( $blk_mdiff, 3, '.', '' ).'</td>
            </tr>';
}
}
?>
</tbody>
</table>
</div>
</div>
<div class="modal fade" id="GetNodeList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog raw-class">
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span></button><h4 class="modal-title" id="myModalLabel"><?php echo $langconst['ndlist'] ?></h4></div><div class="modal-body"><textarea class="form-control" readonly="" style="cursor:text" rows="15">
<?php
/*
$getPeerInfo = $client->getpeerinfo();
foreach ($getPeerInfo as $key => $peer_info) {
$peer_addr = $peer_info['addr'];
if(strlen($peer_addr) > 26){ //delete big ip [2001:1:d2d:a123:3c31:d58:4a76:c980]:4528
}else{
echo "addnode=$peer_addr";
echo "\n";
}
}
*/
?>
</textarea></div></div>
</div>
</div>
</div>

Based on <a href="https://github.com/Denlon210/ReddByteCoin-block-explorer">github.com/Denlon210/ReddByteCoin-block-explorer</a>

<script type="text/javascript">
                                    $("#showGetNodeList").click(function () {
                                        $("#subloading").show();
                                        $("#subcontent").load("#", function () {
                                            $("#subloading").hide();
                                            $('pre code').each(function (i, block) {
                                                hljs.highlightBlock(block);
                                            });
                                        });
                                    });
        </script>
</body>
</html>
