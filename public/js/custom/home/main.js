$(document).ready(function(){
  $('img.svg').each(function(){
       var $img = $(this);
       var imgID = $img.attr('id');
       var imgClass = $img.attr('class');
       var imgURL = $img.attr('src');

       $.get(imgURL, function(data) {
           // Get the SVG tag, ignore the rest
           var $svg = $(data).find('svg');

           // Add replaced image's ID to the new SVG
           if(typeof imgID !== 'undefined') {
               $svg = $svg.attr('id', imgID);
           }
           // Add replaced image's classes to the new SVG
           if(typeof imgClass !== 'undefined') {
               $svg = $svg.attr('class', imgClass+' replaced-svg');
           }

           // Remove any invalid XML tags as per http://validator.w3.org
           $svg = $svg.removeAttr('xmlns:a');

           // Replace image with new SVG
           $img.replaceWith($svg);

       }, 'xml');

   });
  // $('.sidenav a').click(function() {
  //   if($(this).find('img').attr('src') == 'assets/home/home.svg') {
  //     $(this).find('img').attr('src', 'assets/home/home-white.svg');
  //     $(this).css('background-color', '#200624');
  //     $(this).find('div').css('color', '#fff');
  //   }
  //   else if($(this).find('img').attr('src') == 'assets/home/home-white.svg') {
  //     $(this).find('img').attr('src', 'assets/home/home.svg');
  //     $(this).css('background-color', '#fff');
  //     $(this).find('div').css('color', '#200624');
  //   }
  //
  //
  //   // alt
  //   // $(this).parent().children().addClass('hvr-bounce-in');
  // });
//
//   /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
//   $('.btn').on('click', function openNav() {
//       document.getElementById("mySidenav").style.width = "250px";
//       document.getElementById("main").style.marginRight = "250px";
//   });
//
//   /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
//   $('.closebtn').on('click', function closeNav() {
//       document.getElementById("mySidenav").style.width = "0";
//       document.getElementById("main").style.marginRight = "0";
//   });
});
