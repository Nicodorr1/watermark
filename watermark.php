<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add watermark to images</title>
  </head>
  <body>

    <style media="screen">
      button{
        padding: 20px;
        border-radius: 7px;
        border: none;
        color: white;
        background-color: rgba(0, 0, 255, 0.5);
        cursor: pointer;
      }
    </style>

    <form action="" method="post">
      <button type="submit" name="button">Add watermark</button>
    </form>

    <?php

      if (isset($_POST['button'])) {
        $source = "source";

        $destination = "destination";

        $watermark = imagecreatefrompng("logo.png");

        $margin_right = 10;
        $margin_bottom = 5;

        $sx = imagesx($watermark);
        $sy = imagesy($watermark);

        $images = array_diff(scandir($source), array('..','.'));

        foreach ($images as $image) {
          $img = imagecreatefromjpeg($source.'/'. $image);

          imagecopy($img, $watermark, imagesx($img) - $sx - $margin_right, imagesy($img) - $sy - $margin_bottom, 0, 0, $sx, $sy);

          $i = imagejpeg($img, $destination.'/'.$image, 100);

          imagedestroy($img);
        }
      }


     ?>
  </body>
</html>
