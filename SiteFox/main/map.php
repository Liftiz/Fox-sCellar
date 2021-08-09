<!DOCTYPE html>
<html lang="fr">
  <head>
    <!--
            Inclusion de la bibliothèque Leaflet et sa feuille de style.
            L'include du js pourrait aussi être fait a la fin du <body>
        -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="assets/js/leaflet.markercluster.js"></script>
    <!-- Une feuille de style éventuel -->
    <link rel="stylesheet" href="assets/css/map.css">
    <title>Fox's Cellar: MAP Vignobles </title>
  </head>

  <body>
    <!-- Le conteneur de notre carte (avec une contrainte CSS pour la taille -->
    <div id="macarte" style="width:1850px; height:915px"></div>

    <script>
      var carte = L.map('macarte').setView([43.9210587,7.1790785], 10);
      L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(carte);
   
      
  
      // Notre cluster
      var markers = L.markerClusterGroup();
      // Nos marqueurs
      // Marker1 Chateau de bellet 
	    var marker1 = L.marker([43.750019, 7.212476]);
      // Marker2 Domaine des hautes collines saint jeannet
      var marker2 = L.marker([43.752693, 7.161778]);
      // Marker3 DOMAINE DE LA SOURCE / VIN DE BELLET
      var marker3 = L.marker([43.726007, 7.195724]);
      // Marker4 Domaine De Toasc
      var marker4 = L.marker([43.718337, 7.202559]);
      // Marker5 Domaine Saint-Joseph
      var marker5 = L.marker([43.704018, 7.055867]);
      

      // Chateau de Bellet
      marker1.bindPopup(''); // Je ne mets pas de texte par défaut
      var mapopup = marker1.getPopup();
      mapopup.setContent('<a href="vignoble.php?"><figure><img src="assets/img/chapelle_drone.jpg"alt="Chateau de Bellet"><figcaption>Chateau de Bellet</figcaption></figure></a> '); // je personnalise un peu avant d'afficher
      marker1.openPopup();
      // Domaine des hautes collines 
      marker2.bindPopup(''); // Je ne mets pas de texte par défaut
      var mapopup = marker2.getPopup();
      mapopup.setContent('<a href="chateauBellet.html"><figure><img src="assets/img/vignoble-de-Saint-Jeannet-002-1800x1200.jpg"alt="Domaine des hautes collines "><figcaption>Domaine des hautes collines</figcaption></figure></a> '); // je personnalise un peu avant d'afficher
      marker2.openPopup();
      //Domaine de la source
      marker3.bindPopup(''); // Je ne mets pas de texte par défaut
      var mapopup = marker3.getPopup();
      mapopup.setContent('<a href="chateauBellet.html"><figure><img src="assets/img/domaine-de-la-Source-001-1-1800x1200.jpg"alt="Domaine de la source"><figcaption>Domaine de la source</figcaption></figure></a> '); // je personnalise un peu avant d'afficher
      marker3.openPopup();
      //Domaine de Toasc
      marker4.bindPopup(''); // Je ne mets pas de texte par défaut
      var mapopup = marker4.getPopup();
      mapopup.setContent('<a href="chateauBellet.html"><figure><img src="assets/img/Ceps-Toasc-2.jpg"alt="Domaine de Toasc"><figcaption>Domaine de Toasc</figcaption></figure></a> '); // je personnalise un peu avant d'afficher
      marker4.openPopup();
      //Domaine Saint-Joseph
      marker5.bindPopup(''); // Je ne mets pas de texte par défaut
      var mapopup = marker5.getPopup();
      mapopup.setContent('<a href="chateauBellet.html"><figure><img src="assets/img/saintJoseph.jpg"alt="Domaine Saint-Joseph"><figcaption>Domaine Saint-Joseph</figcaption></figure></a> '); // je personnalise un peu avant d'afficher
      marker5.openPopup();
      // On ajoute les marqueurs au cluster
      markers.addLayer(marker1);
      markers.addLayer(marker2);
      markers.addLayer(marker3);
      markers.addLayer(marker4);
      markers.addLayer(marker5);
      
      // On affiche le cluster
      carte.addLayer(markers);
    </script>
  
  </body>

</html>