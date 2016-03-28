<?php include("../config.php"); ?>

<?php 
if($_POST['action']=='getLibrary')
{
	$sql="Select * from yr15_addlibrary where almanac_id='".$_POST['almanac_id']."' and year='".$_POST['year']."'";
	$res=mysql_query($sql);
	?>
    <select name="library_id">
    <option value="">---- Select ----</option>
    <?php
	while($row = mysql_fetch_array($res))
	{
		$sql1="Select * from yr15_library where id='".$row['library_id']."'";
		$res1=mysql_query($sql1);
		
		?>
		<option value="<?=mysql_result($res1,0,'id')?>"><?=mysql_result($res1,0,'library_name')?></option>
		<?php
	}
	?>
    </select>
    <?php } ?>

    