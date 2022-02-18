<?php
    function getMovieInfo()
    {
        global $polaczenie, $tytul, $opis, $kraj, $rok_produkcji, $czas_trwania, $rodzaj, $gatunek, $temat, $ocena_imdb, $rezyser, $seria, $czesc_serii, $datadodania, $zwiastun, $komentarze, $wyswietlenia, $plakat, $seria_nazwa;
        
        if(isset($_GET['id']) && isset($_GET['tytul']))
        {
            $zapytanie = $polaczenie->query("SELECT * FROM filmy WHERE id=".$_GET['id']." AND tytul='".$_GET['tytul']."'");
            
            if($zapytanie->num_rows==0)
            {
                header('Location: https://wyszukiwarkafilmow.pl');
		        exit;
            }

            else
            {
                $row = $zapytanie->fetch_assoc();

                $id = $row['id'];
                $tytul = $row['tytul'];
                $opis = $row['opis'];
                $kraj = $row['kraj'];
                $rok_produkcji = $row['rok_produkcji'];
                $czas_trwania = $row['czas_trwania'];
                $rodzaj = $row['rodzaj'];
                $gatunek = $row['gatunek'];
                $temat = $row['temat'];
                $ocena_imdb = $row['ocena_imdb'];
                $rezyser = $row['rezyser'];
                $seria = $row['seria'];
                $czesc_serii = $row['czesc_serii'];
                $datadodania = $row['datadodania'];
                $zwiastun = $row['zwiastun'];
                $komentarze = $row['komentarze'];
                $wyswietlenia = $row['wyswietlenia'];
                $plakat = $row['plakat'];

                if($seria!=0)
                {
                    $zapytanie = $polaczenie->query("SELECT nazwa FROM serie WHERE id=".$seria."");
                    $row = $zapytanie->fetch_assoc();

                    $seria_nazwa = $row['nazwa'];
                }
            }
        }

        else
        {
            header('Location: https://wyszukiwarkafilmow.pl');
		    exit;
        }
    }

    function loadMovie($query, $limit, $series, $loadMore)
    {
        global $polaczenie;
        global $movieSeries;
        global $how_many_movies_in_series;
        global $sqlInSeries;

        if($series!=0)
            $movieSeries = $series;
        
        if($loadMore!=0)
            $limit+=$loadMore;

        $SQLquery = $query." LIMIT ".$limit;
        
        $zapytanie = $polaczenie->query($SQLquery);



        $how_many_movies_in_series[$movieSeries] = $zapytanie->num_rows;
        $sqlInSeries[$movieSeries] = $query;


        if($series==0)
            echo '<div class="series series'.$movieSeries.'">';
        echo '<div class="row">';

            for($i=1;$i<=$zapytanie->num_rows;$i++)
            {
                $row = $zapytanie->fetch_assoc();

                $id = $row['id'];
                $tytul = $row['tytul'];
                $opis = $row['opis'];
                $rok_produkcji = $row['rok_produkcji'];
                $plakat = $row['plakat'];

                $movieNumber = $i;

                echo '
                    <div class="movie col-6 col-sm-3 col-lg-2 col-xl-1">
                        <div  onmouseover="giveMoreInfo(\''.$movieSeries."-".$movieNumber.'\')"  onmouseout="giveLessInfo(\''.$movieSeries."-".$movieNumber.'\')">
                            <a href="film?id='.$id.'&tytul='.$tytul.'">
                                <img class="w-100" src="'.$plakat.'" alt="'.$tytul.' '.$rok_produkcji.'">
                            </a>
                            <div class="position-relative">
                                <div class="moreInfo movie-div-number-'.$movieNumber.' movie-div-series-'.$movieSeries.' movie-div-'.$movieSeries.'-'.$movieNumber.'">
                                    <div class="position-relative">
                                        <div class="desc-image">
                                            <img class="bg" src="'.$plakat.'" alt="'.$tytul.' '.$rok_produkcji.'">
                                        </div>
                                        <div class="desc-main">
                                            <a href="film?id='.$id.'&tytul='.$tytul.'">
                                                <img src="'.$plakat.'" alt="'.$tytul.' '.$rok_produkcji.'">
                                            </a>
                                            <a href="film?id='.$id.'&tytul='.$tytul.'"><h3>'.$tytul.' <small>'.$rok_produkcji.'</small></h3></a>
                                            <p>'.$opis.'</p>
                                            <a href="ogladaj?id='.$id.'&tytul='.$tytul.'" class="button bg-wf button-first">Oglądaj</a>
                                            <a href="film?id='.$id.'&tytul='.$tytul.'" class="button bg-info2">Więcej informacji</a>
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

        if($limit==$zapytanie->num_rows)
            echo '<span id="loadMore'.$movieSeries.'" class="load-more">załaduj więcej</span>';
        

        echo '</div>';
        if($series==0)
            echo '</div>';

        $movieSeries++;
    }

    function scrapGenres($genres)
    {
        global $polaczenie;

        $genres = str_replace('|', '', $genres);
        $genresArray = explode(",", $genres);

        for($i=0;$i<=substr_count($genres,",");$i++)
        {
            $zapytanie = $polaczenie->query("SELECT id, nazwa FROM gatunki WHERE id=".$genresArray[$i]."");

            $row = $zapytanie->fetch_assoc();
            
            echo '<a href="gatunek?id='.$row['id'].'&nazwa='.$row['nazwa'].'">'.$row['nazwa'].'</a>';
        }
    }

    function scrapTopics($topics)
    {
        global $polaczenie;

        $topics = str_replace('|', '', $topics);
        $topicsArray = explode(",", $topics);

        for($i=0;$i<=substr_count($topics,",");$i++)
        {
            $zapytanie = $polaczenie->query("SELECT id, temat FROM tematy WHERE id=".$topicsArray[$i]."");

            $row = $zapytanie->fetch_assoc();
            
            echo '<a href="temat?id='.$row['id'].'&nazwa='.$row['temat'].'">'.$row['temat'].'</a>';
        }
    }

    function scrapDirectors($directors)
    {
        global $polaczenie;

        $directors = str_replace('|', '', $directors);
        $directorsArray = explode(",", $directors);

        for($i=0;$i<=substr_count($directors,",");$i++)
        {
            $zapytanie = $polaczenie->query("SELECT id, imie, nazwisko FROM rezyserzy WHERE id=".$directorsArray[$i]."");

            $row = $zapytanie->fetch_assoc();
            
            echo '<a href="rezyser?id='.$row['id'].'&imie='.$row['imie'].'&nazwisko='.$row['nazwisko'].'">'.$row['imie'].' '.$row['nazwisko'].'</a>';
        }
    }

    function scrapProductions($productions)
    {
        global $polaczenie;

        $productions = str_replace('|', '', $productions);
        $productionsArray = explode(",", $productions);

        for($i=0;$i<=substr_count($productions,",");$i++)
        {
            $zapytanie = $polaczenie->query("SELECT id, nazwa FROM kraje WHERE id=".$productionsArray[$i]."");

            $row = $zapytanie->fetch_assoc();
            
            echo '<a href="kraj?id='.$row['id'].'&nazwa='.$row['nazwa'].'">'.$row['nazwa'].'</a>';
        }
    }

    function movieTime($czas_trwania)
    {
        if($czas_trwania>=60)
        {
            $ile = floor($czas_trwania/60);
            $reszta = $czas_trwania%60;
            $czas_trwania = $ile."h ".$reszta."min";
            if($reszta==0)
            {
                $czas_trwania = $ile."h";
            }
        }

        else
        {
            $czas_trwania = $czas_trwania."min";
        }

        echo $czas_trwania;
    }


    
?>