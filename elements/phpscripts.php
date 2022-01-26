<?php
    function loadMovie($query)
    {
        global $polaczenie;
        global $movieNumber;
        global $movieSeries;
        $zapytanie = $polaczenie->query($query);
        
        echo '<div class="row series">';

            for($i=1;$i<=$zapytanie->num_rows;$i++)
            {
                $row = $zapytanie->fetch_assoc();

                $id = $row['id'];
                $tytul = $row['tytul'];
                $opis = $row['opis'];
                $rok_produkcji = $row['rok_produkcji'];
                $plakat = $row['plakat'];

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
                                            <img src="'.$plakat.'">
                                            <a href=""><h3>'.$tytul.' <small>'.$rok_produkcji.'</small></h3></a>
                                            <p>'.$opis.'</p>
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

        echo '</div>';
        $movieNumber=1;

        $movieSeries++;
    }

?>