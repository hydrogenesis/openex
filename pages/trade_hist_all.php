<center>
<?
require_once ('system/csrfmagic/csrf-magic.php');
$id     = mysql_real_escape_string($_GET["market"]);
$result = mysql_query("SELECT * FROM Wallets WHERE `Id`='$id'");
$name   = mysql_real_escape_string(mysql_result($result, 0, "Acronymn"));
$type = $name;
?>
<div class="top">
<center><?php echo $name; ?> Trade History(most recent first)</center>
</div>
<div class="box">
<table id="page" class="data" style="width: 100%;">
<thead>
<tr>
	<th style="width: 25%;">Price</th>
	<th style="width: 25%;">Quantity(<?php echo $name;?>)</th>	
	<th style="width: 25%;">Total (BTC)</th>	
</tr>
<?php
$sqlz = mysql_query("SELECT * FROM Trade_History WHERE `Market_Id`='$id' ORDER BY `Timestamp` DESC");
while ($row = mysql_fetch_assoc($sqlz)) {
?>
<tr>
	<td style="width: 25%;"><?php echo sprintf('%.8f',$row["Price"]);?></td>
    <td style="width: 25%;"><?php echo sprintf('%.8f',$row["Quantity"]);?></td>
	<td style="width: 25%;"><?php echo sprintf('%.8f',$row["Quantity"] * $row["Price"]);?></td></tr>
	<?php
	}
	?>
</thead>
</table>
</div>
</center>