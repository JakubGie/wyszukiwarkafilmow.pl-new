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
        <?php include 'elements/brand.php'; ?>

        <div class="movie-page">
            <div class="bgimg" style="background-image:url('<?php echo $plakat;?>')" class="w-100">s</div>
            <div class="info">
                <h1><?php echo $tytul; ?> <small><?php echo $rok_produkcji; ?></small></h1>
                <p><?php echo $opis; ?></p>
            </div>
        </div>
        
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

        <script>
            function onload()
            {
                moreInfoWindows();
            }
        </script>

        <?php include 'elements/footer.php'; ?>

        <?php include 'elements/jsscripts.php'; ?>
        
        <?php include 'elements/end.php'; ?>
	</body>
</html>