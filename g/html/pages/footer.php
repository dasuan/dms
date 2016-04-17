<!-- FOOTER -->
<footer class="app-footer">
  <div class="container">
    <!-- <hr /> -->
    <p class="text-muted">Powered by <a id="t" href="http://github.com/dasuan">dasuan</a> &copy; <?php echo date("Y");?>, Copyleft. </p>
</div>
</footer>
<!-- <div id='tt' style="width: 1000px;height: 1000px;"></div> -->
<script src="js/sweep.js"></script>
<script>
;(function() {
//unuse
  // function loop1 () {
  //   // sweep(t, ['color', 'border-color','background'], 'hsl(0, 1, 0.5)', 'hsl(359, 1, 0.5)', {
  //   //   callback: loop,
  //   //   direction: -1,
  //   //   duration: 18000,
  //   //   space: 'HUSL'
  //   // });

  //   sweep(t, ['color', 'border-color','background'], 'rgb(236,0,140)', 'rgb(0,188,195)', {
  //     callback: loop2,
  //     direction: -1,
  //     duration: 1800
  //   });

  // }

  // function loop2 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(0,188,195)', 'rgb(0,188,195)', {
  //     callback: loop3,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

  // function loop3 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(0,188,195)', 'rgb(95,178,106)', {
  //     callback: loop4,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

  // function loop4 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(95,178,106)', 'rgb(95,178,106)', {
  //     callback: loop5,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

  // function loop5 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(95,178,106)', 'rgb(252,115,49)', {
  //     callback: loop6,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

  // function loop6 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(252,115,49)', 'rgb(252,115,49)', {
  //     callback: loop7,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

  // function loop7 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(252,115,49)', 'rgb(236,0,140)', {
  //     callback: loop8,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

  // function loop8 () {
  //   sweep(t, ['color', 'border-color','background'], 'rgb(236,0,140)', 'rgb(236,0,140)', {
  //     callback: loop1,
  //     direction: -1,
  //     duration: 1800
  //   });
  // }

function loop() {
sweep(t, ['color', 'border-color'], 'hsl(0, 1, 0.5)', 'hsl(359, 1, 0.5)', {
  callback: loop,
  direction: 1,
  duration: 10000,
  space: 'HUSL'
});
}


var t = document.getElementById('t');
loop();

})();
</script>


<a href="#top" class="second" style="">
  <i class="app-logo fa fa-chevron-circle-up fa-5x slow_show"></i>
</a>

<script type="text/javascript">
  $("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "fast");
  return false;
});

          /**
                  * 网页加载完毕后，确定各div的位置
                  */
          $(document).ready(function(){
            floatdiv();
          });
          /**
                  * 网页滚动时，确定各div的位置
                  */
          $(window).scroll(function(){
            floatdiv();
          });
          /**
                  * div浮动函数
                  */
          function floatdiv(){
            var scrollTop = $(this).scrollTop();
            /*查找class=second 的元素，调整css*/
            if (scrollTop > 350) {

              $(".second").css({
                "visibility" : "visible",
                "position" : "fixed",
                "bottom"      : "10%",
                "right"     : "5%",
                "opacity":"0.3",
                "z-index"  : "999",
                
              });

              $(".second").show('slow');
              

            } else {
              $(".second").hide('slow');

              // $(".second").css({
              //   "visibility" : "hidden",
              //   "position" : "static"
                
              // });

            }
          }

          // window.onscroll = function() { 
          //   console.info(window.scrollY); 
          // } 



</script>

