<?php
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
                            <img class="w-100" src="'.$plakat.'">
                            <div class="position-relative">
                                <div class="moreInfo movie-div-number-'.$movieNumber.' movie-div-series-'.$movieSeries.' movie-div-'.$movieSeries.'-'.$movieNumber.'">
                                    <div class="position-relative">
                                        <div class="desc-image">
                                            <img class="bg" src="'.$plakat.'">
                                        </div>
                                        <div class="desc-main">
                                            <a href="film?id='.$id.'&tytul='.$tytul.'">
                                                <img src="'.$plakat.'">
                                            </a>
                                            <a href="film?id='.$id.'&tytul='.$tytul.'"><h3>'.$tytul.' <small>'.$rok_produkcji.'</small></h3></a>
                                            <p>'.$opis.'</p>
                                            <a href="" class="button bg-wf button-first">Oglądaj</a>
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




    
?>