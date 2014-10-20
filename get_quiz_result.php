<?php
include("path.php");
include($_INC_REQUIRE."config.php");
    $q_id=$_REQUEST['q_id'];
	$quid=$_REQUEST['quiz_id'];
	$qu_count=count($q_id);
	$man=0;
	foreach($q_id as $val_qu)
	{
		if(isset($_REQUEST['option'.$val_qu]))
		{
			$man+=1;
		}
		fvb ghbghhyyy
	}
	if($man>=$qu_count)
	{
		if($_REQUEST['quiz_id']!='')
		{
			
			mysql_query("update quiz set played_times =`played_times`+1 where id='$quid'")or die(mysql_error());
			
			$sarv_sql = mysql_query("select played_times from quiz where id='$quid'")or die(mysql_error());
			$fetch_sarv_sql = mysql_fetch_assoc($sarv_sql);
			
			$myquizid = $quid."-".$fetch_sarv_sql['played_times'];
			
			
			$addtime=date('Y-m-d G:i:s');
			$addtime=strtotime($addtime);
			
			
			   $user_status = 1;
			
			mysql_query("insert into quiz_answer set played_from='site',created='$addtime',quiz_id='$myquizid',user_status='$user_status'")or die(mysql_error());
			$add_id=mysql_insert_id();
			$marks=0;
			foreach($q_id as $val)
			{
				$op=$_REQUEST['option'.$val];
				foreach($op as $val_op)
				{
					$get_mark=mysql_query("SELECT option_priority  FROM `option_details` where id='$val_op' limit 1")or die(mysql_error());
					$row_mark=mysql_fetch_assoc($get_mark);
					$marks+=$row_mark['option_priority'];
					mysql_query("insert into quiz_answer_details set quiz_an_id='$myquizid',option_id='$val_op' ")or die(mysql_error());
				}
			}
			
			$res_slab=mysql_query("SELECT image,id,text FROM `quiz_slabs` where q_id='$quid' and low<='$marks' and high>='$marks' limit 1")or die(mysql_error());
			$row_slab=mysql_fetch_assoc($res_slab);
			$slab_id=$row_slab['id'];
			mysql_query("update quiz_answer set marks='$marks',slab_id='$slab_id' where id='$add_id' ")or die(mysql_error());
			
			
			   echo '<form name="quiz_result_share" id="quiz_result_share" method="post" action="quiz_result_share_fb.php" enctype="multipart/form-data">';
			   echo '<div style="border:solid 1px;">';
			   echo '<div>';
			   echo "<input type='hidden' name='answer_id' value='$add_id'>";
			   echo "<input type='hidden' name='quiz_id' value='$quid'>";
			  if($row_slab['image']!='')
			  {
				  $path = $_QUIZ."quiz_slabs/".$row_slab['image'];
				  echo "<img src='$path' height=200 width=300> <br/>";
				  
               }
			   echo '</div>';
			   echo '<div style=margin:50px;>';
 			   if($row_slab['text']!='')
			   {
					  $desc = $row_slab['text'];
					echo "<label>$desc</label>";
			   }
			   echo '<div style="clear:both;"></div>';
			   echo '<input type="submit" name="submit" value="Share On Facebook" class="btnnn"><br /><br />';
			   echo '<a href="quiz.php?quiz_id='.$quid.'"><input type="submit" name="submit" value="Play Again" class="btnnn"></a>';
			   echo '</div>';
			   
			   echo '</div>';
			   echo '</form>';
			
		}
		
	}
	else
	{
		
		echo "";
		
		
	}
?>