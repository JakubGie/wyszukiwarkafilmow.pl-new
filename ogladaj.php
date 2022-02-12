<?php include 'elements/begining.php'; ?>
<?php include 'elements/phpscripts.php'; ?>
<?php
    getMovieInfo();
?>
<!DOCTYPE HTML>
<html lang="pl-PL">
	<head>
		<title><?php echo $tytul; ?> (<?php echo $rok_produkcji; ?>) - WyszukiwarkaFilmow.pl</title> 

        <?php include 'elements/head.php'; ?>
	</head>
	<body onload="onload()">
        <div class="position-relative">
            <div class="bgimg" style="background-image:url('<?php echo $plakat;?>')" class="w-100"></div>
            <?php include 'elements/brand.php'; ?>


            <div class="container">
            <div class="movie-page">
                
                <div class="info">
                    <img src="<?php echo $plakat; ?>">
                    <h1><?php echo $tytul; ?> <small><?php echo $rok_produkcji; ?></small></h1>
                    <p><?php echo $opis; ?></p>
                    <div class="cb"></div>
                </div>
            </div>


            <?php
                include('elements/simple_html_dom.php');

                $url = "https://www.ogladaj.to/wyszukaj/".$tytul." ".$rok_produkcji."";
                $url = str_replace(' ', '%20', $url);
                $url = str_replace('’', '', $url);

                $arrContextOptions=array(
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ),
                );  
    
                $html = file_get_html($url, false, stream_context_create($arrContextOptions));

                foreach($html->find('.video-clip-link') as $e)
                {
                    echo 'asd';
                }
            ?>


            
            <div class="container-fluid">
                <div class="main">
                    <?php
                        if($seria!=0)
                        {
                            echo '<h2 class="mt-3">KOLEKCJA "'.$seria_nazwa.'"</h2>';
                            loadMovie("SELECT * FROM filmy WHERE seria=".$seria." ORDER BY czesc_serii ASC",  100, 0, 0);
                        }
                    ?>
                    
                </div>
            </div>

            <div class="container-fluid bg-wf-dark py-4 text-center mb-4">
                <h2 class="mb-2">TRAILER</h2>
                <iframe width="560" height="315" class="trailer" src="https://www.youtube.com/embed/<?php echo $zwiastun; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            </div>
            

            <script>
                function onload()
                {
                    moreInfoWindows();
                    containerFit();
                }
            </script>

            <?php include 'elements/footer.php'; ?>

            <?php include 'elements/jsscripts.php'; ?>
            
            <?php include 'elements/end.php'; ?>
        </div>
	</body>
</html>