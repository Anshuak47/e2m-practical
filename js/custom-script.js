document.addEventListener("DOMContentLoaded", function(){
    var $ = jQuery;
  
    $(".category").hover(
    // Function to run on mouseenter (mouseover)
        function() {
            $(this).find(".term-name h3").addClass("fill");

             // Animate image (previous sibling)
            $(this).find(".term-image")
                .addClass("animation");
            },
        // Function to run on mouseleave (mouseout)
        function() {
            $(this).find(".term-name h3").removeClass("fill");
            $(this).find(".term-image")
               .removeClass("animation");
        }
    );

    var title = document.querySelector('.site-title a');
    var fletter = title.innerHTML.charAt(0);
    title.innerHTML = title.innerHTML.replace(fletter, '<span class="mirror">'+fletter+'</span>');
    
});