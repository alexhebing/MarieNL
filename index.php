<!DOCTYPE html>
<html>
<head>
	<title>mariekehamelink.nl</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" href="style.css">
	
	<script type="text/javascript">

	var currentPage = 'beforeLoad';
	var pages = InitializePages();

	window.onload = function() 
	{
	  	for (var i = 0; i < pages.length; i++) 
	  	{
	  		document.getElementById(pages[i].Name).style.backgroundImage = 'url(' + pages[i].Photo + ')';
		}

	  	ChangePage('welkom');
	};

	function InitializePages()
	{
		var pages = 
		[ 
			new GetContent("welkom", "Welkom", "img/marieke3.jpg"), 
			new GetContent("praktijk", "Praktijk", "img/tafel2016.jpg"),
			new GetContent("massage", "Massage", "img/massage2.jpg"),
			new GetContent("afspraak", "Afspraak", "img/hand.jpg")
		]

		return pages;
	}

	function ChangePage(pageName)
	{
		ChangeMenu(pageName);

		var content = pages.find(x => x.Name === pageName);

		document.getElementById("mainPageHeader").innerHTML = content.Header;
		document.getElementById("mainPagePhoto").src = content.Photo;
		document.getElementById("mainPageText").innerHTML = content.TextContent;
	}

	function ChangeMenu(pageName)
	{
		document.getElementById(pageName).style.display = "none";
		
		if (currentPage != 'beforeLoad')
		{
			// initialize menu
			
			document.getElementById(currentPage).style.display = "table-cell";			
		}

		currentPage = pageName;
	}

	function GetContent (name, header, photo) 
	{
	    this.Name = name;	
		this.Header = header;
		this.Photo = photo;		
		this.TextContent = GetTextContent(this.Name);
	}

	function GetTextContent(pageName)
	{
		switch(pageName) 
		{
		    case 'praktijk':
		        return '<p>Mijn praktijk is gevestigd aan de Van der Baanstraat 1A, Wolphaartsdijk en is geopend van maandag t/m vrijdag van 10.00 tot 18.00.</p><br><p>Per 1 januari 2017 voldoe ik niet meer aan het eisenpakket van de beroepsvereniging. Ik heb besloten geen marionet van de zorgverzekeraars te worden en volledig m&#39;n eigen weg te gaan. Voor mij voelt deze ontkoppeling als een bevrijding. Ik laat me niet langer in het web van regeltjes verstrikken, en heb er het volste vertrouwen in dat wanneer ik mijn aandacht en energie op m&#39;n passie kan blijven richten, zowel ik als mijn klanten de vruchten daarvan zullen kunnen blijven plukken.<p>'
		        break;
	        case 'massage':
		        return '<p>Tijdens mijn massages maak ik gebruik van een combinatie van verschillende massage- en bewegingstechnieken (o.a. uit de diepe weefsel massage en Thai Yoga massage). In overleg kan worden gekozen voor een unieke, persoonlijk afgestemde behandeling waarin ik kennis en techniek combineer met mijn intu&#239;tie.</p><br>In de massage nodig ik je uit om van je denken naar je voelen te gaan. Jezelf te ont-moeten, te luisteren naar de signalen die je lichaam geeft en te vertrouwen op je innerlijke wijsheid.</p><br><p>Ik werk met 100 % natuurlijke oli&#235;n en na de behandeling krijg je een kop kruidenthee.</p>'
		        break;	
	        case 'afspraak':
		        return '<p>Bij je eerste afspraak vindt altijd een intake plaats, zodat we samen de behandeling kiezen die op dat moment het beste bij jou past. Voor het maken van een afspraak of nadere informatie kun je contact opnemen via e-mail (massage@mariekehamelink.nl) of telefoon (0113-750767 / 06-48644673).</p><br><h5>Annuleren</h5><p>Als je wilt annuleren of verzetten dan moet dit minimaal 24 uur van tevoren. Bij niet tijdig annuleren ben ik genoodzaakt de kosten in rekening te brengen.</p><br><h5>Prijzen</h5><table border="1"><tr><td>30 minuten</td><td>&#8364 25,- </td></tr><tr><td>60 minuten</td><td>&#8364 55,-</td></tr><tr><td>90 minuten</td><td>&#8364 75,-</td></tr></table><br></p><p>Graag contant betalen!</p><br><h5>Speciale acties</h5><p>Er zijn ook kadobonnen verkrijgbaar!</p>'
		        break;	
	        default:
		        return '<p>Mijn naam is Marieke Hamelink. In 2008 ben ik aan de Akademie voor Massage & Beweging afgestudeerd als massage- en bewegingstherapeut, en sindsdien heb ik een praktijk aan huis. Vanaf 2011 ben ik van mijn passie mijn werk gaan maken en ben ik full-time werkzaam als holistisch masseuse.</p><br><p>Naast individuele behandelingen organiseer ik met collega&#39;s ook middagen gericht op lichaamsbewustzijn en ontspanning (o.a. Yoga, Qigong, Meditatie, Dans).</p><br><p>Ik blijf mij ontwikkelen d.m.v. bij- en nascholing, en vooral door &#39;het Leven&#39; zelf.</p>'
		        break;
		}
	}

	function ClosePopup() {
		document.getElementById("popupContainer").style.display = "none";
	}

  	</script>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
	<?php
		$counter_name = "counter.txt";

		// Read the current value of our counter file
		$f = fopen($counter_name,"r");
		$counterVal = fread($f, filesize($counter_name));
		fclose($f);
				
		$counterVal++;

		$ipaddress = get_client_ip();
		$visit = date('Y-m-d H:i:s') . " " . $ipaddress . " " . get_client_location($ipaddress);

		file_put_contents($counter_name, $counterVal);
		file_put_contents("visits.txt", $visit.PHP_EOL, FILE_APPEND);

		function get_client_ip() {
		    $ipaddress = '';
		    if (getenv('HTTP_CLIENT_IP'))
		        $ipaddress = getenv('HTTP_CLIENT_IP');
		    else if(getenv('HTTP_X_FORWARDED_FOR'))
		        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		    else if(getenv('HTTP_X_FORWARDED'))
		        $ipaddress = getenv('HTTP_X_FORWARDED');
		    else if(getenv('HTTP_FORWARDED_FOR'))
		        $ipaddress = getenv('HTTP_FORWARDED_FOR');
		    else if(getenv('HTTP_FORWARDED'))
		       $ipaddress = getenv('HTTP_FORWARDED');
		    else if(getenv('REMOTE_ADDR'))
		        $ipaddress = getenv('REMOTE_ADDR');
		    else
		        $ipaddress = 'UNKNOWN';
		    return $ipaddress;
		}

		function get_client_location($PublicIP) {
			try {
			   $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
				$json  =  json_decode($json ,true);
				$country =  $json['country_name'];
				$region= $json['region_name'];
				$city = $json['city'];
				return $country;
			} 
			catch (Exception $e) {
			    return "UNKNOWN";
			}
		}

	?>
</head>
<body>
	<div class="popupContainer" id="popupContainer" onclick="ClosePopup()">
		<div class="popup">
		  <div class="popupcontent">
		  	<h1>LET OP!</h1>
		  	<div class="popuptext">Mijn zwangerschapsverlof staat voor de deur en ik zal dus voorlopig mijn aandacht en energie dicht bij mijzelf en de kleine houden. Via <a href="https://www.facebook.com/Praktijk-voor-Holistische-Massage-Beweging-202778163126527/">mijn Facebook pagina</a> zal ik jullie op de hoogte houden wanneer ik weer met de praktijk verder zal gaan en zie jullie t.z.t. natuurlijk heel graag weer terug. Indien jullie in de tussentijd een behandeling willen, verwijs ik jullie door naar mijn collega <a href="https://www.lichaamseigen.nl">Saskia Buitenkamp</a></div>          	
      	</div>
		</div>
	</div>
	<div class="page" align="center">
		
		<div class="header">
			<img src="img/logo2.jpg" />
		</div>
		<div class="content">
			<ul id="vanBar" class="nav">
		  		<li id="welkom" class="menu">
		    		<button onclick="ChangePage('welkom')"><h3>Welkom</h3></button>
		      	</li>
		  		<li id="praktijk" class="menu">
		    		<button onclick="ChangePage('praktijk')"><h3>Praktijk</h3></button>
		    	</li>
		    	<li id="massage" class="menu">
		    		<button onclick="ChangePage('massage')"><h3>Massage</h3></button>
				</li>
				<li id="afspraak" class="menu">
		    		<button onclick="ChangePage('afspraak')"><h3>Afspraak</h3></button>
		      	</li>		      	
		    	<li>
		    		<a class="facebook" href="https://www.facebook.com/pages/Praktijk-voor-Holistische-Massage-Beweging/202778163126527"><img src="img/facebook3.png"/><a>
		      	</li>
		    </ul>
			
			<div class="main">
				<h4 id="mainPageHeader"></h4>
		    	<img id="mainPagePhoto"/>
		      	<div id="mainPageText" class="main-text">
		      	</div>
		    </div><!-- end main-->			
		
		</div><!-- end content-->
		<div class="footer">
			<p class="quote">- Without the body, the soul is nothing but empty wind. Without the soul, the body is but a senseless frame - Kahlil Gibran</p> 
		</div>
		<div class="footer">
			<p class="website">Website door Alex Hebing 2015&#169;</p>
		</div>
	</div>
</body>
</html>