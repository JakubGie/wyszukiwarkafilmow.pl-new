<script>
    function moreInfoWindows()
    {
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

        for(var i=1;i<=Math.ceil(how_many_movies/how_many_in_row);i++)
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