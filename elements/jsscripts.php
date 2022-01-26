<script>
    function moreInfoWindows()
    {
        var how_many_series = $('.series').length;

        for(var is=1;is<=how_many_series;is++)//series
        {
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

            var how_many_in_row2 = how_many_in_row;

            
            var how_many_movies = $('.movie-div-series-'+is).length;

            //console.log('ile filmow w tej seri:'+how_many_movies);

            var rest = how_many_movies%how_many_in_row;

            //console.log('reszta: '+rest);

            //console.log('ile wierszy w tej serii: '+Math.ceil(how_many_movies/how_many_in_row));

            for(var i=1;i<=Math.ceil(how_many_movies/how_many_in_row);i++)//row
            {
                if(i==(Math.ceil(how_many_movies/how_many_in_row)))
                {
                    if(rest!=0)
                        how_many_in_row2 = rest;
                }
                //console.log('----------------------')
                //console.log('ile filmow w tym wierszu: '+how_many_in_row2);
                
                for(var i2=1;i2<=how_many_in_row2;i2++)//movie
                {
                    //console.log('-------')
                    if(movieRowNumber>=from_number & movieRowNumber<=how_many_in_row)
                    {
                        document.getElementsByClassName('movie-div-'+is+'-'+movieNumber)[0].classList.add("moreInfo-right");
                        //console.log('#right');
                    }

                    //console.log('#FILM: '+'movie-div-'+is+'-'+movieNumber);

                    //console.log('ktory w tym wierszu: '+movieRowNumber);
  
                    movieRowNumber++;
                    movieNumber++;
                    if(movieRowNumber==how_many_in_row2+1)
                        movieRowNumber = 1;
                }
            }
        }
    }

    function giveMoreInfo(id)
    {
        var id = id;
        console.log("movie-div-"+id);
        document.getElementsByClassName("movie-div-"+id)[0].style.zIndex="1"; 
        document.getElementsByClassName("movie-div-"+id)[0].style.opacity="1";  
    }

    function giveLessInfo(id)
    {
        var id = id;
        document.getElementsByClassName("movie-div-"+id)[0].style.opacity="0";  
        document.getElementsByClassName("movie-div-"+id)[0].style.zIndex="-10";  
    }

    function showMenu()
    {
        document.getElementsByClassName("nav-mobile")[0].style.opacity="1"; 
        document.getElementsByClassName("nav-mobile")[0].style.height="auto"; 

        document.getElementById("switch").innerHTML = '<i class="fas fa-bars" onclick="hideMenu()"></i>'; 
    }

    function hideMenu()
    {
        document.getElementsByClassName("nav-mobile")[0].style.opacity="0"; 
        document.getElementsByClassName("nav-mobile")[0].style.height="0"; 
        
        document.getElementById("switch").innerHTML = '<i class="fas fa-bars" onclick="showMenu()"></i>'; 
    }
</script>