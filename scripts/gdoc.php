<?php @error_reporting(E_ERROR) ?>
<?php

function buildHtmlFromDoc($name)
{

    $doc_url = 'https://docs.google.com/document/pub?id='.$name; //.'&embedded=true';

    if (TRUE) {
        $ch = curl_init();
        $timeout = 5; // set to zero for no timeout
        curl_setopt ($ch, CURLOPT_URL, $doc_url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        ob_start();
        curl_exec($ch);
        curl_close($ch);
        $content = ob_get_contents();
        ob_end_clean();
    } else {
        $content = file_get_contents($doc_url); // Recupere le corps de la page HTML
    }

    $content = str_replace ('"fileview?',       '"https://docs.google.com/fileview?',               $content); // Images
    $content = str_replace ('"File?',           '"https://docs.google.com/File?',                   $content); // Images
    $content = str_replace ('"viewer?',         '"https://docs.google.com/viewer?',                 $content); // Documents Pdf
    $content = str_replace ('"open?',           '"https://docs.google.com/open?',                   $content); // Documents Pdf
    $content = str_replace ('"View?',           '"https://docs.google.com/View?',                   $content); // Liens
    $content = str_replace ('"gview?',          '"https://docs.google.com/gview?',                  $content); // Tel. mobiles
    $content = str_replace ('"leaf?',           '"https://docs.google.com/leaf?',                   $content); // Repertoires
    $content = str_replace ('"pubimage?',       '"https://docs.google.com/document/pubimage?',      $content); // Repertoires
    $content = str_replace ('"spreadsheet/pub?','"https://docs.google.com/spreadsheet/pub?',        $content); // Feuilles Excel

    $start = '<div id="contents">'; $end = '<div id="footer">'; // Delimitent la zone a garder qui nous interesse
    $content = substr($content, strlen($start)+strpos($content,$start),(strlen($content)-strpos($content,$end)+6)*(-1)); // +6 pour supprimer "</div>" final
    // $content = preg_replace("/color:inherit;text-decoration:inherit/", "", $content); // Supprime les couleurs des liens

    while (substr_count($content, '#HTML_') != 0) {
        $from_pos= strpos($content, "#HTML_BEGIN#");
        $to_pos  = strpos($content, "#HTML_END#");
        $extract = strip_tags(substr($content, $from_pos+12, $to_pos - ($from_pos+12)));
        $extract = str_replace('<br>', '\n', $extract);
        $extract = str_replace('<br />', '\n', $extract);
        $extract = str_replace('&lt;', '<', $extract);
        $extract = str_replace('&gt;', '>', $extract);
        $extract = str_replace('&amp;', '&', $extract);
        $extract = str_replace('&quot;', '"', $extract);
        $content = substr($content, 0, $from_pos).$extract.substr($content, $to_pos+10);
    }

    $content = $content.'<div style="text-align:right;"><a href="https://docs.google.com/document/d/'.$name.'/edit" target="_blank"><img name="gcms" src="ressources/edit.png" width="20" height="20" title="Editer la page" alt="Editer la page" border="0" onMouseOver="gcms.src=\'ressources/edit_over.png\'" onMouseOut="gcms.src=\'ressources/edit.png\'" /></a></div>';

    $inF = fopen('cache/_'.$name.'.html',"w"); // Le contenu de la page est dans $content
	if (!fwrite($inF,$content)) echo '<br/>Erreur d&#145;&eacute;criture sur la page.<br/>';
    fclose($inF);

}

?>
