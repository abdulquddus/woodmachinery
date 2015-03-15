<?php include("head-top.php"); ?>

<link rel="stylesheet" href="css/jQueryTab.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/animation.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/skin/minimalist.css">
<link rel="stylesheet" href="css/skin/flowcustom.css">

<!-- Specific jquery for this demo -->
<script src="js/jquery.tools.min.js"></script>
<!-- Flowplayer library -->
<script src="js/flowplayer.min.js"></script>
<script>
// for testing only, do not use this switch in production!
flowplayer.conf.engine = /flash/.test($(location).prop("search")) ? "flash" : "html5";
//http://stream.flowplayer.org/night
$(function () {
  var playlist = [],
      base = "http://seowebdesigningcompany.com/projects/vd-prj/akins/videos/",
      fn = "video-",
      videos = $(".scrollable span"),
      scrollable,
      api,
      i;

  // build playlist from videos named night1 thru night6
  for (i = 1; i < 7; i = i + 1) {
    playlist.push([
     
      { mp4:  base + fn  + i + ".mp4" }
    ]);
  }

  jQuery(".scrollable").scrollable({
    circular: true
  });

  scrollable = jQuery(".scrollable").data("scrollable");

  jQuery("#player").flowplayer({
    // loop the playlist in a circular scrollable
    loop: true,
    playlist: playlist

  }).bind("ready", function (e, api, video) {
    videos.each(function (i) {
      var active = i == video.index;

      jQuery(this).toggleClass("is-active", active)
             .toggleClass("is-paused", active && api.paused);
    });

  }).bind("pause resume", function (e, api) {
    videos.eq(api.video.index).toggleClass("is-paused", e.type == "pause");

  }).bind("finish", function (e, api) {
    var vindex = api.video.index,
        currentpage = Math.floor(vindex / 3),
        scrollindex = scrollable.getIndex(),
        next;

    // advance scrollable every 2nd playlist item
    if (vindex % 3 != 0 && scrollindex == currentpage) {
      // prefer circular movement when current item is visible
      scrollable.next();

    } else if (scrollindex != currentpage) {
      // scroll to next item if not visible
      next = vindex < playlist.length - 1 ? vindex + 1 : 0;
      scrollable.seekTo(Math.floor(next / 3));
    }
  });

  api = jQuery("#player").data("flowplayer");

  videos.click(function () {
    var vindex = videos.index(this);

    if (api.video.index === vindex) {
      api.toggle();
    } else {
      api.play(vindex);
    }
  });
});
</script>

<!-- colorbox -->
<link rel="stylesheet" href="css/colorbox.css" />

<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script src="js/jquery.colorbox.js"></script>

<!-- Optional FlexSlider Additions -->
<script defer src="js/jquery.flexslider.js"></script>
<script src="js/jquery.easing.js"></script>
<script src="js/jquery.mousewheel.js"></script>

<!-- jQueryTab.js -->
<script src="js/jQueryTab.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){
  jQuery(".group4").colorbox({rel:'group4', slideshow:true});
  });
</script>
<?php include("head-bottom.php"); ?>
<div class="topmainheaderwrapper" align="center">
  <div class="topmainheading">New England's #1 Woodworking Sales and Service Professionals !</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-9 spc">
      <div class="equipmentmodelmainwrapper">
        <div class="equipmentmodelwrapperleft">
          <div class="modelheading">Equipment Name/Model</div>
          <div class="tabingwrapper">
            <div class="tabs-5">
              <ul class="tabs new">
                <li class="active"><a href="#tab17">General</a></li>
                <li><a href="#tab18">Social Media</a></li>
              </ul>
              <section class="tab_content_wrapper">
                <article class="tab_content slider-thumb sld" id="tab17" style="height:420px;">
                  <div id="slider" class="flexslider">
                    <ul class="slides">
					  <li><a href="images/big/1.jpg" class="group4" title="Title"> <img src="images/small/1.jpg"/></a> </li>
					  <li><a href="images/big/2.jpg" class="group4" title="Title"> <img src="images/small/2.jpg"/></a> </li>
					  <li><a href="images/big/3.jpg" class="group4" title="Title"> <img src="images/small/3.jpg"/></a> </li>
					  <li><a href="images/big/4.jpg" class="group4" title="Title"> <img src="images/small/4.jpg"/></a> </li>
					  <li><a href="images/big/1.jpg" class="group4" title="Title"> <img src="images/small/1.jpg"/></a> </li>
					  <li><a href="images/big/2.jpg" class="group4" title="Title"> <img src="images/small/2.jpg"/></a> </li>
					  <li><a href="images/big/3.jpg" class="group4" title="Title"> <img src="images/small/3.jpg"/></a> </li>
					  <li><a href="images/big/4.jpg" class="group4" title="Title"> <img src="images/small/4.jpg"/></a> </li>
					  <li><a href="images/big/1.jpg" class="group4" title="Title"> <img src="images/small/1.jpg"/></a> </li>
					  <li><a href="images/big/2.jpg" class="group4" title="Title"> <img src="images/small/2.jpg"/></a> </li>
					  <li><a href="images/big/3.jpg" class="group4" title="Title"> <img src="images/small/3.jpg"/></a> </li>
					  <li><a href="images/big/4.jpg" class="group4" title="Title"> <img src="images/small/4.jpg"/></a> </li>
					</ul>
                  </div>
                  <div id="carousel" class="flexslider">
                    <ul class="slides">
					  <li> <img src="images/thumb/1.jpg" /> </li>
					  <li> <img src="images/thumb/2.jpg" /> </li>
					  <li> <img src="images/thumb/3.jpg" /> </li>
					  <li> <img src="images/thumb/4.jpg" /> </li>
					  <li> <img src="images/thumb/1.jpg" /> </li>
					  <li> <img src="images/thumb/2.jpg" /> </li>
					  <li> <img src="images/thumb/3.jpg" /> </li>
					  <li> <img src="images/thumb/4.jpg" /> </li>
					  <li> <img src="images/thumb/1.jpg" /> </li>
					  <li> <img src="images/thumb/2.jpg" /> </li>
					  <li> <img src="images/thumb/3.jpg" /> </li>
					  <li> <img src="images/thumb/4.jpg" /> </li>
					</ul>
                  </div>
                  <script type="text/javascript">
					jQuery(window).load(function(){
					  jQuery('#carousel').flexslider({
						animation: "slide",
						controlNav: false,
						animationLoop: false,
						slideshow: false,
						itemWidth: 70,
						itemMargin: 0,
						asNavFor: '#slider'
					  });

					  jQuery('#slider').flexslider({
						animation: "slide",
						controlNav: false,
						animationLoop: false,
						slideshow: false,
						sync: "#carousel",
						start: function(slider){
						  jQuery('body').removeClass('loading');
						}
					  });
					});
				  </script>
                </article>
                <article class="tab_content" id="tab18" style="height:285px;"> <div id="player" class="color-alt2"></div>
					<div class="scrollable-wrap">
					  <a class="prev">prev</a>  
					  <div class="scrollable">
						<div class="items">
						  <div>
							<span><img src="images/thumb/1.jpg" /></span> <span><img src="images/thumb/2.jpg" /></span>
						  </div>

						  <div>
							 <span><img src="images/thumb/3.jpg" /></span> <span><img src="images/thumb/4.jpg" /></span>
						  </div>
						  
						  <div>
							 <span><img src="images/thumb/1.jpg" /></span> <span><img src="images/thumb/2.jpg" /></span>
						  </div>

						</div>
					  </div>
					  <a class="next">next</a>
					</div>
				</article>
              </section>
              <script type="text/javascript">
				jQuery('.tabs-5').jQueryTab({
					initialTab: 3,
					tabInTransition: 'slideRightIn',
					tabOutTransition: 'slideRightOut',
					cookieName: 'active-tab-5'
					
				});
				</script>
            </div>
          </div>
        </div>
        <div class="equipmentmodelwrapperright">
          <div class="priceheading">Price: $0000 <span>Our Price: $XXXX</span></div>
          <div class="infowrapper">
            <div class="infoleft">Manufacturer</div>
            <div class="inforight">Timesaver</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Product Name</div>
            <div class="inforight">Wide belt sander-wo head 52''</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Model</div>
            <div class="inforight">SA-3200</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Serial #</div>
            <div class="inforight">2014-16</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Year</div>
            <div class="inforight">2003</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Condition</div>
            <div class="inforight">Used</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Hits</div>
            <div class="inforight">12</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Status</div>
            <div class="inforight">Available</div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Posted on</div>
            <div class="inforight">01/24/13</div>
          </div>
          
		  <div class="row">
            <div class="col-sm-12"><a class="col-sm-12 btn big-btn" href="#">I Want This NOW!</a></div>
			<div class="col-sm-6 top10"><a class="col-sm-12 btn" href="#">Contact Sales</a></div>
            <div class="col-sm-6 top10"><a class="col-sm-12 btn" href="request-quote.php">Submit RFQ</a></div>
            <div class="col-sm-6 top10"><a class="col-sm-12 btn" href="#">Send to Friend</a></div>
            <div class="col-sm-6 top10"><a class="col-sm-12 btn" href="#">Print Page</a></div>
		  </div>
		  
        </div>
      </div>
      <div class="tabingwrapper1">
        <div class="tabs-5">
          <ul class="tabs new">
            <li class="active"><a href="#tab17">Details</a></li>
            <li><a href="#tab18">Features</a></li>
            <li><a href="#tab19">Notes</a></li>
          </ul>
          <section class="tab_content_wrapper">
            <article class="tab_content" id="tab17">
              <p>General calidis mundum caligine coeperunt. Descenderat regat prima dissaepserat humanas tonitrua orbem bracchia. Principio galeae sole. Margine postquam evolvit eodem auroram uno omni ille secrevit regat.<a href="#tab3">General</a> coeptis undae traxit certis secrevit campoque liquidum margine gravitate. Animus convexi origine terrae cesserunt. Tumescere natus proximus lacusque. Otia faecis tonitrua erat hominum aliis radiis moles.</p>
              <p>General conversa egens spectent tum sed diremit haec. Dei cinxit zephyro media congeriem septemque rudis. Terrae nubes utramque opifex diu magni reparabat meis nam. Turba habendum. Onus animal est pondere. Foret dedit obsistitur. Tenent homo caligine humanas sanctius dicere sive addidit. Ignea sibi. Aberant mundi iners dispositam altae orbis fronde iunctarum nubibus.</p>
            </article>
            <article class="tab_content" id="tab18">
              <p>Social Media conversa egens spectent tum sed diremit haec. Dei cinxit zephyro media congeriem septemque rudis. Terrae nubes utramque opifex diu magni reparabat meis nam. Turba habendum. Onus animal est pondere. Foret dedit obsistitur. Tenent homo caligine humanas sanctius dicere sive addidit. Ignea sibi. Aberant mundi iners dispositam altae orbis fronde iunctarum nubibus. Ante parte. Quisquis tractu diu. Iudicis dominari frigida origo surgere fabricator. <a href="#tab4">Social media</a> piscibus figuras speciem evolvit ulla obstabatque cuncta. Omni grandia terrenae pugnabant pondus quisque orbis ultima.</p>
              <p>Social Media calidis mundum caligine coeperunt. Descenderat regat prima dissaepserat humanas tonitrua orbem bracchia. Principio galeae sole. Margine postquam evolvit eodem auroram uno omni ille secrevit regat.Coeptis undae traxit certis secrevit campoque liquidum margine gravitate. Animus convexi origine terrae cesserunt. Tumescere natus proximus lacusque. Otia faecis tonitrua erat hominum aliis radiis moles.</p>
            </article>
            <article class="tab_content" id="tab19">
              <p>Copyright eurus supplex undae fulgura congestaque locis. Gravitate ante nabataeaque sua naturae satus ad. <a href="#tab2">Copyright</a> madescit pugnabant effervescere abscidit altae. Parte norant principio vultus reparabat omni rapidisque.</p>
              <p>Copyright flamma erectos tempora sorbentur illas foret ambitae. Sata locavit triones. Terrarum tuti diversa formas diffundi prima quod regio premuntur. Ipsa pluviaque toto valles conversa quinta.</p>
            </article>
          </section>
          <script type="text/javascript">
			jQuery('.tabs-5').jQueryTab({
				initialTab: 3,
				tabInTransition: 'slideRightIn',
				tabOutTransition: 'slideRightOut',
				cookieName: 'active-tab-5'
				
			});
			</script>
        </div>
      </div>
      <div class="row1">
        <div class="newequip">
          <div class="featuredmainwrapper">
            <div class="featuredwrapper">Related Equipment</div>
          </div>
          <div class="col-sm-4 newcol1-lg-4 col-md-4">
            <div class="thumbnail"> <img src="images/products/p1.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 newcol1-lg-4 col-md-4">
            <div class="thumbnail"> <img src="images/products/p2.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 newcol1-lg-4 col-md-4">
            <div class="thumbnail"> <img src="images/products/p3.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 newcol1-lg-4 col-md-4">
            <div class="thumbnail"> <img src="images/products/p1.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3"> <a target="_blank" href="used-equip.php">View more Related Equipment></a>
            </p>
          </div>
        </div>
        <div class="soldequip">
          <div class="featuredmainwrapper">
            <div class="featuredwrapper">Related Accessories</div>
          </div>
          <div class="col-sm-4 new2col1-lg-4 col-md-4 " >
            <div class="thumbnail"> <img src="images/products/p1.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 new2col1-lg-4 col-md-4">
            <div class="thumbnail"> <img src="images/products/p2.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-4 new2col1-lg-4 col-md-4">
            <div class="thumbnail"> <img src="images/products/p2.jpg" alt="">
              <div class="caption">
                <h6><strong>First Product</strong></h6>
                <p><a target="_blank" href="#">Details ></a></p>
              </div>
            </div>
          </div>
          <div class="col-sm-3"> <a target="_blank" href="used-equip.php">View more Related Accessories</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="well1">
      <div class="dollarwrapper">
        <div class="dollarwrapper-col1"><img src="images/newarrival/dollar.png" /></div>
        <div class="dollarwrapper-col2">Lease this Equip. for 3yrs:<br />
          (approx.)<span>$299</span>per/month</div>
      </div>
    </div>
	<?php include("sidebar.php"); ?>
  </div>
</div>
<!-- /.container -->
<?php include("footer.php"); ?>
