<?php
//Index.php

$page_title = "404";
include "top.php";
?>

<article class="body-item">
    
	<div class="row row-eq-height">
         <div class="col-xs-12">
            <div class="box shadow">
				<div class="min-height-18">
                    <div class="box-heading"><?php echo $page_title; ?></div>
                    <div class='hr'></div>
                        <div class='box-body'>
                            <h3>Oeps, u heeft onze 404-pagina gevonden</h3>

                            <h4>Dit is geen fout, slechts een onbedoeld ongelukje.</h4><br />
                            <p>Wij betwijfelen dat dit de pagina was waar u naar zocht en wij verontschuldigen ons hier ten zeerste voor. Een 404-melding houd in dat de pagina waar u naar zocht niet (meer) bestaat. Let goed op spelfouten en misplaatste hoofdletters in de door u bezochte website!</p>
                            <br/>
                            <p>Met <a href="javascript:javascript:history.go(-1)" class="no-a-style" style="text-decoration: underline;">deze</a> link kunt u terug keren naar de vroige door u bezochte pagina! </p>
                    </div>
                </div>
             </div>
        </div>
    </div>
</article>
    
<?php
include "bottom.php";
?>