 <style>
     

        .inline-code { padding: 1px 5px; background: #eee; border-radius: 2px; }
        pre { padding: 15px 10px; font-size: .9em; color: #555; background: #edf3f8; }
        pre i { color: #aaa; } /* comments */
        pre b { font-weight: normal; color: #cf4b25; } /* strings */
        pre em { color: #0c59e9; } /* numeric */

        /* Pure CSS */
        .pure-button { margin: 5px 0; text-decoration: none !important; }
        .button-lg { margin: 5px 0; padding: .65em 1.6em; font-size: 105%; }
        
        /* required snapPuzzle styles */
        .snappuzzle-wrap { position: relative; display: block; }
        .snappuzzle-pile { position: relative; }
        .snappuzzle-piece { cursor: move; }
        .snappuzzle-slot { position: absolute; width: 100%; background: #fff; opacity: .8; }
        .snappuzzle-slot-hover { background: #eee; }
        .pure-img{
            width: 100%;
        }
    </style>

    <div class="container">
        <div class="row">
    <div class="col s6">
      <br>
      <img src="<?=base_url('/src/img/logo.jpg');?>" width="100%">
    </div>
    <div class="col s6">
       
        <br>
      <h5>
         <i class="fa-puzzle-piece fa"></i> Puzzle  
      </h5>
     
    </div>
  </div>
         <div id="puzzle-containment" style="border-top: 1px solid #eee;border-bottom:1px solid #eee;background:#fafafa;margin:30px 0;padding:10px;text-align:center">
        <div class="pure-g" style="max-width:1280px;margin:auto">
            <div class="pure-u-1 pure-u-md-1-2"><div style="margin:10px">
                <img id="source_image" class="pure-img" src="./src/img/<?=$item->gambar;?>" >
            </div></div>
            <div class="pure-u-1 pure-u-md-1-2">
                <div id="pile" style="margin:10px">
                    <div id="puzzle_solved" style="display:none;text-align:center;position:relative;top:25%">
                       <!-- <h6 class="center-align"> Yeay, Kamu Berhasil</h6> -->
                       <a href="#" data-link='<?=base_url('home/bermain_puzzle');?>' class="link btn btn-large"> <i class="fa fa-refresh"></i> Main Lagi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
<div class="row">
    <div class="col s12">
     <a class="waves-effect waves-light btn-large btn-block btn-fixed  link" data-link='<?=base_url('home/mari_bermain');?>'>
         <i class="fa fa-backward"></i>  Kembali
    </a>
    </div>
  </div>
</div>
    <script src="./src/js/google-js.js"></script>
    <script src="./src/js/google-ui-js.js"></script>
    <script src="./src/fz/jquery.snap-puzzle.js"></script>
    <script>
        // jQuery UI Touch Punch 0.2.3 - must load after jQuery UI
        // enables touch support for jQuery UI
        !function(a){function f(a,b){if(!(a.originalEvent.touches.length>1)){a.preventDefault();var c=a.originalEvent.changedTouches[0],d=document.createEvent("MouseEvents");d.initMouseEvent(b,!0,!0,window,1,c.screenX,c.screenY,c.clientX,c.clientY,!1,!1,!1,!1,0,null),a.target.dispatchEvent(d)}}if(a.support.touch="ontouchend"in document,a.support.touch){var e,b=a.ui.mouse.prototype,c=b._mouseInit,d=b._mouseDestroy;b._touchStart=function(a){var b=this;!e&&b._mouseCapture(a.originalEvent.changedTouches[0])&&(e=!0,b._touchMoved=!1,f(a,"mouseover"),f(a,"mousemove"),f(a,"mousedown"))},b._touchMove=function(a){e&&(this._touchMoved=!0,f(a,"mousemove"))},b._touchEnd=function(a){e&&(f(a,"mouseup"),f(a,"mouseout"),this._touchMoved||f(a,"click"),e=!1)},b._mouseInit=function(){var b=this;b.element.bind({touchstart:a.proxy(b,"_touchStart"),touchmove:a.proxy(b,"_touchMove"),touchend:a.proxy(b,"_touchEnd")}),c.call(b)},b._mouseDestroy=function(){var b=this;b.element.unbind({touchstart:a.proxy(b,"_touchStart"),touchmove:a.proxy(b,"_touchMove"),touchend:a.proxy(b,"_touchEnd")}),d.call(b)}}}(jQuery);

        function start_puzzle(x){
            $('#puzzle_solved').hide();
            $('#source_image').snapPuzzle({
                rows: x, columns: x,
                pile: '#pile',
                containment: '#puzzle-containment',
                onComplete: function(){
                    $('#source_image').fadeOut(150).fadeIn();
                    $('#puzzle_solved').show();
                    swal("success","Yeay, Kamu Berhasil",'success');
                }
            });
        }

        $(function(){
            $('#pile').height($('#source_image').height());
            start_puzzle(2);

            $('.restart-puzzle').click(function(){
                $('#source_image').snapPuzzle('destroy');
                start_puzzle($(this).data('grid'));
            });

            $(window).resize(function(){
                $('#pile').height($('#source_image').height());
                $('#source_image').snapPuzzle('refresh');
            });
        });

         $('.link').click(function load_link() {
            var link = $(this).attr('data-link')
            $('#index-banner').load(link)
          })

    </script>