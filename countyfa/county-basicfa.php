
<div>
    
<p>No County FA selected.</p>

<?php

if ( ! is_admin() ) {
     echo '
     
     <div id="admin-countyfa-notice">
     
     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>County FA Affiliation:</strong> We strongly recommend you confirm your County FA affiliation by selecting the relevant association under: <i>Appearance > Template Configuration > Footer</i>, found in the admin menu. This message only displays to logged in admins and will disappear once you have selected your County FA.
     
     </div>
     
     ';
} else {
     echo "";
}

?>
    
</div>