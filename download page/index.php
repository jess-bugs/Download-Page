<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML-PHP Form</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    
</head>
<body class="the-body p-2">
    
    
    
    <h2 class="text-center display-5 fw-bold" style="margin-top: 100px;">Downloadable Files</h2>

    <?php

    $dir = "images/";
    $scanned_files = scandir($dir);

    $files = array_diff($scanned_files, ['.', '..']);




        //Table row- Headers
        echo "<div class='container my-5'>";
        echo "<div class='border border-2 p-1'>";
        echo "<table class='table table-striped table-hover '>";
        echo "<thead>";
        echo "<tr>";
    
        //the headers
        echo "<th scope='col'>File Name</th>";
        echo "<th scope='col'>Size</th>";
        echo "<th scope='col'>Last Modified</th>";
        echo "</tr>";
        echo "</thead>";
    
    



    foreach($files as $file) {


        
            
        $size = filesize( $dir . $file);


        date_default_timezone_set('Asia/Manila');

        $filesize = formatSizeUnits($size);

        $time = filemtime($dir . $file);

        $lastModified = date("Y-m-d H:i:s", $time);


            
        // echo "<a href= 'images/" . $file . " ' download> $file " . "</a> " . "Size: " . $filesize  . " Last Modified: " . $lastModified . "<br><br>" ;




        //Table row - data
        echo "<tr>";
        echo "<td>" . "<a class='lead text-danger fw-normal' href= '$dir" . $file . " ' download> $file " . "</a>" . "</td>";
        echo "<td>" . $filesize . "</td>";
        echo "<td>" . $lastModified . "</td>";
        echo "</tr>";

    }
        echo "</table>";
        echo "</div>";
        echo "</div>";




    function formatSizeUnits($bytes) {
    
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    ?>
    
    
    

    
    
    
    
    
    
    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>