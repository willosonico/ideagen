<?
	$abs_url = 'http://www.callistogames.com/ideagen/';
?><html>
<head>
	<base href="<?=$abs_url?>" />
    <meta charset="utf-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- jquery mobile -->
    <link rel="stylesheet" href="themes/mjolkidea.min.css"/>
    <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/> 
    <link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css"/>

	<!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fonts/specimen_files/specimen_stylesheet.css" type="text/css" charset="utf-8"/>
    <link rel="stylesheet" href="fonts/stylesheet.css" type="text/css" charset="utf-8"/>
    
    <link rel="stylesheet" href="css/index.css"/>
	<?
		if (isset($_GET['word1']) &&
			isset($_GET['word2']) &&
			isset($_GET['word3'])) {
				
			function transform($word) {
				return str_replace('_', ' ', $word);	
			}
			
			?><title>Idea improbabile per il 2015 : <?=transform($_GET['word1'])?> <?=transform($_GET['word2'])?> <?=transform($_GET['word3'])?> <?=transform($_GET['word4'])?></title>
			<meta property="og:image" content="<?=$abs_url?>generate_thumb.php?word1=<?=$_GET['word1']?>&word2=<?=$_GET['word2']?>&word3=<?=$_GET['word3']?>" /><?
		} else {
			?><title>Generatore di Idee improbabili per il 2015</title>
			<meta property="og:image" content="<?=$abs_url?>img/logo.png" /><?
		}
	?>
    
    <meta content="Idee improbabili per il 2015" name="description">
</head>
<body>
<div id="home" data-role="page" data-theme="a">
    <div data-role="header" data-id="foo1" data-position="fixed"  class="my_header">
        <p style="text-align:center;"><a href="#credits" data-transition="fade" style="color:#fffaee;" >IDEE IMPROBABILI PER IL 2015</a></p>
    </div>

    <div data-role="content" data-theme="a" style="padding:0px !important;">
        <div class="row row_first" id="word1">
            <div class="row_inner" id="word1_inner">
                <div class="word"> Allestire </div>
                <div class="word"> Condividere </div>
                <div class="word"> Progettare </div>
                <div class="word"> Sviluppare </div>
                <div class="word"> Spedire </div>
                <div class="word"> Catalogare </div>
                <div class="word"> Stampare </div>
                <div class="word"> Fotografare </div>
                <div class="word"> Sostenere </div>
                <div class="word"> Collaudare </div>
                <div class="word"> Fondare </div>
                <div class="word"> Progettare </div>
                <div class="word"> Ampliare </div>
                <div class="word"> Decorare </div>
                <div class="word"> Avviare </div>
                <div class="word"> Lanciare </div>
                <div class="word"> Organizzare </div>
                <div class="word"> Ricercare </div>
                <div class="word"> Vendere </div>
                <div class="word"> Presentare </div>
                <div class="word"> Trasportare </div>
                <div class="word"> Pubblicizzare </div>
                <div class="word"> Collaudare </div>
                <div class="word"> Dirigere </div>
            </div>
            <div class="word">&nbsp;</div>
        </div>
        <div class="row" id="word2">
            <div class="row_inner" id="word2_inner">
                <div class="word">un museo</div>
                <div class="word">un piano</div>
                <div class="word">un videogame</div>
                <div class="word">un lampadario</div>
                <div class="word">un curriculum</div>
                <div class="word">cibo</div>
                <div class="word">un giornale</div>
                <div class="word">uno strumento</div>
                <div class="word">un gruppo</div>
                <div class="word">un tappeto</div>
                <div class="word">un club</div>
                <div class="word">un fucile</div>
                <div class="word">un santurario</div>
                <div class="word">un cimitero</div>
                <div class="word">un ristorante</div>
                <div class="word">un sasso</div>
                <div class="word">un giardino</div>
                <div class="word">un flauto</div>
                <div class="word">un circo</div>
                <div class="word">un libro</div>
                <div class="word">un divano</div>
                <div class="word">un parco</div>
                <div class="word">un veicolo</div>
                <div class="word">un ospedale</div>
            </div>
            <div class="word">&nbsp;</div>
        </div>
        <div class="row" id="word3">
            <div class="row_inner" id="word3_inner">
                <div class="word"> invisibile  </div>
                <div class="word"> invadente  </div>
                <div class="word"> cartaceo  </div>
                <div class="word"> parlante  </div>
                <div class="word"> adesivo  </div>
                <div class="word"> contaminato </div>
                <div class="word"> trasparente </div>
                <div class="word"> erotico  </div>
                <div class="word"> immaginario  </div>
                <div class="word"> volante  </div>
                <div class="word"> muto  </div>
                <div class="word"> ecologico  </div>
                <div class="word"> prefabbricato  </div>
                <div class="word"> notturno  </div>
                <div class="word"> rotante  </div>
                <div class="word"> scottante  </div>
                <div class="word"> acquatico  </div>
                <div class="word"> ghiacciato  </div>
                <div class="word"> volante  </div>
                <div class="word"> infiammabile  </div>
                <div class="word"> radiattivo  </div>
                <div class="word"> portatile  </div>
                <div class="word"> olografico  </div>
                <div class="word"> segreto  </div>
            </div>
            <div class="word">&nbsp;</div>
        </div>
        <center>
            <a id="genera_button" data-role="button" style="font-weight:700;font-family: 'Lato', sans-serif;font-size:18px;letter-spacing:3px;border:3px solid black;">GENERA</a>
        </center>
        
        <div class="navgroup shareblock">
            <div data-role="controlgroup" data-type="horizontal">
            	<a href="#" class="link" onClick="share_facebook();return false;">Facebook</a>&nbsp;&nbsp;&nbsp;<a href="#" class="link" onClick="share_twitter();return false;">Twitter</a>
             </div>
        </div>
        <div id="responsive_headline">prefabbricato</div>
    </div>
</div>

<div id="credits" data-role="page" data-theme="b">
    <div data-role="header" data-id="foo1" data-position="fixed" class="my_header" >
        <p style="text-align:center;"><a href="#home" data-transition="fade" style="color:#fffaee;">IDEE IMPROBABILI PER IL 2015</a></p>
    </div>
    <div data-role="content" data-theme="b">
     	<div class="spacer_little"></div>
        <div class="spacer_little"></div>
    	<div class="spacer_little"></div>
    	<h1 style="text-align:center;font-size:38px;line-height:58px;font-weight:300;">Tutte le idee possono diventare realtà.<br>
Anche le più folli e improbabili.<br>
Condividile con noi.</h1>
        <div class="spacer_little"></div>
        <div class="spacer_little"></div>
        <div class="spacer_little"></div>
        <center>
            Design<br><br>
            <a href="#" class="link2" onClick="window.open('http://www.studiomjolk.com', '_system');" target="_blank" >STUDIO MJÖLK</a>
            <br><br>
            <br><br>
            Development<br><br>
            <a href="#" class="link2" onClick="window.open('http://www.callistogames.com', '_system');" target="_blank">CALLISTO GAMES</a>
            <br><br>
            <br><br>
        </center>
                
        </div>
    </div>
</div>

<!-- libs -->
<script src="libs/jquery-1.11.1.min.js"></script>
<script src="libs/jQueryMobile/jquery.mobile-1.4.5.min.js"></script>
<script src="libs/jquery-ui.min.js"></script>
<script src="libs/smartresize.js"></script>
<script src="libs/fittext.js"></script>

<!-- launching main script -->
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>
