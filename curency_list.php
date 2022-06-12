<?php

$api_url = "https://api.hnb.hr/tecajn/v2";

print '
	<h1>Currency List</h1>
	<div id="curency_list">';

	
getCurrencyList($api_url);

print '</div>';

#Function Get curency list
function getCurrencyList($url)
{

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
	$json = curl_exec($ch);
	if(!$json) {
		echo curl_error($ch);
	}
	curl_close($ch);

	print '<table>';
	print '<tr>';
	print '<th><a href="#" style="color: #ffffff">Država</th><th class="cell_center"><a href="#" style="color: #ffffff"  >Šifra valute </a></th><th class="cell_center"><a href="#" style="color: #ffffff"  >Valuta </a></th><th class="cell_center"><a href="#" style="color: #ffffff"  >Jedinica </a></th><th class="cell_right"><a href="#" style="color: #ffffff"  >Kupovni za devize </a></th><th class="cell_right"><a href="#" style="color: #ffffff"  >Srednji za devize </a></th><th class="cell_right"><a href="#" style="color: #ffffff"  >Prodajni za devize </a></th>';
	print '</tr>';
	foreach(json_decode($json) as $line) {
		print '<tr>';
		#print '<td>' . $line->broj_tecajnice . '</td>';
		#print '<td>' . $line->datum_primjene . '</td>';
		print '<td>' . $line->drzava . '</td>';
		print '<td>' . $line->drzava_iso . '</td>';
		#print '<td>' . $line->sifra_valute . '</td>';
		print '<td>' . $line->valuta . '</td>';
		print '<td>' . $line->jedinica . '</td>';
		print '<td>' . $line->kupovni_tecaj . '</td>';
		print '<td>' . $line->srednji_tecaj . '</td>';
		print '<td>' . $line->prodajni_tecaj . '</td>';
		print '</tr>';
	}
	print '</table>';
}

?>