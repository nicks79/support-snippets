# Rotating Review Carousel

This will create rotating reviews pulling from reviews entered into the CMS. This does not use reviews from Birdeye RMS.

Instructions here assume you are keeping the file names the same.
## Includes File - section-review-carousel.php
This is the file responsible for pulling the reviews on to the page. It takes into account how many reviews are available and restyles accordingly if there are less than 3 reviews. This file tells the CMS where to put the review, name, and contains the stars showing on the rendered result. 

add the `section-review-carousel.php` file to the includes file in the CMS. 
## Styling - review-carousel.scss
This file contains all the styling for the rotating reviews section. 

This file should be placed in the styles folder.

Be sure to place an underscore "_" before the file name in the CMS.

Add it to the `theme.scss` file near the bottom with the call `@import "review-carousel";`

Compile the `theme.scss` file
## Adding to the page
Add this call to the page where you would like the reviews to be shown `{{ include file="section-review-carousel.php" }}`
