<?php
    if(isset($_POST['operation']))
    {
        include('connection.php');
        include('phpscripts.php');

        if($_POST['operation']=="loadMore")
        {
            loadMovie($_POST['sql'], $_POST['limit'], $_POST['series'], 12);

            echo '
                <script>
                    moreInfoWindows();
                </script>
            ';
        }
    }
?>