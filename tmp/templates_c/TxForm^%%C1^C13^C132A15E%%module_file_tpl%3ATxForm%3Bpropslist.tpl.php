<?php /* Smarty version 2.6.25, created on 2018-03-12 13:15:26
         compiled from module_file_tpl:TxForm%3Bpropslist.tpl */ ?>
﻿<?php echo '
<script type="text/javascript">
 function atn(id, veiksmas, tipai)
{ 


	var ajaxRequest;
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	


'; ?>

	var appx = Math.random();
<?php echo '
	if (typeof tipai == \'undefined\' ){ var tipai=""; var priedas="";}else{var priedas="a";}	
'; ?>

	var queryString = "?kuris="+id+"&veiksmas="+veiksmas+"&tipai="+tipai+"&appx="+appx;
	ajaxRequest.open("GET", "/modules/Zemelapiai/upd-stat.php" + queryString, true);
	ajaxRequest.send(null); 


<?php echo '

ajaxRequest.onreadystatechange=function() {
  if(ajaxRequest.readyState == 4) {
	var lmn = ajaxRequest.responseText;

        if (lmn != ""){ 
	 if (veiksmas=="settrue"){
	         document.getElementById(false+"-"+priedas+id).style.display = \'none\';
	         document.getElementById(true+"-"+priedas+id).style.display = \'block\';
	 }

	 if (veiksmas=="setfalse"){
	         document.getElementById(false+"-"+priedas+id).style.display = \'block\';
	         document.getElementById(true+"-"+priedas+id).style.display = \'none\';
	 }
        }
  }
}




} 


</script>
'; ?>





<script>
<?php echo '
function suskleisti(kalba) {
 document.getElementById(kalba).style.display=\'none\';

document.getElementById(kalba+\'-s\').style.display=\'none\';
document.getElementById(kalba+\'-i\').style.display=\'block\';
}

function isskleisti(kalba, dydis){

 document.getElementById(kalba).style.display=\'inline\';
document.getElementById(kalba).style.display=\'block\';
document.getElementById(kalba+\'-i\').style.display=\'none\';
document.getElementById(kalba+\'-s\').style.display=\'block\'
}
'; ?>

</script>

<?php echo '
<script>
 function gener (id) {
	var masyv;
	var keiciamas=document.getElementById(\'k-\'+id).value;
	var nuoroda=document.getElementById(\'l-\'+id).href;
	var nlink = "";
	var masyv=nuoroda.split("&");
	var kiek=masyv.length;
	for (i=0; i<kiek; i++){
	 masyv2=masyv[i].split("=");
	 if (masyv2[0] == "m1_npoz") {
	   masyv[i] = masyv2[0]+"="+keiciamas;
	 }
	  nlink = nlink+masyv[i]+"&";
	}
	document.getElementById(\'l-\'+id).href = nlink;

 }
</script>
'; ?>



<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>
<tbody>
<table cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th width="10px"><div>&nbsp;</div></th>
				<th width="20px" style="text-align:center"><div>ID</div></th>
				<th width="300px"><div>Pavadinimas</div></th>
				<th  width="200px"><div>Alias</div></th>
				<th  width="200px"></th>
				<th  width="10px" class="pageicon"><div>Ištrinti</div></th>
			</tr>
		</thead>
</tbody>
<tbody id='lt'>
<?php $this->assign('nmb', '0'); ?>
			<?php $_from = $this->_tpl_vars['prop_array_lt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
<?php $this->assign('nmb', $this->_tpl_vars['nmb']+1); ?>
				<tr class="row1" onmouseover="this.className='row1hover';" onmouseout="this.className='row1';" id='lt-<?php echo $this->_tpl_vars['nmb']; ?>
'>
					<td><div></div></td><td style="text-align:center"><div <?php if ($this->_tpl_vars['entry']->spec): ?>style='color: #d22310'<?php endif; ?>><?php echo $this->_tpl_vars['entry']->formid; ?>
</div></td>
					<td><div><a href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=TxForm,m1_,addedit,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
"><?php echo $this->_tpl_vars['entry']->formname; ?>
</a></div></td>
					<td><div><?php echo $this->_tpl_vars['entry']->formalias; ?>
</div></td>
					<td><?php if ($this->_tpl_vars['entry']->storedb): ?><div><a href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=TxForm,m1_,download_export,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
">Download</a></div><?php endif; ?></td>
					<td><div><a href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=TxForm,m1_,addedit,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
">edit</a>&nbsp;<?php if ($this->_tpl_vars['allow_del'] == 'yes'): ?>|&nbsp;<a onclick="if(!confirm('ar tikrai?')) return false;" href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=TxForm,m1_,deleteprop,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
">delete</a><?php endif; ?></div></td>
				</tr>
				<tr style="height: 0px">
				<td colspan="6">
				</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
</tbody>


<tbody>
<tr>
<td></td><td></td>
</tr>
		</tbody>

</table>

<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>

