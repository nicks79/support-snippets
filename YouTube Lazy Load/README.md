# YouTube Lazy Load Snippet
This will allow YouTube videos to me placed on webpages without a negative impact to page speed. This process does not allow the YouTube js to load until the user clicks to view the video.
## Adding the Code
Add `lite-youtube.js` to the js folder in the Uplift CMS.

This line of code goes in the head section of the page that the YouTube video is on that you need to lazy load. Be aware, you may need to adjust the path, but the current path should be standard for our CMS builds.
```html
<script type="module" src="/uplift-data/themes/default-theme/js/lite-youtube.js"></script>
```
## Adding the Video
Add the code from `snippet.html` where you want the video to show. You will replace `lxuN6GpwA4k` in the `snippet.html` with your video's identifer.
