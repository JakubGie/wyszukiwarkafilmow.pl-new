<?php include 'elements/begining.php'; ?>
<?php include 'elements/phpscripts.php'; ?>
<!DOCTYPE HTML>
<html lang="pl-PL">
	<head>
		<title>Wyszukiwarka Filmów - Nie wiesz, co obejrzeć? Znajdź film!</title> 

        <?php include 'elements/head.php'; ?>
	</head>
	<body onload="onload()">
        <?php include 'elements/brand.php'; ?>

        <div class="container-fluid">
            <div class="main">
                <h2 class="mt-3"><h2 class="mt-3">KOLEKCJA ""</h2></h2>

                <?php loadMovie("SELECT * FROM filmy WHERE gatunek LIKE '%|4|%' ORDER BY ocena_imdb DESC",  10, 0, 0); ?> 

                <h2 class="mt-3">POPULARNE SERIALE</h2>


                <?php loadMovie("SELECT id, tytul, opis, rok_produkcji, plakat FROM filmy", 34, 0, 0); ?> 
                
            </div>
        </div>

        <script>
            var mainRec = 0;
            var moviesPosters = ['https://i1.fdbimg.pl/x1/bk7zz9/400x580_kd38gs.jpg%20400w', 'https://i1.fdbimg.pl/x1/vhl8e8v1/400x580_qw7aph.jpg%20400w', 'https://i1.fdbimg.pl/x1/cm6zz9/400x580_kd389e.jpg%20400w', 'https://i1.fdbimg.pl/x1/0bdtmk/400x580_knk94i.jpg%20400w', 'https://i1.fdbimg.pl/x1/ueb56fx1/400x580_ozp944.jpg%20400w'];
            var moviesTitles = ['Kac vegas', 'Forest Gump', 'Zielona mila', 'Był sobie pies', 'Interstellar'];
            var moviesYears = [2013, 2017, 2006, 1997, 2021];
            var moviesDescs = ['Gwiazda rocka, Pink, nie potrafi zaakceptować otaczającego go świata. Kiedy trafia do jednego z hoteli w Los Angeles, zaczyna rozmyślać nad swoim zyciem', 'Ekranizacja powieści Dana Browna. Tajemnicze morderstwo w Luwrze staje się kluczem do rozwiązania jednej z największych zagadek strzeżonych przez tajemnicze stowarzyszenie.', 'Podróż hobbita z Shire i jego ośmiu towarzyszy, której celem jest zniszczenie potężnego pierścienia pożądanego przez Czarnego Władcę - Saurona.', 'Rok 2004, siedziba władz lokalnych w irackiej Karbali, City Hall, zostaje zaatakowana przez Al-Kaidę i sadrystów. Grupa polskich oraz bułgarskich żołnierzy odpiera kolejne ataki.', 'By odzyskać swój dom, brzydki ogr z gadatliwym osłem wyruszają uwolnić piękną księżniczkę.'];
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

                document.getElementById('bb1').href = "film?id="+moviesIds[mainRec]+"&tytul="+moviesTitles[mainRec];
                document.getElementById('bb2').href = "film?id="+moviesIds[mainRec]+"&tytul="+moviesTitles[mainRec];

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

                    document.getElementById('bb1').href = "film?id="+moviesIds[which]+"&tytul="+moviesTitles[which];
                    document.getElementById('bb2').href = "film?id="+moviesIds[which]+"&tytul="+moviesTitles[which];
                    

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