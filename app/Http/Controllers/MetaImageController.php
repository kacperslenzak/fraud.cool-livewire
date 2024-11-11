<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MetaImageController extends Controller
{
    public function show(string $text)
    {
        // Set the path to your custom font file
        $fontPath = public_path('Satoshi-Black.ttf');

        // Create a blank image with dimensions 600x200
        $image = imagecreatetruecolor(1200, 630);

        // Allocate a color for the background (white)
        $white = imagecolorallocate($image, 255, 255, 255);

        // Allocate a color for the text (black)
        $black = imagecolorallocate($image, 27, 27, 27);

        // Fill the image with the white color
        imagefilledrectangle($image, 0, 0, 1200, 630, $black);

        // Set the font size (in points)
        $fontSize = 48;

        // Calculate the bounding box of the text
        $bbox = imagettfbbox($fontSize, 0, $fontPath, $text);

        // Calculate the x and y coordinates to center the text
        $x = (1200 - ($bbox[2] - $bbox[0])) / 2;
        $y = ( (630 - ($bbox[1] - $bbox[7])) / 2 + $fontSize ) - 30;

        // Add the text to the image using the custom font
        imagettftext($image, $fontSize, 0, $x, $y, $white, $fontPath, $text);

        $link = 'fraud.cool/'. $text;

        imagettftext($image, $fontSize, 0, $x - ((imagefontwidth($fontSize)) * strlen($link)), $y+80, $white, public_path('Satoshi-Regular.ttf'), $link);

        // Start capturing the output buffer
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();

        // Free up memory
        imagedestroy($image);

        // Return the image data as a response
        return Response::make($imageData, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="generated-image.png"'
        ]);
    }
}
