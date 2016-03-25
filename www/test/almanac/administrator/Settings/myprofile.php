<table width="100%" cellpadding="5" cellspacing="5">
	<tr>
    	<td>
        <h2>Personal Information</h2>
        </td>
    </tr>
	<tr>
		<td>
		<form name="form" id="form1" method="post" action="" enctype="multipart/form-data">
<table width="100%" cellpadding="5" cellspacing="5">
  	<tr>
    	<td width="20%" align="right">User Name <span style="color:#FF0000;">*</span> : </td>
    	<td width="75%">
    <input type="text" name="uname" id="uname" value="<?=$row["uname"]?>" /></td>
  	</tr>
    <tr>
    	<td width="20%" align="right">Full Name <span style="color:#FF0000;">*</span> : </td>
    	<td width="75%">
    <input type="text" name="name" class="required" id="name" value="<?=$row["name"]?>" /></td>
  	</tr>
  	<tr>                             
    	<td align="right">Contact Number <span style="color:#FF0000;">*</span> :</td>
    	<td><input type="text" name="contact" id="contact" class="required number" value="<?=$row["contact"]?>" ></td>
  	</tr>
	<tr>
    	<td align="right">Email Address <span style="color:#FF0000;">*</span> :</td>
    	<td><input type="text" name="email" class="required email" id="uname" value="<?=$row["email"]?>" /></td>
    </tr>
    
     <?php /*?><tr>
                <td align="right">Time Zone :</td>
                <td>
                    <select name='timezone' id='timezone'>
<option value='0'>---- Select Timezone ----</option><option value='Pacific/Niue' >(UTC-11:00) Pacific/Niue</option>
<option value='Pacific/Midway' <?php if($row["timezone"]=="Pacific/Midway"){?>selected<?php } ?>>(UTC-11:00) Pacific/Midway</option>
<option value='Pacific/Pago_Pago' <?php if($row["timezone"]=="Pacific/Pago_Pago"){?>selected<?php } ?>>(UTC-11:00) Pacific/Pago_Pago</option>
<option value='Pacific/Rarotonga' <?php if($row["timezone"]=="Pacific/Rarotonga"){?>selected<?php } ?>>(UTC-10:00) Pacific/Rarotonga</option>
<option value='Pacific/Honolulu'  <?php if($row["timezone"]=="Pacific/Honolulu"){?>selected<?php } ?>>(UTC-10:00) Pacific/Honolulu</option>
<option value='Pacific/Johnston' <?php if($row["timezone"]=="Pacific/Johnston"){?>selected<?php } ?>>(UTC-10:00) Pacific/Johnston</option>
<option value='Pacific/Tahiti' <?php if($row["timezone"]=="Pacific/Tahiti"){?>selected<?php } ?>>(UTC-10:00) Pacific/Tahiti</option>
<option value='Pacific/Marquesas' <?php if($row["timezone"]=="Pacific/Marquesas"){?>selected<?php } ?>>(UTC-09:30) Pacific/Marquesas</option>
<option value='America/Adak' <?php if($row["timezone"]=="America/Adak"){?>selected<?php } ?>>(UTC-09:00) America/Adak</option>
<option value='Pacific/Gambier' <?php if($row["timezone"]=="Pacific/Gambier"){?>selected<?php } ?>>(UTC-09:00) Pacific/Gambier</option>
<option value='America/Nome' <?php if($row["timezone"]=="America/Nome"){?>selected<?php } ?>>(UTC-08:00) America/Nome</option>
<option value='America/Sitka' <?php if($row["timezone"]=="America/Sitka"){?>selected<?php } ?>>(UTC-08:00) America/Sitka</option>
<option value='America/Juneau' <?php if($row["timezone"]=="America/Juneau"){?>selected<?php } ?>>(UTC-08:00) America/Juneau</option>
<option value='America/Metlakatla' <?php if($row["timezone"]=="America/Metlakatla"){?>selected<?php } ?>>(UTC-08:00) America/Metlakatla</option>
<option value='America/Yakutat' <?php if($row["timezone"]=="America/Yakutat"){?>selected<?php } ?>>(UTC-08:00) America/Yakutat</option>
<option value='Pacific/Pitcairn' <?php if($row["timezone"]=="Pacific/Pitcairn"){?>selected<?php } ?>>(UTC-08:00) Pacific/Pitcairn</option>
<option value='America/Anchorage' <?php if($row["timezone"]=="America/Anchorage"){?>selected<?php } ?>>(UTC-08:00) America/Anchorage</option>
<option value='America/Dawson' <?php if($row["timezone"]=="America/Dawson"){?>selected<?php } ?>>(UTC-07:00) America/Dawson</option>
<option value='America/Dawson_Creek'<?php if($row["timezone"]=="America/Dawson_Creek"){?>selected<?php } ?> >(UTC-07:00) America/Dawson_Creek</option>
<option value='America/Hermosillo' <?php if($row["timezone"]=="America/Hermosillo"){?>selected<?php } ?>>(UTC-07:00) America/Hermosillo</option>
<option value='America/Creston' <?php if($row["timezone"]=="America/Creston"){?>selected<?php } ?>>(UTC-07:00) America/Creston</option>
<option value='America/Vancouver' <?php if($row["timezone"]=="America/Vancouver"){?>selected<?php } ?>>(UTC-07:00) America/Vancouver</option>
<option value='America/Tijuana' <?php if($row["timezone"]=="America/Tijuana"){?>selected<?php } ?>>(UTC-07:00) America/Tijuana</option>
<option value='America/Santa_Isabel' <?php if($row["timezone"]=="America/Santa_Isabel"){?>selected<?php } ?>>(UTC-07:00) America/Santa_Isabel</option>
<option value='America/Phoenix' <?php if($row["timezone"]=="America/Phoenix"){?>selected<?php } ?>>(UTC-07:00) America/Phoenix</option>
<option value='America/Los_Angeles' <?php if($row["timezone"]=="America/Los_Angeles"){?>selected<?php } ?>>(UTC-07:00) America/Los_Angeles</option>
<option value='America/Whitehorse' <?php if($row["timezone"]=="America/Whitehorse"){?>selected<?php } ?>>(UTC-07:00) America/Whitehorse</option>
<option value='America/Chihuahua' <?php if($row["timezone"]=="America/Chihuahua"){?>selected<?php } ?>>(UTC-06:00) America/Chihuahua</option>
<option value='America/Costa_Rica' <?php if($row["timezone"]=="America/Costa_Rica"){?>selected<?php } ?>>(UTC-06:00) America/Costa_Rica</option>
<option value='America/Guatemala' <?php if($row["timezone"]=="America/Guatemala"){?>selected<?php } ?>>(UTC-06:00) America/Guatemala</option>
<option value='America/Inuvik' <?php if($row["timezone"]=="America/Inuvik"){?>selected<?php } ?>>(UTC-06:00) America/Inuvik</option>
<option value='America/Managua' <?php if($row["timezone"]=="America/Managua"){?>selected<?php } ?>>(UTC-06:00) America/Managua</option>
<option value='America/Regina' <?php if($row["timezone"]=="America/Regina"){?>selected<?php } ?>>(UTC-06:00) America/Regina</option>
<option value='America/Belize' <?php if($row["timezone"]=="America/Belize"){?>selected<?php } ?>>(UTC-06:00) America/Belize</option>
<option value='America/Boise' <?php if($row["timezone"]=="America/Boise"){?>selected<?php } ?>>(UTC-06:00) America/Boise</option>
<option value='America/Cambridge_Bay' <?php if($row["timezone"]=="America/Cambridge_Bay"){?>selected<?php } ?>>(UTC-06:00) America/Cambridge_Bay</option>
<option value='America/Ojinaga' <?php if($row["timezone"]=="America/Ojinaga"){?>selected<?php } ?>>(UTC-06:00) America/Ojinaga</option>
<option value='America/Mazatlan' <?php if($row["timezone"]=="America/Mazatlan"){?>selected<?php } ?>>(UTC-06:00) America/Mazatlan</option>
<option value='America/Denver' <?php if($row["timezone"]=="America/Denver"){?>selected<?php } ?>>(UTC-06:00) America/Denver</option>
<option value='Pacific/Galapagos' <?php if($row["timezone"]=="Pacific/Galapagos"){?>selected<?php } ?>>(UTC-06:00) Pacific/Galapagos</option>
<option value='Pacific/Easter' <?php if($row["timezone"]=="Pacific/Easter"){?>selected<?php } ?>>(UTC-06:00) Pacific/Easter</option>
<option value='America/Yellowknife' <?php if($row["timezone"]=="America/Yellowknife"){?>selected<?php } ?>>(UTC-06:00) America/Yellowknife</option>
<option value='America/El_Salvador' <?php if($row["timezone"]=="America/El_Salvador"){?>selected<?php } ?>>(UTC-06:00) America/El_Salvador</option>
<option value='America/Swift_Current' <?php if($row["timezone"]=="America/Swift_Current"){?>selected<?php } ?>>(UTC-06:00) America/Swift_Current</option>
<option value='America/Edmonton' <?php if($row["timezone"]=="America/Edmonton"){?>selected<?php } ?>>(UTC-06:00) America/Edmonton</option>
<option value='America/Tegucigalpa' <?php if($row["timezone"]=="America/Tegucigalpa"){?>selected<?php } ?>>(UTC-06:00) America/Tegucigalpa</option>
<option value='America/Bahia_Banderas' <?php if($row["timezone"]=="'America/Bahia_Banderas"){?>selected<?php } ?>>(UTC-05:00) America/Bahia_Banderas</option>
<option value='America/Mexico_City' <?php if($row["timezone"]=="America/Mexico_City"){?>selected<?php } ?>>(UTC-05:00) America/Mexico_City</option>
<option value='America/Atikokan' <?php if($row["timezone"]=="America/Atikokan"){?>selected<?php } ?>>(UTC-05:00) America/Atikokan</option>
<option value='America/Lima' <?php if($row["timezone"]=="America/Lima"){?>selected<?php } ?>>(UTC-05:00) America/Lima</option>
<option value='America/Merida' <?php if($row["timezone"]=="America/Merida'"){?>selected<?php } ?>>(UTC-05:00) America/Merida</option>
<option value='America/Menominee' <?php if($row["timezone"]=="America/Menominee"){?>selected<?php } ?>>(UTC-05:00) America/Menominee</option>
<option value='America/Chicago' <?php if($row["timezone"]=="America/Chicago"){?>selected<?php } ?>>(UTC-05:00) America/Chicago</option>
<option value='America/Eirunepe' <?php if($row["timezone"]=="America/Eirunepe"){?>selected<?php } ?>>(UTC-05:00) America/Eirunepe</option>
<option value='America/Indiana/Knox' <?php if($row["timezone"]=="America/Indiana/Knox"){?>selected<?php } ?>>(UTC-05:00) America/Indiana/Knox</option>
<option value='America/Guayaquil' <?php if($row["timezone"]=="America/Guayaquil"){?>selected<?php } ?>>(UTC-05:00) America/Guayaquil</option>
<option value='America/Indiana/Tell_City' <?php if($row["timezone"]=="America/Indiana/Tell_City"){?>selected<?php } ?>>(UTC-05:00) America/Indiana/Tell_City</option>
<option value='America/Jamaica' <?php if($row["timezone"]=="America/Jamaica"){?>selected<?php } ?>>(UTC-05:00) America/Jamaica</option>
<option value='America/Cancun' <?php if($row["timezone"]=="America/Cancun"){?>selected<?php } ?>>(UTC-05:00) America/Cancun</option>
<option value='America/Cayman' <?php if($row["timezone"]=="America/Cayman"){?>selected<?php } ?>>(UTC-05:00) America/Cayman</option>
<option value='America/Monterrey' <?php if($row["timezone"]=="America/Monterrey"){?>selected<?php } ?>>(UTC-05:00) America/Monterrey</option>
<option value='America/Bogota' <?php if($row["timezone"]=="America/Bogota"){?>selected<?php } ?>>(UTC-05:00) America/Bogota</option>
<option value='America/Matamoros' <?php if($row["timezone"]=="America/Matamoros"){?>selected<?php } ?>>(UTC-05:00) America/Matamoros</option>
<option value='America/Resolute' <?php if($row["timezone"]=="America/Resolute"){?>selected<?php } ?>>(UTC-05:00) America/Resolute</option>
<option value='America/North_Dakota/Center' <?php if($row["timezone"]=="America/North_Dakota/Center"){?>selected<?php } ?>>(UTC-05:00) America/North_Dakota/Center</option>
<option value='America/North_Dakota/New_Salem' <?php if($row["timezone"]=="America/North_Dakota/New_Salem"){?>selected<?php } ?>>(UTC-05:00) America/North_Dakota/New_Salem</option>
<option value='America/Panama' <?php if($row["timezone"]=="America/Panama"){?> selected<?php } ?>>(UTC-05:00) America/Panama</option>
<option value='America/Rankin_Inlet' <?php if($row["timezone"]=="America/Rankin_Inlet"){?>selected<?php } ?>>(UTC-05:00) America/Rankin_Inlet</option>
<option value='America/Rio_Branco' <?php if($row["timezone"]=="America/Rio_Branco"){?>selected<?php } ?>>(UTC-05:00) America/Rio_Branco</option>
<option value='America/Winnipeg' <?php if($row["timezone"]=="PaAmerica/Winnipeg"){?>selected<?php } ?>>(UTC-05:00) America/Winnipeg</option>
<option value='America/North_Dakota/Beulah' <?php if($row["timezone"]=="America/North_Dakota/Beulah"){?>selected<?php } ?>>(UTC-05:00) America/North_Dakota/Beulah</option>
<option value='America/Rainy_River' <?php if($row["timezone"]=="America/Rainy_River"){?>selected<?php } ?>>(UTC-05:00) America/Rainy_River</option>
<option value='America/Caracas' <?php if($row["timezone"]=="America/Caracas"){?>selected<?php } ?>>(UTC-04:30) America/Caracas</option>
<option value='America/Indiana/Vincennes' <?php if($row["timezone"]=="America/Indiana/Vincennes"){?>selected<?php } ?>>(UTC-04:00) America/Indiana/Vincennes</option>
<option value='America/Indiana/Vevay' <?php if($row["timezone"]=="America/Indiana/Vevay"){?>selected<?php } ?>>(UTC-04:00) America/Indiana/Vevay</option>
<option value='America/Indiana/Winamac' <?php if($row["timezone"]=="America/Indiana/Winamac"){?>selected<?php } ?>>(UTC-04:00) America/Indiana/Winamac</option>
<option value='America/Iqaluit' <?php if($row["timezone"]=="America/Iqaluit"){?>selected<?php } ?>>(UTC-04:00) America/Iqaluit</option>
<option value='America/St_Kitts' <?php if($row["timezone"]=="America/St_Kitts"){?>selected<?php } ?>>(UTC-04:00) America/St_Kitts</option>
<option value='America/St_Lucia' <?php if($row["timezone"]=="America/St_Lucia"){?>selected<?php } ?>>(UTC-04:00) America/St_Lucia</option>
<option value='America/St_Vincent' <?php if($row["timezone"]=="America/St_Vincent"){?>selected<?php } ?>>(UTC-04:00) America/St_Vincent</option>
<option value='America/Tortola' <?php if($row["timezone"]=="America/Tortola"){?>selected<?php } ?>>(UTC-04:00) America/Tortola</option>
<option value='America/Indiana/Indianapolis' <?php if($row["timezone"]=="America/Indiana/Indianapolis"){?>selected<?php } ?>>(UTC-04:00) America/Indiana/Indianapolis</option>
<option value='America/Havana' <?php if($row["timezone"]=="America/Havana"){?>selected<?php } ?>>(UTC-04:00) America/Havana</option>
<option value='America/Guyana' <?php if($row["timezone"]=="America/Guyana"){?>selected<?php } ?>>(UTC-04:00) America/Guyana</option>
<option value='America/Indiana/Marengo' <?php if($row["timezone"]=="America/Indiana/Marengo"){?>selected<?php } ?>>(UTC-04:00) America/Indiana/Marengo</option>
<option value='America/Toronto' <?php if($row["timezone"]=="America/Toronto"){?>selected<?php } ?>>(UTC-04:00) America/Toronto</option>
<option value='America/Indiana/Petersburg' <?php if($row["timezone"]=="America/Indiana/Petersburg"){?>selected<?php } ?>>(UTC-04:00) America/Indiana/Petersburg</option>
<option value='America/St_Barthelemy' <?php if($row["timezone"]=="America/St_Barthelemy"){?>selected<?php } ?>>(UTC-04:00) America/St_Barthelemy</option>
<option value='America/Thunder_Bay' <?php if($row["timezone"]=="America/Thunder_Bay"){?>selected<?php } ?>>(UTC-04:00) America/Thunder_Bay</option>
<option value='America/St_Thomas' <?php if($row["timezone"]=="America/St_Thomas"){?>selected<?php } ?>>(UTC-04:00) America/St_Thomas</option>
<option value='America/Kentucky/Louisville' <?php if($row["timezone"]=="America/Kentucky/Louisville"){?>selected<?php } ?>>(UTC-04:00) America/Kentucky/Louisville</option>
<option value='America/Marigot' <?php if($row["timezone"]=="America/Marigot"){?>selected<?php } ?>>(UTC-04:00) America/Marigot</option>
<option value='America/Manaus' <?php if($row["timezone"]=="America/Manaus"){?>selected<?php } ?>>(UTC-04:00) America/Manaus</option>
<option value='America/Lower_Princes' <?php if($row["timezone"]=="America/Lower_Princes"){?>selected<?php } ?>>(UTC-04:00) America/Lower_Princes</option>
<option value='America/Martinique' <?php if($row["timezone"]=="America/Martinique"){?>selected<?php } ?>>(UTC-04:00) America/Martinique</option>
<option value='America/Nipigon' <?php if($row["timezone"]=="America/Nipigon"){?>selected<?php } ?>>(UTC-04:00) America/Nipigon</option>
<option value='America/Nassau' <?php if($row["timezone"]=="America/Nassau"){?>selected<?php } ?>>(UTC-04:00) America/Nassau</option>
<option value='America/New_York' <?php if($row["timezone"]=="America/New_York"){?>selected<?php } ?>>(UTC-04:00) America/New_York</option>
<option value='America/Pangnirtung' <?php if($row["timezone"]=="America/Pangnirtung"){?>selected<?php } ?>>(UTC-04:00) America/Pangnirtung</option>
<option value='America/Port-au-Prince' <?php if($row["timezone"]=="Port-au-Prince"){?>selected<?php } ?>>(UTC-04:00) America/Port-au-Prince</option>
<option value='America/Kentucky/Monticello' <?php if($row["timezone"]=="America/Kentucky/Monticello"){?>selected<?php } ?>>(UTC-04:00) America/Kentucky/Monticello</option>
<option value='America/Montserrat' <?php if($row["timezone"]=="America/Montserrat"){?>selected<?php } ?>>(UTC-04:00) America/Montserrat</option>
<option value='America/Santiago' <?php if($row["timezone"]=="America/Santiago"){?>selected<?php } ?>>(UTC-04:00) America/Santiago</option>
<option value='America/Puerto_Rico' <?php if($row["timezone"]=="America/Puerto_Rico"){?>selected<?php }?> >(UTC-04:00) America/Puerto_Rico</option>
<option value='America/Porto_Velho' <?php if($row["timezone"]=="America/Porto_Velho"){?>selected<?php } ?>>(UTC-04:00) America/Porto_Velho</option>
<option value='America/La_Paz' <?php if($row["timezone"]=="America/La_Paz"){?>selected<?php } ?>>(UTC-04:00) America/La_Paz</option>
<option value='America/Kralendijk' <?php if($row["timezone"]=="America/Kralendijk"){?>selected<?php } ?>>(UTC-04:00) America/Kralendijk</option>
<option value='America/Santo_Domingo' <?php if($row["timezone"]=="America/Santo_Domingo"){?>selected<?php } ?>>(UTC-04:00) America/Santo_Domingo</option>
<option value='America/Port_of_Spain' <?php if($row["timezone"]=="America/Port_of_Spain"){?>selected<?php } ?>>(UTC-04:00) America/Port_of_Spain</option>
<option value='America/Campo_Grande' <?php if($row["timezone"]=="America/Campo_Grande"){?>selected<?php } ?>>(UTC-04:00) America/Campo_Grande</option>
<option value='America/Antigua' <?php if($row["timezone"]=="America/Antigua"){?>selected<?php } ?>>(UTC-04:00) America/Antigua</option>
<option value='America/Curacao' <?php if($row["timezone"]=="America/Curacao"){?>selected<?php } ?>>(UTC-04:00) America/Curacao</option>
<option value='America/Anguilla' <?php if($row["timezone"]=="America/Anguilla"){?>selected<?php } ?>>(UTC-04:00) America/Anguilla</option>
<option value='America/Boa_Vista' <?php if($row["timezone"]=="America/Boa_Vista"){?>selected<?php } ?>>(UTC-04:00) America/Boa_Vista</option>
<option value='America/Blanc-Sablon' <?php if($row["timezone"]=="America/Blanc-Sablon"){?>selected<?php } ?>>(UTC-04:00) America/Blanc-Sablon</option>
<option value='America/Aruba' <?php if($row["timezone"]=="America/Aruba"){?>selected<?php } ?>>(UTC-04:00) America/Aruba</option>
<option value='America/Asuncion' <?php if($row["timezone"]=="America/Asuncion"){?>selected<?php } ?>>(UTC-04:00) America/Asuncion</option>
<option value='America/Barbados' <?php if($row["timezone"]=="America/Barbados"){?>selected<?php } ?>>(UTC-04:00) America/Barbados</option>
<option value='America/Detroit' <?php if($row["timezone"]=="America/Detroit"){?>selected<?php } ?>>(UTC-04:00) America/Detroit</option>
<option value='America/Cuiaba' <?php if($row["timezone"]=="America/Cuiaba"){?>selected<?php } ?>>(UTC-04:00) America/Cuiaba</option>
<option value='America/Guadeloupe' <?php if($row["timezone"]=="America/Guadeloupe"){?>selected<?php } ?>>(UTC-04:00) America/Guadeloupe</option>
<option value='America/Grand_Turk' <?php if($row["timezone"]=="America/Grand_Turk"){?>selected<?php } ?>>(UTC-04:00) America/Grand_Turk</option>
<option value='America/Grenada' <?php if($row["timezone"]=="America/Grenada"){?>selected<?php } ?>>(UTC-04:00) America/Grenada</option>
<option value='America/Dominica' <?php if($row["timezone"]=="America/Dominica"){?>selected<?php } ?>>(UTC-04:00) America/Dominica</option>
<option value='America/Argentina/Rio_Gallegos' <?php if($row["timezone"]=="America/Argentina/Rio_Gallegos"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Rio_Gallegos</option>
<option value='America/Argentina/Jujuy' <?php if($row["timezone"]=="America/Argentina/Jujuy"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Jujuy</option>
<option value='America/Argentina/La_Rioja' <?php if($row["timezone"]=="America/Argentina/La_Rioja"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/La_Rioja</option>
<option value='America/Montevideo' <?php if($row["timezone"]=="America/Montevideo"){?>selected<?php } ?>>(UTC-03:00) America/Montevideo</option>
<option value='America/Argentina/Cordoba' <?php if($row["timezone"]=="America/Argentina/Cordoba"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Cordoba</option>
<option value='America/Moncton' <?php if($row["timezone"]=="America/Moncton"){?>selected<?php } ?>>(UTC-03:00) America/Moncton</option>
<option value='America/Argentina/Mendoza' <?php if($row["timezone"]=="America/Argentina/Mendoza"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Mendoza</option>
<option value='America/Thule' <?php if($row["timezone"]=="America/Thule"){?>selected<?php } ?>>(UTC-03:00) America/Thule</option>
<option value='America/Argentina/Salta' <?php if($row["timezone"]=="America/Argentina/Salta"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Salta</option>
<option value='America/Recife' <?php if($row["timezone"]=="America/Recife"){?>selected<?php } ?>>(UTC-03:00) America/Recife</option>
<option value='Atlantic/Stanley' <?php if($row["timezone"]=="Atlantic/Stanley"){?>selected<?php } ?>>(UTC-03:00) Atlantic/Stanley</option>
<option value='America/Santarem' <?php if($row["timezone"]=="America/Santarem"){?>selected<?php } ?>>(UTC-03:00) America/Santarem</option>
<option value='America/Argentina/Buenos_Aires' <?php if($row["timezone"]=="America/Argentina/Buenos_Aires"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Buenos_Aires</option>
<option value='America/Sao_Paulo' <?php if($row["timezone"]=="America/Sao_Paulo"){?>selected<?php } ?>>(UTC-03:00) America/Sao_Paulo</option>
<option value='Atlantic/Bermuda' <?php if($row["timezone"]=="Atlantic/Bermuda"){?>selected<?php } ?>>(UTC-03:00) Atlantic/Bermuda</option>
<option value='America/Argentina/Catamarca' <?php if($row["timezone"]=="America/Argentina/Catamarca"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Catamarca</option>
<option value='America/Paramaribo' <?php if($row["timezone"]=="America/Paramaribo"){?>selected<?php } ?>>(UTC-03:00) America/Paramaribo</option>
<option value='America/Araguaina' <?php if($row["timezone"]=="America/Araguaina"){?>selected<?php } ?>>(UTC-03:00) America/Araguaina</option>
<option value='America/Belem' <?php if($row["timezone"]=="America/Belem"){?>selected<?php } ?>>(UTC-03:00) America/Belem</option>
<option value='America/Maceio' <?php if($row["timezone"]=="America/Maceio"){?>selected<?php } ?>>(UTC-03:00) America/Maceio</option>
<option value='America/Cayenne' <?php if($row["timezone"]=="America/Cayenne"){?>selected<?php } ?>>(UTC-03:00) America/Cayenne</option>
<option value='America/Argentina/San_Juan' <?php if($row["timezone"]=="America/Argentina/San_Juan"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/San_Juan</option>
<option value='America/Glace_Bay' <?php if($row["timezone"]=="America/Glace_Bay"){?>selected<?php } ?>>(UTC-03:00) America/Glace_Bay</option>
<option value='America/Halifax' <?php if($row["timezone"]=="America/Halifax"){?>selected<?php } ?>>(UTC-03:00) America/Halifax</option>
<option value='America/Bahia' <?php if($row["timezone"]=="America/Bahia"){?>selected<?php } ?>>(UTC-03:00) America/Bahia</option>
<option value='America/Argentina/San_Luis' <?php if($row["timezone"]=="America/Argentina/San_Luis"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/San_Luis</option>
<option value='America/Goose_Bay' <?php if($row["timezone"]=="America/Goose_Bay"){?>selected<?php } ?>>(UTC-03:00) America/Goose_Bay</option>
<option value='America/Fortaleza' <?php if($row["timezone"]=="America/Fortaleza"){?>selected<?php } ?>>(UTC-03:00) America/Fortaleza</option>
<option value='America/Argentina/Tucuman' <?php if($row["timezone"]=="America/Argentina/Tucuman"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Tucuman</option>
<option value='America/Argentina/Ushuaia' <?php if($row["timezone"]=="America/Argentina/Ushuaia"){?>selected<?php } ?>>(UTC-03:00) America/Argentina/Ushuaia</option>
<option value='America/St_Johns' <?php if($row["timezone"]=="America/St_Johns"){?>selected<?php } ?>>(UTC-02:30) America/St_Johns</option>
<option value='America/Noronha' <?php if($row["timezone"]=="America/Belem"){?>selected<?php } ?>>(UTC-02:00) America/Noronha</option>
<option value='America/Miquelon' <?php if($row["timezone"]=="America/Miquelon"){?>selected<?php } ?>>(UTC-02:00) America/Miquelon</option>
<option value='Atlantic/South_Georgia' <?php if($row["timezone"]=="Atlantic/South_Georgia"){?>selected<?php } ?>>(UTC-02:00) Atlantic/South_Georgia</option>
<option value='America/Godthab' <?php if($row["timezone"]=="America/Godthab"){?>selected<?php } ?>>(UTC-02:00) America/Godthab</option>
<option value='Atlantic/Cape_Verde' <?php if($row["timezone"]=="Atlantic/Cape_Verde"){?>selected<?php } ?>>(UTC-01:00) Atlantic/Cape_Verde</option>
<option value='Africa/Bamako' <?php if($row["timezone"]=="Africa/Bamako"){?>selected<?php } ?>>(UTC+00:00) Africa/Bamako</option>
<option value='Africa/Ouagadougou' <?php if($row["timezone"]=="Africa/Ouagadougou"){?>selected<?php } ?>>(UTC+00:00) Africa/Ouagadougou</option>
<option value='Africa/Freetown' <?php if($row["timezone"]=="Africa/Freetown"){?>selected<?php } ?>>(UTC+00:00) Africa/Freetown</option>
<option value='Africa/Sao_Tome' <?php if($row["timezone"]=="Africa/Sao_Tome"){?>selected<?php } ?>>(UTC+00:00) Africa/Sao_Tome</option>
<option value='Africa/Conakry' <?php if($row["timezone"]=="Africa/Conakry"){?>selected<?php } ?>>(UTC+00:00) Africa/Conakry</option>
<option value='Africa/Nouakchott' <?php if($row["timezone"]=="Africa/Nouakchott"){?>selected<?php } ?>>(UTC+00:00) Africa/Nouakchott</option>
<option value='Africa/Lome' <?php if($row["timezone"]=="Africa/Lome"){?>selected<?php } ?>>(UTC+00:00) Africa/Lome</option>
<option value='Atlantic/Azores' <?php if($row["timezone"]=="Atlantic/Azores"){?>selected<?php } ?>>(UTC+00:00) Atlantic/Azores</option>
<option value='Atlantic/Reykjavik' <?php if($row["timezone"]=="Atlantic/Reykjavik"){?>selected<?php } ?>>(UTC+00:00) Atlantic/Reykjavik</option>
<option value='Africa/Abidjan' <?php if($row["timezone"]=="Africa/Abidjan"){?>selected<?php } ?>>(UTC+00:00) Africa/Abidjan</option>
<option value='Atlantic/St_Helena' <?php if($row["timezone"]=="Atlantic/St_Helena"){?>selected<?php } ?>>(UTC+00:00) Atlantic/St_Helena</option>
<option value='Africa/Monrovia' <?php if($row["timezone"]=="Africa/Monrovia"){?>selected<?php } ?>>(UTC+00:00) Africa/Monrovia</option>
<option value='America/Danmarkshavn' <?php if($row["timezone"]=="America/Danmarkshavn"){?>selected<?php } ?>>(UTC+00:00) America/Danmarkshavn</option>
<option value='America/Scoresbysund' <?php if($row["timezone"]=="America/Scoresbysund"){?>selected<?php } ?>>(UTC+00:00) America/Scoresbysund</option>
<option value='Africa/Banjul' <?php if($row["timezone"]=="Africa/Banjul"){?>selected<?php } ?>>(UTC+00:00) Africa/Banjul</option>
<option value='Africa/Dakar' <?php if($row["timezone"]=="Africa/Dakar"){?>selected<?php } ?>>(UTC+00:00) Africa/Dakar</option>
<option value='Africa/Accra' <?php if($row["timezone"]=="Africa/Accra"){?>selected<?php } ?>>(UTC+00:00) Africa/Accra</option>
<option value='Africa/Bissau' <?php if($row["timezone"]=="Africa/Bissau"){?>selected<?php } ?>>(UTC+00:00) Africa/Bissau</option>
<option value='Africa/Luanda' <?php if($row["timezone"]=="Africa/Luanda"){?>selected<?php } ?>>(UTC+01:00) Africa/Luanda</option>
<option value='Europe/Guernsey' <?php if($row["timezone"]=="Europe/Guernsey"){?>selected<?php } ?>>(UTC+01:00) Europe/Guernsey</option>
<option value='Africa/Casablanca' <?php if($row["timezone"]=="Africa/Casablanca"){?>selected<?php } ?>>(UTC+01:00) Africa/Casablanca</option>
<option value='Africa/Brazzaville' <?php if($row["timezone"]=="Africa/Brazzaville"){?>selected<?php } ?>>(UTC+01:00) Africa/Brazzaville</option>
<option value='Africa/Algiers' <?php if($row["timezone"]=="Africa/Algiers"){?>selected<?php } ?>>(UTC+01:00) Africa/Algiers</option>
<option value='Europe/Dublin' <?php if($row["timezone"]=="Europe/Dublin"){?>selected<?php } ?>>(UTC+01:00) Europe/Dublin</option>
<option value='Europe/Lisbon' <?php if($row["timezone"]=="Europe/Lisbon"){?>selected<?php } ?>>(UTC+01:00) Europe/Lisbon</option>
<option value='Africa/Lagos' <?php if($row["timezone"]=="Africa/Lagos"){?>selected<?php } ?>>(UTC+01:00) Africa/Lagos</option>
<option value='Africa/Libreville' <?php if($row["timezone"]=="Africa/Libreville"){?>selected<?php } ?>>(UTC+01:00) Africa/Libreville</option>
<option value='Africa/Niamey' <?php if($row["timezone"]=="Africa/Niamey"){?>selected<?php } ?>>(UTC+01:00) Africa/Niamey</option>
<option value='Europe/Isle_of_Man' <?php if($row["timezone"]=="Europe/Isle_of_Man"){?>selected<?php } ?>>(UTC+01:00) Europe/Isle_of_Man</option>
<option value='Atlantic/Faroe' <?php if($row["timezone"]=="Atlantic/Faroe"){?>selected<?php } ?>>(UTC+01:00) Atlantic/Faroe</option>
<option value='Africa/Windhoek' <?php if($row["timezone"]=="Africa/Windhoek"){?>selected<?php } ?>>(UTC+01:00) Africa/Windhoek</option>
<option value='Atlantic/Madeira' <?php if($row["timezone"]=="Atlantic/Madeira"){?>selected<?php } ?>>(UTC+01:00) Atlantic/Madeira</option>
<option value='Europe/Jersey' <?php if($row["timezone"]=="Europe/Jersey"){?>selected<?php } ?>>(UTC+01:00) Europe/Jersey</option>
<option value='Africa/Douala' <?php if($row["timezone"]=="Africa/Douala"){?>selected<?php } ?>>(UTC+01:00) Africa/Douala</option>
<option value='Africa/El_Aaiun' <?php if($row["timezone"]=="Africa/El_Aaiun"){?>selected<?php } ?>>(UTC+01:00) Africa/El_Aaiun</option>
<option value='Atlantic/Canary' <?php if($row["timezone"]=="Atlantic/Canary"){?>selected<?php } ?>>(UTC+01:00) Atlantic/Canary</option>
<option value='Africa/Tunis' <?php if($row["timezone"]=="Africa/Tunis"){?>selected<?php } ?>>(UTC+01:00) Africa/Tunis</option>
<option value='Europe/London' <?php if($row["timezone"]=="Europe/London"){?>selected<?php } ?>>(UTC+01:00) Europe/London</option>
<option value='Africa/Malabo' <?php if($row["timezone"]=="Africa/Malabo"){?>selected<?php } ?>>(UTC+01:00) Africa/Malabo</option>
<option value='Africa/Kinshasa' <?php if($row["timezone"]=="Africa/Kinshasa"){?>selected<?php } ?>>(UTC+01:00) Africa/Kinshasa</option>
<option value='Africa/Ndjamena' <?php if($row["timezone"]=="Africa/Ndjamena"){?>selected<?php } ?>>(UTC+01:00) Africa/Ndjamena</option>
<option value='Africa/Bangui' <?php if($row["timezone"]=="Africa/Bangui"){?>selected<?php } ?>>(UTC+01:00) Africa/Bangui</option>
<option value='Africa/Porto-Novo' <?php if($row["timezone"]=="Africa/Porto-Novo"){?>selected<?php } ?>>(UTC+01:00) Africa/Porto-Novo</option>
<option value='Europe/Zurich' <?php if($row["timezone"]=="Europe/Zurich"){?>selected<?php } ?>>(UTC+02:00) Europe/Zurich</option>
<option value='Europe/Skopje' <?php if($row["timezone"]=="Europe/Skopje"){?>selected<?php } ?>>(UTC+02:00) Europe/Skopje</option>
<option value='Europe/Monaco' <?php if($row["timezone"]=="Europe/Monaco"){?>selected<?php } ?>>(UTC+02:00) Europe/Monaco</option>
<option value='Europe/San_Marino' <?php if($row["timezone"]=="Europe/San_Marino"){?>selected<?php } ?>>(UTC+02:00) Europe/San_Marino</option>
<option value='Europe/Sarajevo' <?php if($row["timezone"]=="Europe/Sarajevo"){?>selected<?php } ?>>(UTC+02:00) Europe/Sarajevo</option>
<option value='Europe/Rome' <?php if($row["timezone"]=="Europe/Rome"){?>selected<?php } ?>>(UTC+02:00) Europe/Rome</option>
<option value='Europe/Oslo' <?php if($row["timezone"]=="Europe/Oslo"){?>selected<?php } ?>>(UTC+02:00) Europe/Oslo</option>
<option value='Europe/Podgorica' <?php if($row["timezone"]=="Europe/Podgorica"){?>selected<?php } ?>>(UTC+02:00) Europe/Podgorica</option>
<option value='Europe/Prague' <?php if($row["timezone"]=="Europe/Prague"){?>selected<?php } ?>>(UTC+02:00) Europe/Prague</option>
<option value='Europe/Paris' <?php if($row["timezone"]=="Europe/Paris"){?>selected<?php } ?>>(UTC+02:00) Europe/Paris</option>
<option value='Europe/Malta' <?php if($row["timezone"]=="Europe/Malta"){?>selected<?php } ?>>(UTC+02:00) Europe/Malta</option>
<option value='Europe/Madrid' <?php if($row["timezone"]=="Europe/Madrid"){?>selected<?php } ?>>(UTC+02:00) Europe/Madrid</option>
<option value='Europe/Vatican' <?php if($row["timezone"]=="Europe/Vatican"){?>selected<?php } ?>>(UTC+02:00) Europe/Vatican</option>
<option value='Europe/Vienna' <?php if($row["timezone"]=="Europe/Vienna"){?>selected<?php } ?>>(UTC+02:00) Europe/Vienna</option>
<option value='Europe/Warsaw' <?php if($row["timezone"]=="Europe/Warsaw"){?>selected<?php } ?>>(UTC+02:00) Europe/Warsaw</option>
<option value='Europe/Vaduz' <?php if($row["timezone"]=="Europe/Vaduz"){?>selected<?php } ?>>(UTC+02:00) Europe/Vaduz</option>
<option value='Europe/Ljubljana' <?php if($row["timezone"]=="Europe/Ljubljana"){?>selected<?php } ?>><?php if($row["timezone"]=="America/Belem"){?>selected<?php } ?>(UTC+02:00) Europe/Ljubljana</option>
<option value='Europe/Stockholm' <?php if($row["timezone"]=="Europe/Stockholm"){?>selected<?php } ?>>(UTC+02:00) Europe/Stockholm</option>
<option value='Europe/Luxembourg' <?php if($row["timezone"]=="Europe/Luxembourg"){?>selected<?php } ?>>(UTC+02:00) Europe/Luxembourg</option>
<option value='Europe/Tirane' <?php if($row["timezone"]=="Europe/Tirane"){?>selected<?php } ?>>(UTC+02:00) Europe/Tirane</option>
<option value='Europe/Zagreb'<?php if($row["timezone"]=="Europe/Zagreb"){?>selected<?php } ?> >(UTC+02:00) Europe/Zagreb</option>
<option value='Europe/Brussels' <?php if($row["timezone"]=="Europe/Brussels"){?>selected<?php } ?>>(UTC+02:00) Europe/Brussels</option>
<option value='Europe/Bratislava' <?php if($row["timezone"]=="Europe/Bratislava"){?>selected<?php } ?>>(UTC+02:00) Europe/Bratislava</option>
<option value='Africa/Tripoli' <?php if($row["timezone"]=="Africa/Tripoli"){?>selected<?php } ?>>(UTC+02:00) Africa/Tripoli</option>
<option value='Africa/Ceuta' <?php if($row["timezone"]=="Africa/Ceuta"){?>selected<?php } ?>>(UTC+02:00) Africa/Ceuta</option>
<option value='Africa/Mbabane'<?php if($row["timezone"]=="Africa/Mbabane"){?>selected<?php } ?> >(UTC+02:00) Africa/Mbabane</option>
<option value='Africa/Blantyre' <?php if($row["timezone"]=="Africa/Blantyre"){?>selected<?php } ?>>(UTC+02:00) Africa/Blantyre</option>
<option value='Africa/Maseru' <?php if($row["timezone"]=="Africa/Maseru"){?>selected<?php } ?>>(UTC+02:00) Africa/Maseru</option>
<option value='Europe/Berlin' <?php if($row["timezone"]=="Europe/Berlin"){?>selected<?php } ?>>(UTC+02:00) Europe/Berlin</option>
<option value='Europe/Amsterdam' <?php if($row["timezone"]=="Europe/Amsterdam"){?>selected<?php } ?>>(UTC+02:00) Europe/Amsterdam</option>
<option value='Africa/Harare' <?php if($row["timezone"]=="Africa/Harare"){?>selected<?php } ?>>(UTC+02:00) Africa/Harare</option>
<option value='Africa/Gaborone' <?php if($row["timezone"]=="Africa/Gaborone"){?>selected<?php } ?>>(UTC+02:00) Africa/Gaborone</option>
<option value='Africa/Johannesburg' <?php if($row["timezone"]=="Africa/Johannesburg"){?>selected<?php } ?>>(UTC+02:00) Africa/Johannesburg</option>
<option value='Europe/Belgrade' <?php if($row["timezone"]=="Europe/Belgrade"){?>selected<?php } ?>>(UTC+02:00) Europe/Belgrade</option>
<option value='Europe/Andorra' <?php if($row["timezone"]=="Europe/Andorra"){?>selected<?php } ?>>(UTC+02:00) Europe/Andorra</option>
<option value='Africa/Lusaka' <?php if($row["timezone"]=="Africa/Lusaka"){?>selected<?php } ?>>(UTC+02:00) Africa/Lusaka</option>
<option value='Africa/Maputo' <?php if($row["timezone"]=="Africa/Maputo"){?>selected<?php } ?>>(UTC+02:00) Africa/Maputo</option>
<option value='Europe/Gibraltar' <?php if($row["timezone"]=="Europe/Gibraltar"){?>selected<?php } ?>>(UTC+02:00) Europe/Gibraltar</option>
<option value='Europe/Busingen'<?php if($row["timezone"]=="Europe/Busingen"){?>selected<?php } ?> >(UTC+02:00) Europe/Busingen</option>
<option value='Africa/Lubumbashi' <?php if($row["timezone"]=="Africa/Lubumbashi"){?>selected<?php } ?>>(UTC+02:00) Africa/Lubumbashi</option>
<option value='Europe/Copenhagen' <?php if($row["timezone"]=="Europe/Copenhagen"){?>selected<?php } ?>>(UTC+02:00) Europe/Copenhagen</option>
<option value='Europe/Budapest' <?php if($row["timezone"]=="Europe/Budapest"){?>selected<?php } ?>>(UTC+02:00) Europe/Budapest</option>
<option value='Africa/Kigali' <?php if($row["timezone"]=="Africa/Kigali"){?>selected<?php } ?>>(UTC+02:00) Africa/Kigali</option>
<option value='Africa/Bujumbura' <?php if($row["timezone"]=="Africa/Bujumbura"){?>selected<?php } ?>>(UTC+02:00) Africa/Bujumbura</option>
<option value='Europe/Athens' <?php if($row["timezone"]=="Europe/Athens"){?>selected<?php } ?>>(UTC+03:00) Europe/Athens</option>
<option value='Europe/Helsinki' <?php if($row["timezone"]=="Europe/Helsinki"){?>selected<?php } ?>>(UTC+03:00) Europe/Helsinki</option>
<option value='Europe/Istanbul' <?php if($row["timezone"]=="Europe/Istanbul"){?>selected<?php } ?>>(UTC+03:00) Europe/Istanbul</option>
<option value='Europe/Minsk' <?php if($row["timezone"]=="Europe/Minsk"){?>selected<?php } ?>>(UTC+03:00) Europe/Minsk</option>
<option value='Asia/Riyadh' <?php if($row["timezone"]=="Asia/Riyadh"){?>selected<?php } ?>>(UTC+03:00) Asia/Riyadh</option>
<option value='Europe/Bucharest' <?php if($row["timezone"]=="Europe/Bucharest"){?>selected<?php } ?>>(UTC+03:00) Europe/Bucharest</option>
<option value='Europe/Kiev' <?php if($row["timezone"]=="Europe/Kiev"){?>selected<?php } ?>>(UTC+03:00) Europe/Kiev</option>
<option value='Europe/Mariehamn' <?php if($row["timezone"]=="Europe/Mariehamn"){?>selected<?php } ?>>(UTC+03:00) Europe/Mariehamn</option>
<option value='Europe/Chisinau' <?php if($row["timezone"]=="Europe/Chisinau"){?>selected<?php } ?>>(UTC+03:00) Europe/Chisinau</option>
<option value='Europe/Kaliningrad' <?php if($row["timezone"]=="Europe/Kaliningrad"){?>selected<?php } ?>>(UTC+03:00) Europe/Kaliningrad</option>
<option value='Asia/Baghdad' <?php if($row["timezone"]=="Asia/Baghdad"){?>selected<?php } ?>>(UTC+03:00) Asia/Baghdad</option>
<option value='Indian/Comoro' <?php if($row["timezone"]=="Indian/Comoro"){?>selected<?php } ?>>(UTC+03:00) Indian/Comoro</option>
<option value='Africa/Addis_Ababa' <?php if($row["timezone"]=="Africa/Addis_Ababa"){?>selected<?php } ?>>(UTC+03:00) Africa/Addis_Ababa</option>
<option value='Indian/Antananarivo' <?php if($row["timezone"]=="Indian/Antananarivo"){?>selected<?php } ?>>(UTC+03:00) Indian/Antananarivo</option>
<option value='Asia/Amman' <?php if($row["timezone"]=="Asia/Amman"){?>selected<?php } ?>>(UTC+03:00) Asia/Amman</option>
<option value='Asia/Aden' <?php if($row["timezone"]=="Asia/Aden"){?>selected<?php } ?>>(UTC+03:00) Asia/Aden</option>
<option value='Asia/Jerusalem' <?php if($row["timezone"]=="Asia/Jerusalem"){?>selected<?php } ?>>(UTC+03:00) Asia/Jerusalem</option>
<option value='Asia/Qatar' <?php if($row["timezone"]=="Asia/Qatar"){?>selected<?php } ?>>(UTC+03:00) Asia/Qatar</option>
<option value='Africa/Asmara' <?php if($row["timezone"]=="Africa/Asmara"){?>selected<?php } ?>>(UTC+03:00) Africa/Asmara</option>
<option value='Africa/Khartoum' <?php if($row["timezone"]=="Africa/Khartoum"){?>selected<?php } ?>>(UTC+03:00) Africa/Khartoum</option>
<option value='Asia/Beirut'<?php if($row["timezone"]=="Asia/Beirut"){?>selected<?php } ?> >(UTC+03:00) Asia/Beirut</option>
<option value='Indian/Mayotte' <?php if($row["timezone"]=="Indian/Mayotte"){?>selected<?php } ?>>(UTC+03:00) Indian/Mayotte</option>
<option value='Asia/Gaza' <?php if($row["timezone"]=="Asia/Gaza"){?>selected<?php } ?>>(UTC+03:00) Asia/Gaza</option>
<option value='Asia/Hebron' <?php if($row["timezone"]=="Asia/Hebron"){?>selected<?php } ?>>(UTC+03:00) Asia/Hebron</option>
<option value='Asia/Bahrain' <?php if($row["timezone"]=="Asia/Bahrain"){?>selected<?php } ?>>(UTC+03:00) Asia/Bahrain</option>
<option value='Europe/Zaporozhye' <?php if($row["timezone"]=="Europe/Zaporozhye"){?>selected<?php } ?>>(UTC+03:00) Europe/Zaporozhye</option>
<option value='Africa/Cairo' <?php if($row["timezone"]=="Africa/Cairo"){?>selected<?php } ?>>(UTC+03:00) Africa/Cairo</option>
<option value='Asia/Nicosia' <?php if($row["timezone"]=="Asia/Nicosia"){?>selected<?php } ?>>(UTC+03:00) Asia/Nicosia</option>
<option value='Africa/Kampala' <?php if($row["timezone"]=="Africa/Kampala"){?>selected<?php } ?>>(UTC+03:00) Africa/Kampala</option>
<option value='Africa/Juba' <?php if($row["timezone"]=="Africa/Juba"){?>selected<?php } ?>>(UTC+03:00) Africa/Juba</option>
<option value='Africa/Dar_es_Salaam' <?php if($row["timezone"]=="Africa/Dar_es_Salaam"){?>selected<?php } ?>>(UTC+03:00) Africa/Dar_es_Salaam</option>
<option value='Europe/Riga' <?php if($row["timezone"]=="Europe/Riga"){?>selected<?php } ?>>(UTC+03:00) Europe/Riga</option>
<option value='Africa/Djibouti' <?php if($row["timezone"]=="Africa/Djibouti"){?>selected<?php } ?>>(UTC+03:00) Africa/Djibouti</option>
<option value='Africa/Nairobi'<?php if($row["timezone"]=="Africa/Nairobi"){?>selected<?php } ?> >(UTC+03:00) Africa/Nairobi</option>
<option value='Africa/Mogadishu' <?php if($row["timezone"]=="Africa/Mogadishu"){?>selected<?php } ?>>(UTC+03:00) Africa/Mogadishu</option>
<option value='Europe/Uzhgorod' <?php if($row["timezone"]=="Europe/Uzhgorod"){?>selected<?php } ?>>(UTC+03:00) Europe/Uzhgorod</option>
<option value='Europe/Vilnius' <?php if($row["timezone"]=="Europe/Vilnius"){?>selected<?php } ?>>(UTC+03:00) Europe/Vilnius</option>
<option value='Asia/Kuwait' <?php if($row["timezone"]=="Asia/Kuwait"){?>selected<?php } ?>>(UTC+03:00) Asia/Kuwait</option>
<option value='Europe/Tallinn'<?php if($row["timezone"]=="Europe/Tallinn"){?>selected<?php } ?> >(UTC+03:00) Europe/Tallinn</option>
<option value='Europe/Sofia' <?php if($row["timezone"]=="Europe/Sofia"){?>selected<?php } ?>>(UTC+03:00) Europe/Sofia</option>
<option value='Asia/Damascus' <?php if($row["timezone"]=="Asia/Damascus"){?>selected<?php } ?>>(UTC+03:00) Asia/Damascus</option>
/////////<option value='Indian/Mahe'<?php if($row["timezone"]=="America/Belem"){?>selected<?php } ?> >(UTC+04:00) Indian/Mahe</option>
<option value='Indian/Reunion' <?php if($row["timezone"]=="Indian/Reunion"){?>selected<?php } ?>>(UTC+04:00) Indian/Reunion</option>
<option value='Europe/Volgograd' <?php if($row["timezone"]=="Europe/Volgograd"){?>selected<?php } ?>>(UTC+04:00) Europe/Volgograd</option>
<option value='Europe/Simferopol' <?php if($row["timezone"]=="Europe/Simferopol"){?>selected<?php } ?>>(UTC+04:00) Europe/Simferopol</option>
<option value='Asia/Tbilisi' <?php if($row["timezone"]=="Asia/Tbilisi"){?>selected<?php } ?>>(UTC+04:00) Asia/Tbilisi</option>
<option value='Asia/Yerevan' <?php if($row["timezone"]=="Asia/Yerevan"){?>selected<?php } ?>>(UTC+04:00) Asia/Yerevan</option>
<option value='Europe/Samara' <?php if($row["timezone"]=="Europe/Samara"){?>selected<?php } ?>>(UTC+04:00) Europe/Samara</option>
<option value='Asia/Dubai' <?php if($row["timezone"]=="Asia/Dubai"){?>selected<?php } ?>>(UTC+04:00) Asia/Dubai</option>
<option value='Indian/Mauritius' <?php if($row["timezone"]=="Indian/Mauritius"){?>selected<?php } ?>>(UTC+04:00) Indian/Mauritius</option>
<option value='Europe/Moscow' <?php if($row["timezone"]=="Europe/Moscow"){?>selected<?php } ?>>(UTC+04:00) Europe/Moscow</option>
<option value='Asia/Muscat'<?php if($row["timezone"]=="Asia/Muscat"){?>selected<?php } ?> >(UTC+04:00) Asia/Muscat</option>
<option value='Asia/Kabul' <?php if($row["timezone"]=="Asia/Kabul"){?>selected<?php } ?>>(UTC+04:30) Asia/Kabul</option>
<option value='Asia/Tehran' <?php if($row["timezone"]=="Asia/Tehran"){?>selected<?php } ?>>(UTC+04:30) Asia/Tehran</option>
<option value='Indian/Maldives' <?php if($row["timezone"]=="Indian/Maldives"){?>selected<?php } ?>>(UTC+05:00) Indian/Maldives</option>
<option value='Indian/Kerguelen' <?php if($row["timezone"]=="Indian/Kerguelen"){?>selected<?php } ?>>(UTC+05:00) Indian/Kerguelen</option>
<option value='Asia/Baku' <?php if($row["timezone"]=="Asia/Baku"){?>selected<?php } ?>>(UTC+05:00) Asia/Baku</option>
<option value='Asia/Dushanbe' <?php if($row["timezone"]=="Asia/Dushanbe"){?>selected<?php } ?>>(UTC+05:00) Asia/Dushanbe</option>
<option value='Asia/Samarkand' <?php if($row["timezone"]=="Asia/Samarkand"){?>selected<?php } ?>>(UTC+05:00) Asia/Samarkand</option>
<option value='Asia/Oral' <?php if($row["timezone"]=="Asia/Oral"){?>selected<?php } ?>>(UTC+05:00) Asia/Oral</option>
<option value='Asia/Karachi' <?php if($row["timezone"]=="Asia/Karachi"){?>selected<?php } ?>>(UTC+05:00) Asia/Karachi</option>
<option value='Asia/Ashgabat' <?php if($row["timezone"]=="Asia/Ashgabat"){?>selected<?php } ?>>(UTC+05:00) Asia/Ashgabat</option>
<option value='Asia/Tashkent' <?php if($row["timezone"]=="Asia/Tashkent"){?>selected<?php } ?>>(UTC+05:00) Asia/Tashkent</option>
<option value='Asia/Aqtau' <?php if($row["timezone"]=="Asia/Aqtau"){?>selected<?php } ?>>(UTC+05:00) Asia/Aqtau</option>
<option value='Asia/Aqtobe' <?php if($row["timezone"]=="Asia/Aqtobe"){?>selected<?php } ?>>(UTC+05:00) Asia/Aqtobe</option>
<option value='Asia/Colombo' <?php if($row["timezone"]=="Asia/Colombo"){?>selected<?php } ?>>(UTC+05:30) Asia/Colombo</option>
<option value='Asia/Kolkata' <?php if($row["timezone"]=="Asia/Kolkata"){?>selected<?php } ?>>(UTC+05:30) Asia/Kolkata</option>
<option value='Asia/Kathmandu' <?php if($row["timezone"]=="Asia/Kathmandu"){?>selected<?php } ?>>(UTC+05:45) Asia/Kathmandu</option>
<option value='Indian/Chagos' <?php if($row["timezone"]=="Indian/Chagos"){?>selected<?php } ?>>(UTC+06:00) Indian/Chagos</option>
<option value='Asia/Qyzylorda' <?php if($row["timezone"]=="Asia/Qyzylorda"){?>selected<?php } ?>>(UTC+06:00) Asia/Qyzylorda</option>
<option value='Asia/Bishkek' <?php if($row["timezone"]=="Asia/Bishkek"){?>selected<?php } ?>>(UTC+06:00) Asia/Bishkek</option>
<option value='Asia/Almaty' <?php if($row["timezone"]=="Asia/Almaty"){?>selected<?php } ?>>(UTC+06:00) Asia/Almaty</option>
<option value='Asia/Thimphu' <?php if($row["timezone"]=="Asia/Thimphu"){?>selected<?php } ?>>(UTC+06:00) Asia/Thimphu</option>
<option value='Asia/Dhaka' <?php if($row["timezone"]=="Asia/Dhaka"){?>selected<?php } ?>>(UTC+06:00) Asia/Dhaka</option>
<option value='Asia/Yekaterinburg' <?php if($row["timezone"]=="Asia/Yekaterinburg"){?>selected<?php } ?>>(UTC+06:00) Asia/Yekaterinburg</option>
<option value='Asia/Rangoon' <?php if($row["timezone"]=="Asia/Rangoon"){?>selected<?php } ?>>(UTC+06:30) Asia/Rangoon</option>
<option value='Indian/Cocos' <?php if($row["timezone"]=="Indian/Cocos"){?>selected<?php } ?>>(UTC+06:30) Indian/Cocos</option>
<option value='Asia/Novokuznetsk' <?php if($row["timezone"]=="Asia/Novokuznetsk"){?>selected<?php } ?>>(UTC+07:00) Asia/Novokuznetsk</option>
<option value='Asia/Bangkok' <?php if($row["timezone"]=="Asia/Bangkok"){?>selected<?php } ?>>(UTC+07:00) Asia/Bangkok</option>
<option value='Asia/Novosibirsk' <?php if($row["timezone"]=="Asia/Novosibirsk"){?>selected<?php } ?>>(UTC+07:00) Asia/Novosibirsk</option>
<option value='Asia/Pontianak' <?php if($row["timezone"]=="Asia/Pontianak"){?>selected<?php } ?>>(UTC+07:00) Asia/Pontianak</option>
<option value='Asia/Phnom_Penh' <?php if($row["timezone"]=="Asia/Phnom_Penh"){?>selected<?php } ?>>(UTC+07:00) Asia/Phnom_Penh</option>
<option value='Asia/Omsk'<?php if($row["timezone"]=="Asia/Omsk"){?>selected<?php } ?> >(UTC+07:00) Asia/Omsk</option>
<option value='Asia/Vientiane' <?php if($row["timezone"]=="Asia/Vientiane"){?>selected<?php } ?>>(UTC+07:00) Asia/Vientiane</option>
<option value='Asia/Hovd' <?php if($row["timezone"]=="Asia/Hovd"){?>selected<?php } ?>>(UTC+07:00) Asia/Hovd</option>
<option value='Indian/Christmas' <?php if($row["timezone"]=="Indian/Christmas"){?>selected<?php } ?>>(UTC+07:00) Indian/Christmas</option>
<option value='Asia/Jakarta' <?php if($row["timezone"]=="Asia/Jakarta"){?>selected<?php } ?>>(UTC+07:00) Asia/Jakarta</option>
<option value='Asia/Ho_Chi_Minh' <?php if($row["timezone"]=="Asia/Ho_Chi_Minh"){?>selected<?php } ?>>(UTC+07:00) Asia/Ho_Chi_Minh</option>
<option value='Asia/Krasnoyarsk' <?php if($row["timezone"]=="Asia/Krasnoyarsk"){?>selected<?php } ?>>(UTC+08:00) Asia/Krasnoyarsk</option>
<option value='Asia/Kuching' <?php if($row["timezone"]=="Asia/Kuching"){?>selected<?php } ?>>(UTC+08:00) Asia/Kuching</option>
<option value='Asia/Chongqing' <?php if($row["timezone"]=="Asia/Chongqing"){?>selected<?php } ?>>(UTC+08:00) Asia/Chongqing</option>
<option value='Asia/Kashgar'  <?php if($row["timezone"]=="Asia/Kashgar"){?>selected<?php } ?>>(UTC+08:00) Asia/Kashgar</option>
<option value='Asia/Hong_Kong'  <?php if($row["timezone"]=="Asia/Hong_Kong"){?>selected<?php } ?>>(UTC+08:00) Asia/Hong_Kong</option>
<option value='Asia/Harbin'  <?php if($row["timezone"]=="Asia/Harbin"){?>selected<?php } ?>>(UTC+08:00) Asia/Harbin</option>
<option value='Asia/Macau'  <?php if($row["timezone"]=="Asia/Macau"){?>selected<?php } ?>>(UTC+08:00) Asia/Macau</option>
<option value='Asia/Choibalsan'  <?php if($row["timezone"]=="Asia/Choibalsan"){?>selected<?php } ?>>(UTC+08:00) Asia/Choibalsan</option>
<option value='Asia/Brunei'  <?php if($row["timezone"]=="Asia/Brunei"){?>selected<?php } ?>>(UTC+08:00) Asia/Brunei</option>
<option value='Asia/Kuala_Lumpur'  <?php if($row["timezone"]=="Asia/Kuala_Lumpur"){?>selected<?php } ?>>(UTC+08:00) Asia/Kuala_Lumpur</option>
<option value='Asia/Urumqi'  <?php if($row["timezone"]=="Asia/Urumqi"){?>selected<?php } ?>>(UTC+08:00) Asia/Urumqi</option>
<option value='Asia/Ulaanbaatar'  <?php if($row["timezone"]=="Asia/Ulaanbaatar"){?>selected<?php } ?>>(UTC+08:00) Asia/Ulaanbaatar</option>
<option value='Asia/Shanghai'  <?php if($row["timezone"]=="Asia/Shanghai"){?>selected<?php } ?>>(UTC+08:00) Asia/Shanghai</option>
<option value='Asia/Singapore'  <?php if($row["timezone"]=="Asia/Singapore"){?>selected<?php } ?>>(UTC+08:00) Asia/Singapore</option>
<option value='Asia/Taipei'  <?php if($row["timezone"]=="Asia/Taipei"){?>selected<?php } ?>>(UTC+08:00) Asia/Taipei</option>
<option value='Australia/Perth'  <?php if($row["timezone"]=="Australia/Perth"){?>selected<?php } ?>>(UTC+08:00) Australia/Perth</option>
<option value='Asia/Makassar'  <?php if($row["timezone"]=="Asia/Makassar"){?>selected<?php } ?>>(UTC+08:00) Asia/Makassar</option>
<option value='Asia/Manila'  <?php if($row["timezone"]=="Asia/Manila"){?>selected<?php } ?>>(UTC+08:00) Asia/Manila</option>
<option value='Australia/Eucla'  <?php if($row["timezone"]=="Australia/Eucla"){?>selected<?php } ?>>(UTC+08:45) Australia/Eucla</option>
<option value='Pacific/Palau' <?php if($row["timezone"]=="Pacific/Palau"){?>selected<?php } ?>  <?php if($row["timezone"]=="Asia/Chongqing"){?>selected<?php } ?>>(UTC+09:00) Pacific/Palau</option>
<option value='Asia/Irkutsk'  <?php if($row["timezone"]=="Asia/Irkutsk"){?>selected<?php } ?>>(UTC+09:00) Asia/Irkutsk</option>
<option value='Asia/Tokyo'  <?php if($row["timezone"]=="Asia/Tokyo"){?>selected<?php } ?>>(UTC+09:00) Asia/Tokyo</option>
<option value='Asia/Dili'  <?php if($row["timezone"]=="Asia/Dili"){?>selected<?php } ?>>(UTC+09:00) Asia/Dili</option>
<option value='Asia/Pyongyang'  <?php if($row["timezone"]=="Asia/Pyongyang"){?>selected<?php } ?>>(UTC+09:00) Asia/Pyongyang</option>
<option value='Asia/Seoul'  <?php if($row["timezone"]=="Asia/Seoul"){?>selected<?php } ?>>(UTC+09:00) Asia/Seoul</option>
<option value='Asia/Jayapura'  <?php if($row["timezone"]=="Asia/Jayapura"){?>selected<?php } ?>>(UTC+09:00) Asia/Jayapura</option>
<option value='Australia/Adelaide'  <?php if($row["timezone"]=="Australia/Adelaide"){?>selected<?php } ?>>(UTC+09:30) Australia/Adelaide</option>
<option value='Australia/Broken_Hill'  <?php if($row["timezone"]=="Australia/Broken_Hill"){?>selected<?php } ?>>(UTC+09:30) Australia/Broken_Hill</option>
<option value='Australia/Darwin'  <?php if($row["timezone"]=="Australia/Darwin"){?>selected<?php } ?>>(UTC+09:30) Australia/Darwin</option>
<option value='Pacific/Port_Moresby'  <?php if($row["timezone"]=="Pacific/Port_Moresby"){?>selected<?php } ?>>(UTC+10:00) Pacific/Port_Moresby</option>
<option value='Australia/Currie'  <?php if($row["timezone"]=="Australia/Currie"){?>selected<?php } ?>>(UTC+10:00) Australia/Currie</option>
<option value='Australia/Hobart'  <?php if($row["timezone"]=="Australia/Hobart"){?>selected<?php } ?>>(UTC+10:00) Australia/Hobart</option>
<option value='Asia/Khandyga'  <?php if($row["timezone"]=="Asia/Khandyga"){?>selected<?php } ?>>(UTC+10:00) Asia/Khandyga</option>
<option value='Australia/Brisbane'  <?php if($row["timezone"]=="Australia/Brisbane"){?>selected<?php } ?>>(UTC+10:00) Australia/Brisbane</option>
<option value='Australia/Lindeman'  <?php if($row["timezone"]=="Australia/Lindeman"){?>selected<?php } ?>>(UTC+10:00) Australia/Lindeman</option>
<option value='Pacific/Saipan'  <?php if($row["timezone"]=="Pacific/Saipan"){?>selected<?php } ?>>(UTC+10:00) Pacific/Saipan</option>
<option value='Australia/Sydney'  <?php if($row["timezone"]=="Australia/Sydney"){?>selected<?php } ?>>(UTC+10:00) Australia/Sydney</option>
<option value='Pacific/Chuuk'  <?php if($row["timezone"]=="Pacific/Chuuk"){?>selected<?php } ?>>(UTC+10:00) Pacific/Chuuk</option>
<option value='Asia/Yakutsk'  <?php if($row["timezone"]=="Asia/Yakutsk"){?>selected<?php } ?>>(UTC+10:00) Asia/Yakutsk</option>
<option value='Australia/Melbourne'  <?php if($row["timezone"]=="Australia/Melbourne"){?>selected<?php } ?>>(UTC+10:00) Australia/Melbourne</option>
<option value='Pacific/Guam'  <?php if($row["timezone"]=="Pacific/Guam"){?>selected<?php } ?>>(UTC+10:00) Pacific/Guam</option>
<option value='Australia/Lord_Howe'  <?php if($row["timezone"]=="Australia/Lord_Howe"){?>selected<?php } ?>>(UTC+10:30) Australia/Lord_Howe</option>
<option value='Pacific/Noumea'  <?php if($row["timezone"]=="Pacific/Noumea"){?>selected<?php } ?>>(UTC+11:00) Pacific/Noumea</option>
<option value='Pacific/Kosrae'  <?php if($row["timezone"]=="Pacific/Kosrae"){?>selected<?php } ?>>(UTC+11:00) Pacific/Kosrae</option>
<option value='Pacific/Efate'  <?php if($row["timezone"]=="Pacific/Efate"){?>selected<?php } ?>>(UTC+11:00) Pacific/Efate</option>
<option value='Asia/Sakhalin'  <?php if($row["timezone"]=="Asia/Sakhalin"){?>selected<?php } ?>>(UTC+11:00) Asia/Sakhalin</option>
<option value='Asia/Ust-Nera'  <?php if($row["timezone"]=="Asia/Ust-Nera"){?>selected<?php } ?>>(UTC+11:00) Asia/Ust-Nera</option>
<option value='Asia/Vladivostok'  <?php if($row["timezone"]=="Asia/Vladivostok"){?>selected<?php } ?>>(UTC+11:00) Asia/Vladivostok</option>
<option value='Pacific/Guadalcanal'  <?php if($row["timezone"]=="Pacific/Guadalcanal"){?>selected<?php } ?>>(UTC+11:00) Pacific/Guadalcanal</option>
<option value='Pacific/Pohnpei'  <?php if($row["timezone"]=="Pacific/Pohnpei"){?>selected<?php } ?>>(UTC+11:00) Pacific/Pohnpei</option>
<option value='Pacific/Norfolk'  <?php if($row["timezone"]=="Pacific/Norfolk"){?>selected<?php } ?>>(UTC+11:30) Pacific/Norfolk</option>
<option value='Pacific/Tarawa'  <?php if($row["timezone"]=="Pacific/Tarawa"){?>selected<?php } ?>>(UTC+12:00) Pacific/Tarawa</option>
<option value='Pacific/Wallis'  <?php if($row["timezone"]=="Pacific/Wallis"){?>selected<?php } ?>>(UTC+12:00) Pacific/Wallis</option>
<option value='Pacific/Wake'  <?php if($row["timezone"]=="Pacific/Wake"){?>selected<?php } ?>>(UTC+12:00) Pacific/Wake</option>
<option value='Asia/Anadyr'  <?php if($row["timezone"]=="Asia/Anadyr"){?>selected<?php } ?>>(UTC+12:00) Asia/Anadyr</option>
<option value='Pacific/Nauru'  <?php if($row["timezone"]=="Pacific/Nauru"){?>selected<?php } ?>>(UTC+12:00) Pacific/Nauru</option>
<option value='Asia/Magadan'  <?php if($row["timezone"]=="Asia/Magadan"){?>selected<?php } ?>>(UTC+12:00) Asia/Magadan</option>
<option value='Pacific/Auckland'  <?php if($row["timezone"]=="Pacific/Auckland"){?>selected<?php } ?>>(UTC+12:00) Pacific/Auckland</option>
<option value='Pacific/Fiji'  <?php if($row["timezone"]=="Pacific/Fiji"){?>selected<?php } ?>>(UTC+12:00) Pacific/Fiji</option>
<option value='Pacific/Funafuti'  <?php if($row["timezone"]=="Pacific/Funafuti"){?>selected<?php } ?>>(UTC+12:00) Pacific/Funafuti</option>
<option value='Pacific/Majuro'  <?php if($row["timezone"]=="Pacific/Majuro"){?>selected<?php } ?>>(UTC+12:00) Pacific/Majuro</option>
<option value='Pacific/Kwajalein'  <?php if($row["timezone"]=="Pacific/Kwajalein"){?>selected<?php } ?>>(UTC+12:00) Pacific/Kwajalein</option>
<option value='Asia/Kamchatka' <?php if($row["timezone"]=="Asia/Kamchatka"){?>selected<?php } ?>>(UTC+12:00) Asia/Kamchatka</option>
<option value='Pacific/Chatham'  <?php if($row["timezone"]=="Pacific/Chatham"){?>selected<?php } ?>>(UTC+12:45) Pacific/Chatham</option>
<option value='Pacific/Tongatapu'  <?php if($row["timezone"]=="APacific/Tongatapu"){?>selected<?php } ?>>(UTC+13:00) Pacific/Tongatapu</option>
<option value='Pacific/Fakaofo' <?php if($row["timezone"]=="Pacific/Fakaofo"){?>selected<?php } ?> >(UTC+13:00) Pacific/Fakaofo</option>
<option value='Pacific/Apia'  <?php if($row["timezone"]=="Pacific/Apia"){?>selected<?php } ?>>(UTC+13:00) Pacific/Apia</option>
<option value='Pacific/Enderbury'  <?php if($row["timezone"]=="Pacific/Enderbury"){?>selected<?php } ?>>(UTC+13:00) Pacific/Enderbury</option>
<option value='Pacific/Kiritimati'  <?php if($row["timezone"]=="Pacific/Kiritimati"){?>selected<?php } ?>>(UTC+14:00) Pacific/Kiritimati</option>
</select>
                
                </td>

            </tr><?php */?>
    
    
    <tr style="display:none;">
    	<td align="right">Upload Photo :</td>
    	<td><input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>                             
        <td></td>
        <td><input type="submit" name="update" value="Save" class="button blue-grd3 update-btn1"></td>
    </tr>
</table>
</form>
		</td>
	</tr>
    <tr>
    	<td>
        <h2>Change Password</h2>
        </td>
    </tr>
	<tr>
		<td>
        <form name="form" id="form2" method="post" action="" enctype="multipart/form-data">
        <table width="100%" cellpadding="5" cellspacing="5">
            <tr>
                <td width="20%" align="right">Current Password <span style="color:#FF0000;">*</span> : </td>
                <td width="75%"><input type="password" name="cpsw" class="required" /></td>
            </tr>
            <tr>                             
                <td align="right">New Password <span style="color:#FF0000;">*</span> :</td>
                <td><input type="password" class="required" name="npsw" ></td>
            </tr>
            <tr>                             
                <td align="right">Confirm Password <span style="color:#FF0000;">*</span> :</td>
                <td><input type="password" class="required" name="rpsw" ></td>
            </tr>
            <tr>  
                <td></td>
                <td><input name="submit" type="submit" class="button  blue-grd3 update-btn1" id="button" value="Save" />
                </td>
            </tr>
        </table>
        </form>
		</td>
	</tr>
</table>
 
<?php

if($_POST['update']!='')
{
	if($_FILES['photo']['name']!='')
	{
		$filename = $_FILES['photo']['name'];
		$temp="../Uploads/user/";
		$tmp=$_FILES['photo']['tmp_name'];
		$temp=$temp.basename($filename);
		move_uploaded_file($tmp,$temp);
	}
	else
	$filename = $row["photo"];
	
	$res = $setting_obj->UPDATE_PROFILE($_SESSION['adminid'],$_POST['uname'],$_POST['name'],$_POST['contact'],$_POST['email'],$_POST['timezone'],$filename);
	
if($res>0)
	{
		$_SESSION['msg']="Profile Updated Successfully !";
	}
else
$_SESSION['msg']="Error in Profile Updated !";

header("Location: index.php?layout=myprofile");
}
?>
<?php 
if($_POST['submit']!='')
{
if($_POST['npsw']==$_POST['rpsw'])
{
	$res = $setting_obj->UPDATE_PASSWORD($_SESSION['adminid'],$_POST['cpsw'],$_POST['npsw']);
	if(mysql_affected_rows()>0)
	$_SESSION['msg']="Password Changed Successfully !";
	else
	$_SESSION['msg']="Invalid Old Password !";
}
else
{
	$_SESSION['msg']="Do not match New password and Re-type password !";
}
header("Location: index.php?layout=myprofile");
}


?> 