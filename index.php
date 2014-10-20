<?php
include_once('header.php');
require_once('path.php');
require_once($_INC_REQUIRE.'config.php');
?>
<div class="clr"></div>
<div id="contenar">
    <!-- left content area-->
    <div id="content_part3">
       <div class="contet_title"><img src="images/letst_new_icon.png" align="absmiddle" style="float:left; padding-left:5px;" /> LATEST STORY</div>
       <div class="clr"></div>
       <div>
       
          <div class="jm-item first">
	         <div class="jm-item-wrapper">
		         <div class="jm-item-image">
			       <img src="images/rahul-dravid-cover-326x159.jpg" width="100%" alt="" />
			       <span class="jm-item-overlay"> </span>
			       <div class="jm-item-button"><a href="#">View</a></div>
		         </div>
		         <div class="jm-item-title">Rahul Darvid is</div> <div class="jm-item-ratting"><img src="images/ratting.png" /></div>
	         </div>
          </div>
          
          <div class="jm-item first">
	         <div class="jm-item-wrapper">
		         <div class="jm-item-image">
			       <img src="images/first-slap-326x159.jpg" width="100%" alt="" />
			       <span class="jm-item-overlay"> </span>
			       <div class="jm-item-button"><a href="#">View</a></div>
		         </div>
		         <div class="jm-item-title">What Happens When 20  </div> <div class="jm-item-ratting"><img src="images/ratting.png" /></div>
	         </div>
          </div>
         </div>
        
    </div>
        
    <!-- middle slider area-->
    <div id="content_part2">
        <div id="gallery">
		<?php
			$resslider= mysql_query("select * from quiz  where is_created=1 order by id limit 10")or die(mysql_error());
									
									while($slider = mysql_fetch_assoc($resslider))
									{
										
									  $user_id = $slider['id'];
									
									   $username_slider = $slider['title'];
									   $image_slide= $slider['image'];
									  
		?>
         
		  <?php
		  //if($image_slide=='')
		  $quiz_image = glob($_QUIZ_REQUIRE."quiz_image/".$user_id."*");
		 
		  if (sizeof($quiz_image)==0)
		  {
		  ?> <a href="quiz.php?quiz_id=<?php echo $user_id;?>" class="show">
		
		    <img src="<?php echo $_INC; ?>image/logo/largquiz.jpg"   title="" alt="" 
            rel="<h3><?php echo $username_slider; ?></h3>"/></a>
		<?php
			}
			else
			{
		?>
	      <a href="quiz.php?quiz_id=<?php echo $user_id;?>" class="show">
		  <?php
		    $ab=explode("/",$quiz_image[0]);
			$nu=count($ab);
			
			
	      ?>
		    <img src="<?php echo $_QUIZ; ?>quiz_image/<?php echo $ab[$nu-1]; ?>"  width="100%" height="500" title="" alt="" 
            rel="<h3><?php echo $username_slider; ?></h3>"/></a>
		  <?php
		  }
		  }?>
	     
	       <div class="caption">
		   <div class="content"></div>
		   </div>
       </div>
    </div>
    
    <!-- right content area-->
    <div id="content_part1">
         <img src="images/harrys_vertical_small.jpg" width="100%" height="420" />
    </div>
    
    
    
    
    <div class="clr"></div>
    
    
    <div id="newsltr_box">
          <div align="center" style="padding:0px; margin:0px;">
             <strong>Get More Stories like this in your Inbox !</strong> <font style="font-size:12px">We send out a lovely email newsletter with the most popular stories.</font>
             <span class="nwsltr_inpt"><input type="text" placeholder="yourmail@mail.com" /></span>
             <a href="#"><span class="newsltr">Subscribe Now</span></a>
          </div>
    </div>
    
    <div class="clr"></div>
    
    <div id="top_histry">
       <div class="top_story_content">
           <div class="title">Top Stories</div> 
           <div class="buttondd">
              <a href="#"><span class="prvv" ><img src="images/left_arrow.png" align="absmiddle" /></span></a>
              <a href="#"><span class="nextt"><img src="images/right_arrow.png" align="absmiddle"  /></span></a>
           </div>
           <div class="clr"></div>
           <div class="decription">
               Agam tractatos mel ad, vel ea unum tritani qualisque, mel ne impedit inciderint. Ei veinc menandri cu vix, eum vidit vitae mollis ne.
               Agam tractatos mel ad, vel ea unum tritani qualisque, mel ne impedit inciderint. Ei veinc menandri cu vix, eum vidit vitae mollis ne.
               Agam tractatos mel ad, vel ea unum tritani qualisque, mel ne impedit inciderint. Ei veinc menandri cu vix, eum vidit vitae mollis ne.
           </div>
       </div>
       
       <div style="float:right; width:70%; overflow:hidden; height:auto;">
       <div style="width: 800px; height: 250px; visibility: visible; overflow: hidden; position: relative;" id="my_carousel" class="carousel groupr">
          <ul style="width: 1324px; left: 0px; position: absolute; float:left; padding:0px; margin:0px;" class="carousel-apps group">
             <?php
									$count=0;
									$user = mysql_query("select * from quiz  where is_created=1 order by id limit 10")or die(mysql_error());
									$num_user = mysql_num_rows($user);
									if($num_user > 0)
									{
									 
									while($fetch_user = mysql_fetch_assoc($user))
									{
										$count+=1;
									   $user_id = $fetch_user['id'];
									   $username = $fetch_user['title'];
									   $image= $fetch_user['image'];
									   $created= $fetch_user['created'];
									   $deleted = 0;
									   ?>
			 
			 <li>
               <div class="top_story_box">
                 <div>
				  <?php
				  if($image=='')
				  {
				  ?>
				 <img src="<?php echo $_INC; ?>image/logo/quiztale.jpg" width="243" height="180" />
				 <?php
				 }
				 else
				 {
				 ?>
				  <img src="<?php echo $_QUIZ; ?>quiz_image/<?php echo $image; ?>" width="243" height="180" />
				 <?php
                 }				 
				 ?>
				 </div>
                 <div class="stry_ttl"><?php echo $username; ?></div>
                 <div class="stry_ttl_second"><?php echo date('M d, Y',$created);?><span style="float:right;"><img src="images/ratting.png" /></span></div>
                </div>        
              </li>
			  <?php
			  }
			  }
			  ?>
              
              
              
           </ul>
        </div>
       
    </div>

</div>  
    
    
    
    
    <div class="clr"></div>
    
    
    <div id="contenar_part3">
          <div class="bx1">
              <div class="title2">Top User</div>
              <div class="clr"></div>
			  <?php
			  $res=mysql_query("SELECT * FROM `user_details` order by user_id limit 3") or die(mysql_error());
			  while($row=mysql_fetch_assoc($res))
			  {
			 
			  ?>
              <div class="top_usr_1">
                  <div><img src="images/photodune-5506631-man-with-digital-glasses-m-587x345_c.jpg" width="100%" height="200" class="usr_timln" /></div>
                  <div align="center"><img src="images/38e64aa9dd65dc33505e208ca36c34f1.jpg" class="usr_img" /></div>
                  <div class="usr_cnt_ttl"><?php echo $row['Email'];?></div>
                  <p class="descrttn"> <?php echo $row['username']."<br />".$row['First_Name']." ".$row['Last_Name'];?> . </p>
                  <div class="usr_dttd"><?php echo date('d M Y',$row['Signup_Date']);?>  <font style="float:right"><?php echo $row['First_Name']." ".$row['Last_Name'];?></font></div>
              </div>
			  <?php
			  }?>
               <!--<div class="top_usr_1">
                  <div><img src="images/mumbai-metro-326x159.jpg" width="100%" height="200" class="usr_timln" /></div>
                  <div align="center"><img src="images/b2e85c26862c5df5e2944188add29c87.jpg" class="usr_img" /></div>
                  <div class="usr_cnt_ttl">RIDICULUS NULLAM VESTIBULUM ETIAM MOLLIS</div>
                  <p class="descrttn">  Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                  <div class="usr_dttd">17 Feb 2014  <font style="float:right">Alina Josef</font></div>
              </div>
               <div class="top_usr_1">
                  <div><img src="images/ltest_history.png" width="100%" height="200" class="usr_timln" /></div>
                  <div align="center"><img src="images/fe43fc58beea89f4642b1b38e0d1a50d.jpg" class="usr_img" /></div>
                  <div class="usr_cnt_ttl">RIDICULUS NULLAM VESTIBULUM ETIAM MOLLIS</div>
                  <p class="descrttn">  Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                  <div class="usr_dttd">17 Feb 2014  <font style="float:right">Alina Josef</font></div>
              </div>
			  -->
          </div>
          
          
          
          <div class="bx2">
             <div class="contet_title"><img src="images/letst_new_icon.png" align="absmiddle" style="float:left; padding-left:5px;" />QUIZZES</div>
             <div class="view view-sixth">
		       <img src="images/56.jpg">
		       <div class="mask">
		       <h2>Story title here</h2>
		       <p>some story discription here like lorem impusam is dubbing text lorem impusam is dubbing text </p>
			   <a href="#" class="info">Read More</a>
		       </div>
	         </div>
             <div class="view view-sixth">
		       <img src="images/photodune-5506631-man-with-digital-glasses-m-587x345_c.jpg">
		       <div class="mask">
		       <h2>Story title here</h2>
		       <p>some story discription here like lorem impusam is dubbing text lorem impusam is dubbing text </p>
			   <a href="#" class="info">Read More</a>
		       </div>
	         </div>
          </div> 
     
    </div>
    
    <div class="clr"></div>
    
    <!--twitter box area start-->
    <div id="tiwter_cntnt">
        <div id="slogan">
            <div class="twitter_cmnt">
                 <font class="twittr_cmmnt1">02 Jun 2014</font><br />
                 <font class="twittr_cmmnt2"><a href="#"> RT @npdknfodsfn djfn</a>: We asked 
                 <a href="#">@collis</a>: What's the hardest thing about being CEO? <a href="#">http://t.co/tsteQF1S9X</a></font>
            </div>
            <div class="twitter_cmnt">
                 <font class="twittr_cmmnt1">10 Jun 2014</font><br />
                 <font class="twittr_cmmnt2"><a href="#"> SR @npdknfodsfn djfn</a>: We asked 
                 <a href="#">@collis</a>:vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.  <a href="#">http://t.co/tsteQF1S9X</a></font>
            </div>
            <div class="twitter_cmnt">
                 <font class="twittr_cmmnt1">25 March 2014</font><br />
                 <font class="twittr_cmmnt2"><a href="#"> SR @twitter djfn</a>: We asked 
                 <a href="#">@sarv</a>:ad, vel ea unum tritani qualisque, mel ne impedit i.  <a href="#">http://t.co/tsteQF1S9X</a></font>
            </div>
            <div class="twitter_cmnt">
                 <font class="twittr_cmmnt1">30 March 2014</font><br />
                 <font class="twittr_cmmnt2"><a href="#"> VIDEO</a>: We asked 
                 <a href="#">@saintseano</a>:explains how Envato used @newrelic Insights to monitor the reset of 4,000,000 user passwords  
                 <a href="#">http://t.co/tsteQF1S9X</a></font>
            </div>
        </div> 
    </div>
</div>
<!------------------------------------------------First Content area end------------------------------------------------------------>

<div id="footer_main">
    <div class="footer_scnd">
    
        <div id="footer_box1">
            <div class="footer_title">RECENT BLOG</div>
            <div><img src="images/footer_border.png" width="80%" /></div>
            <div class="blg_post">
               <div class="bloger_pic"><a href="#"><img src="images/38e64aa9dd65dc33505e208ca36c34f1.jpg" /></a></div>
               <div class="bloger_title">
                  <a href="#">Cum sociis natoque penatibus et </a><br />
                  <font style="color:#666; float:left"><a href="#" style="color:#FF6B0E">Author 1</a>  -- Feb 17, 2014</font>
               </div>
            </div>
            <div class="blg_post">
               <div class="bloger_pic"><a href="#"><img src="images/b2e85c26862c5df5e2944188add29c87.jpg" /></a></div>
               <div class="bloger_title">
                  <a href="#">lorem impusam is duubing tesxt for </a><br />
                  <font style="color:#666; float:left"><a href="#" style="color:#FF6B0E">Author 2</a>  -- Feb 17, 2014</font>
               </div>
            </div>
            <div class="blg_post">
               <div class="bloger_pic"><a href="#"><img src="images/fe43fc58beea89f4642b1b38e0d1a50d.jpg" /></a></div>
               <div class="bloger_title">
                  <a href="#">CNullam quis risus eget urna mollis ornare vel eu leo. </a><br />
                  <font style="color:#666; float:left"><a href="#" style="color:#FF6B0E">Author 3</a>  -- Feb 17, 2014</font>
               </div>
            </div>
            <div class="blg_post">
               <div class="bloger_pic"><a href="#"><img src="images/rahul-dravid-cover-326x159.jpg" /></a></div>
               <div class="bloger_title">
                  <a href="#">Agam tractatos mel ad, vel ea unum tritani  </a><br />
                  <font style="color:#666; float:left"><a href="#" style="color:#FF6B0E">Author 4</a>  -- Feb 17, 2014</font>
               </div>
            </div>
        </div>
        
        
        <div id="footer_box2">
            <div class="footer_title">RECENT STORY</div>
            <div><img src="images/footer_border.png" width="100%" /></div>
            <div class="recent_strty_ftr_bx">
               <div class="ftr_str_img"><img src="images/b2e85c26862c5df5e2944188add29c87.jpg" /></div>
               <div class="ftr_sotry_detl"><a href="#">Nullam quis risus eget urna mollis ornare vel eu leo.</a></div>
               <div class="ftr_stry_comnt">
                   <div class="str_comnt_dtl"><img src="images/coment_icon.png"  style="padding-right:10px;" align="absmiddle"/> 0 </div>
                    <div class="stry_viiew_dtl"><img src="images/view_icon.png"  style="padding-right:10px;" align="absmiddle"/> 193 </div>
               </div>
            </div>
            <div class="recent_strty_ftr_bx">
               <div class="ftr_str_img"><img src="images/38e64aa9dd65dc33505e208ca36c34f1.jpg" /></div>
               <div class="ftr_sotry_detl"><a href="#">Nullam quis risus eget urna mollis ornare vel eu leo.</a></div>
               <div class="ftr_stry_comnt">
                   <div class="str_comnt_dtl"><img src="images/coment_icon.png"  style="padding-right:10px;" align="absmiddle"/> 10 </div>
                    <div class="stry_viiew_dtl"><img src="images/view_icon.png"  style="padding-right:10px;" align="absmiddle"/> 203 </div>
               </div>
            </div>
            <div class="recent_strty_ftr_bx">
               <div class="ftr_str_img"><img src="images/38e64aa9dd65dc33505e208ca36c34f1.jpg" /></div>
               <div class="ftr_sotry_detl"><a href="#">Nullam quis risus eget urna mollis ornare vel eu leo.</a></div>
               <div class="ftr_stry_comnt">
                   <div class="str_comnt_dtl"><img src="images/coment_icon.png"  style="padding-right:10px;" align="absmiddle"/> 10 </div>
                    <div class="stry_viiew_dtl"><img src="images/view_icon.png"  style="padding-right:10px;" align="absmiddle"/> 203 </div>
               </div>
            </div>
        </div>
        
        
        <div id="footer_box3">
            <div class="footer_title">QuiZ tell PHOTOS STREAM</div>
            <div><img src="images/footer_border.png" width="100%" /></div>
            <div class="ftr_img_glry">
               <div>
                   <a href="#"><img src="images/fe43fc58beea89f4642b1b38e0d1a50d.jpg"/></a>
                   <a href="#"><img src="images/b2e85c26862c5df5e2944188add29c87.jpg"/></a>
                   <a href="#"><img src="images/38e64aa9dd65dc33505e208ca36c34f1.jpg"/></a>
                   <a href="#"><img src="images/fe43fc58beea89f4642b1b38e0d1a50d.jpg"/></a>
                   <a href="#"><img src="images/ltest_history.png"/></a>
                   <a href="#"><img src="images/38e64aa9dd65dc33505e208ca36c34f1.jpg"/></a>
                   <a href="#"><img src="images/fe43fc58beea89f4642b1b38e0d1a50d.jpg"/></a>
                   <a href="#"><img src="images/ltest_history.png"/></a>
               </div>
            </div>
            
            <div class="ftr_subcrb">
               <div class="footer_title">Newslatter</div>
               <input type="text"  placeholder="your email@mail.com" class="ftr_inpt" /> <input type="submit" value="Subcribe Now" class="sbcrbe_button" />
            </div>
            
        </div>
        
    </div>
</div>

<div id="footer_second">
    <div class="footer_scndd">
       <div class="copy_right_tag">
           <span style="float:left;">Copyright 2014 @ QuiZteLL  &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;  All Right Reserved by QuiZteLL.</span>
           <span style="float:left; padding-left:500px;">Website Design & Developed by <a href="#">Sarv Webs Pvt. Ltd.</a></span>
           <span style="float:right;"><a href="#top_header"><img src="images/up_arrow_icon.png"  align="top"/></a></span>
       </div>
       
    </div>
</div>

<!------------------------------------------------footer area start----------------------------------------------------------------->
<!--for homepage slider-->
<script type="text/javascript" src="js/slider/jquery-1.3.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {		
	
	//Execute the slideShow
	slideShow();

});

function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}

</script>


<!--for latest story crousal-->
 
<script type="text/javascript" src="js/slider/jquery-1.js"></script>
<script language="javascript">
	$(function() {
		var step = 2; 
		var current = 0; 
		var maximum = $('#my_carousel ul li').size(); 
		var visible = 2; 
		var speed = 200; 
		var liSize = 400;
		var carousel_height = 250;
		

		var ulSize = liSize * maximum;   
		var divSize = liSize * visible;  
		
		$('#my_carousel ul').css("width", ulSize+"px").css("left", -(current * liSize)).css("position", "absolute");

		$('#my_carousel').css("width", divSize+"px").css("height", carousel_height+"px").css("visibility", "visible").css("overflow", "hidden").css("position", "relative"); 
		
		$('.nextt').click(function() { 
			if(current + step < 0 || current + step > maximum - visible) {return; }
			else {
				current = current + step;
				$('#my_carousel ul').animate({left: -(liSize * current)}, speed, null);
			}
			return false;
		});
		
		$('.prvv').click(function() { 
			if(current - step < 0 || current - step > maximum - visible) {return; }
			else {
				current = current - step;
				$('#my_carousel ul').animate({left: -(liSize * current)}, speed, null);
			}
			return false;
		});
	});
</script> 
<!--for latest story crousal-->
                 
<!--for quiz page smooth scrlling-->
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/jquery.scrollTo-min.js'></script>
<script type='text/javascript' src='js/jquery.localscroll-min.js'></script>
<script type="text/javascript">
$(document).ready(function () {
$.localScroll();
});
</script>  
<!--for quiz page smooth scrlling-->
<!--for home page twwiter dtl show-->                  
<script type="text/javascript" src="js/jquery.cycle.js"></script> 
<!--for home page twwiter dtl show-->  

</body>
</html>