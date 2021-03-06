<?php

        define("WIDTH", 300);
        define("HEIGHT", 300);

        $img = imagecreatetruecolor(WIDTH, HEIGHT);

        $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
        $grey = imagecolorallocate($img, 0xFF, 0xFF, 00);
        $red = imagecolorallocate($img, 0xFF, 0, 0);
        $blue_t   = imagecolorallocatealpha($img, 0, 0, 0xFF, 0x40);

        imagefill($img, 100, 100, $white);

        //imageline($img, 0,0, WIDTH-1, HEIGHT-1, $blue_t);

        imagefilledrectangle($img, (WIDTH/2)-50, (HEIGHT/2)-50,(WIDTH/2)+50, (HEIGHT/2)+50, $grey);
        imagefilledrectangle($img, (WIDTH/2)-30, (HEIGHT/2)-30,(WIDTH/2)+30, (HEIGHT/2)+30, $red);
        imagefilledrectangle($img, 10, 10, WIDTH-11, HEIGHT-11, $blue_t);

        header("Content-Type: image/png");
        imagepng($img);

?>

 
 