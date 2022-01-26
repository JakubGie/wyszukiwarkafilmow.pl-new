<?php include 'elements/begining.php'; ?>
<!DOCTYPE HTML>
<html lang="pl-PL">
	<head>
		<title>Wyszukiwarka Filmów - Nie wiesz, co obejrzeć? Znajdź film!</title> 

        <?php include 'elements/head.php'; ?>
	</head>
	<body onload="onload()">
        <?php include 'elements/phpscripts.php'; ?>

        <?php include 'elements/brand.php'; ?>

        <div class="recommend-rel">
            <div id="recommendBefore">

            </div>
            <div class="recommend">
                <div class="row">
                    <div class="col-2">
                        <div class="position-relative">
                            <a href="" class="movieHref">
                                
                                
                                <img class="w-100" id="recommendPictureBefore">
                                
                                <img class="w-100" id="recommendPicture">

                                <img src="img/shadow.png" class="w-100" id="recommendPictureShadow">
                            </a>
                        </div>
                    </div>
                    <div class="col-10">
                        <a href="" class="movieHref"><h3><span id="recTitle"></span> <span id="recYear"></span></h3></a>
                        <p id="recDesc"></p>
                    </div>
                </div>
            </div>
            <div class="movie-list">
                <img src="https://i1.fdbimg.pl/x1/bk7zz9/400x580_kd38gs.jpg%20400w" id="rec0" onclick="podmienPolecane(0)">
                <img src="https://i1.fdbimg.pl/x1/vhl8e8v1/400x580_qw7aph.jpg%20400w" id="rec1" onclick="podmienPolecane(1)">
                <img src="https://i1.fdbimg.pl/x1/cm6zz9/400x580_kd389e.jpg%20400w" id="rec2" onclick="podmienPolecane(2)">
                <img src="https://i1.fdbimg.pl/x1/0bdtmk/400x580_knk94i.jpg%20400w" id="rec3" onclick="podmienPolecane(3)">
                <img src="https://i1.fdbimg.pl/x1/ueb56fx1/400x580_ozp944.jpg%20400w" id="rec4" onclick="podmienPolecane(4)">
            </div>
        </div>
        <div class="container-fluid">
            <div class="main">
                <h2 class="mt-3">NA CZASIE</h2>

                <div class="time-switch mb-2">
                    <span>dzień</span> 
                    <span class="checked"><b>tydzień</b></span> 
                    <span>miesiąc</span> 
                    <span>rok</span>
                </div>
                
                <?php loadMovie('SELECT id, tytul, opis, rok_produkcji, plakat FROM filmy', 23); ?> 

                
                <h2 class="mt-3">POPULARNE SERIALE</h2>
                
            </div>
        </div>

        <script>
            var mainRec = 0;
            var moviesPosters = ['https://i1.fdbimg.pl/x1/bk7zz9/400x580_kd38gs.jpg%20400w', 'https://i1.fdbimg.pl/x1/vhl8e8v1/400x580_qw7aph.jpg%20400w', 'https://i1.fdbimg.pl/x1/cm6zz9/400x580_kd389e.jpg%20400w', 'https://i1.fdbimg.pl/x1/0bdtmk/400x580_knk94i.jpg%20400w', 'https://i1.fdbimg.pl/x1/ueb56fx1/400x580_ozp944.jpg%20400w'];
            var moviesTitles = ['Kac vegas', 'Forest Gump', 'Zielona mila', 'Był sobie pies', 'Interstellar'];
            var moviesYears = [2013, 2017, 2006, 1997, 2021];
            var moviesDescs = ['Przez świąteczny pośpiech ośmioletni Kevin zostaje sam w domu na Boże Narodzenie.', 'Ekranizacja powieści Dana Browna. Tajemnicze morderstwo w Luwrze staje się kluczem do rozwiązania jednej z największych zagadek strzeżonych przez tajemnicze stowarzyszenie.', 'Podróż hobbita z Shire i jego ośmiu towarzyszy, której celem jest zniszczenie potężnego pierścienia pożądanego przez Czarnego Władcę - Saurona.', 'Rok 2004, siedziba władz lokalnych w irackiej Karbali, City Hall, zostaje zaatakowana przez Al-Kaidę i sadrystów. Grupa polskich oraz bułgarskich żołnierzy odpiera kolejne ataki.', 'By odzyskać swój dom, brzydki ogr z gadatliwym osłem wyruszają uwolnić piękną księżniczkę.'];
            var moviesIds = [5, 3, 43, 12, 32];

            function onload()
            {
                recommendMovies();
                moreInfoWindows();
            }

            function recommendMovies()
            {
                document.getElementById('recommendPicture').src=moviesPosters[mainRec];
                document.getElementById('rec'+mainRec).style="border:3px solid #fff";
                document.getElementById('recommendBefore').style="background-image: url('"+moviesPosters[mainRec]+"')";
                
                document.getElementById('recTitle').innerHTML = moviesTitles[mainRec];
                document.getElementById('recYear').innerHTML = moviesYears[mainRec];
                document.getElementById('recDesc').innerHTML = moviesDescs[mainRec];

                var movieHref = document.getElementsByClassName('movieHref');

                for (var i=0; i<movieHref.length; i++) {
                    document.getElementsByClassName('movieHref')[i].href="film?id="+moviesIds[mainRec]+"&tytul="+moviesTitles[mainRec];
                }
            }

            function podmienPolecane(which)
            {
                if(which!=mainRec)
                {
                    var which = which;


                    document.getElementById('recommendPicture').style="background-image: url('"+moviesPosters[which]+"')";
                    document.getElementById('recommendPictureBefore').src=moviesPosters[which];
                    document.getElementById('recommendPicture').style.opacity="0";
                    setTimeout(function()
                    {
                        document.getElementById('recommendPicture').src=moviesPosters[which];
                        document.getElementById('recommendPicture').style.opacity="1";
                        
                    }, 200);
                    

                    document.getElementById('rec'+which).style="border:3px solid #fff";
                    document.getElementById("rec"+mainRec).style="border:none";
                    document.getElementById('recommendBefore').style="background-image: url('"+moviesPosters[which]+"')";
                    
                    document.getElementById('recTitle').innerHTML = moviesTitles[which];
                    document.getElementById('recYear').innerHTML = moviesYears[which];
                    document.getElementById('recDesc').innerHTML = moviesDescs[which];

                    var movieHref = document.getElementsByClassName('movieHref');

                    for (var i=0; i<movieHref.length; i++) {
                        document.getElementsByClassName('movieHref')[i].href="film?id="+moviesIds[which]+"&tytul="+moviesTitles[which];
                    }

                    mainRec = which;
                }
            }
        </script>

        <?php include 'elements/footer.php'; ?>

        <?php include 'elements/jsscripts.php'; ?>
        
        <?php include 'elements/end.php'; ?>
	</body>
</html>