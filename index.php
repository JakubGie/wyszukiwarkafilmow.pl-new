<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Wyszukiwarka Filmów - Nie wiesz, co obejrzeć? Znajdź film!</title>

        <link rel="shortcut icon" href="img/logo.png">
		
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="main.css">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	</head>
	<body onload="onload()">
        <div class="header">
            <a href="" class="text-wf"><img src="img/logo.png"></a>

            <div class="nav">
                <a href="">Filmy</a>
                <a href="">Seriale</a>
                <a href="">Losuj</a>
            </div>

            <div class="right-nav">
                <i class="fas fa-search"></i>
                <a href="">Logowanie</a>
                <a href="" class="register">Rejestracja</a>
            </div>
        </div>
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
                    <span><b>tydzień</b></span> 
                    <span>miesiąc</span> 
                    <span>rok</span>
                </div>
                <div class="row">
                    <?php
                        $movieNumber = 1;
                        for($i=1;$i<=36;$i++)
                        {
                            if($i>7)
                                $place = "right";

                            else
                                $place = "left";

                            echo '
                                <div class="movie col-6 col-sm-3 col-lg-2 col-xl-1">
                                <div  onmouseover="giveMoreInfo('.$movieNumber.')"  onmouseout="giveLessInfo('.$movieNumber.')">
                                    <img class="w-100" src="https://i1.fdbimg.pl/x1/0bdtmk/400x580_knk94i.jpg%20400w">
                                    <div class="position-relative">
                                        <div id="movie-div-'.$movieNumber.'" class="moreInfo">
                                            <div class="position-relative">
                                                <div class="desc-image">
                                                    <img class="bg" src="https://i1.fdbimg.pl/x1/0bdtmk/400x580_knk94i.jpg%20400w">
                                                </div>
                                                <div class="desc-main">
                                                    <img src="https://i1.fdbimg.pl/x1/0bdtmk/400x580_knk94i.jpg%20400w">
                                                    <h3>Tytuł filmu Tytuł  asdas dasdasda sdsadasd<small>2003</small></h3>
                                                    <p>Młoda Sophie chciałaby zaprosić na swój ślub ojca, którego nigdy nie poznała. Na podstawie pamiętnika matki wyłania trzech potencjalnych kandydatów.</p>
                                                    <a href="" class="button bg-wf button-first">Oglądaj</a>
                                                    <a href="" class="button bg-info2">Więcej informacji</a>
                                                    <div class="cb"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            $movieNumber++;
                        }
                    ?>

                    
                </div>
                <span>załaduj więcej</span>
                <h2 class="mt-3">POPULARNE SERIALE</h2>
                <div class="row">
                    
                </div>
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


                // right-left movies

                var how_many_movies = $('.movie').length;

                var movieNumber = 1;
                var movieRowNumber = 1;

                if($(window).width()>=720)
                {
                    var how_many_in_row = 4;
                    var from_number = 3;
                }

                if($(window).width()>=960)
                {
                    var how_many_in_row = 6;
                    var from_number = 4;
                }

                if($(window).width()>=1200)
                {
                    var how_many_in_row = 12;
                    var from_number = 8;
                }

                for(var i=1;i<=how_many_movies/how_many_in_row;i++)
                {
                    for(var i2=1;i2<=how_many_in_row;i2++)
                    {
                        console.log(movieRowNumber);
                        if(movieRowNumber>=from_number & movieRowNumber<=how_many_in_row)
                            document.getElementById('movie-div-'+movieNumber).classList.add("moreInfo-right");
                        
                        movieRowNumber++;
                        movieNumber++;
                        if(movieRowNumber==how_many_in_row+1)
                            movieRowNumber = 1;
                    }
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


            function giveMoreInfo(id)
            {
                var id = id;
                document.getElementsByClassName("moreInfo")[id-1].style.zIndex="1"; 
                document.getElementsByClassName("moreInfo")[id-1].style.opacity="1";  
            }

            function giveLessInfo(id)
            {
                var id = id;
                document.getElementsByClassName("moreInfo")[id-1].style.opacity="0";  
                document.getElementsByClassName("moreInfo")[id-1].style.zIndex="-10";  
            }

        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>