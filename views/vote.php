<?php //var_dump($event); ?>
<div class="container_4">
	<div id="page-heading">
	    <div class="grid-wrap">
            <div class="grid_4">
            <?php if (isset($event->summary)&&$event->summary!=''){?>
                <h2><?php echo($event->summary);?></h2>
                <?php }?>
                <?php if (isset($event->description)&&$event->description!=''){?>
                <p><?php echo($event->description);?></p>
                <?php }?>
            </div>
         </div>
    </div>
    <div class="grid-wrap clearfix">
    		<div class="grid_2">
    		       <ul id="category-nav">
    		          <?php if ($event->id!=64) { ?>
                           <li><a id="top50" class="active" href=""><?php if (count($top50) < 50) { echo('view all'); } else { echo('top '.count($top50)); } ?></a></li>
                       <?php } ?><?php $cols = array('b0126f','339999','ff5e10','0c8b32','b0126f','062b60','a17317','53b9be','adadad','f83f5f');
    		          $count=0;
    		           foreach($collection['categories'] as $cat_id=>$category){
    		               $clean_cat = dirify($category);
                           if ($collection['name']=='steep' ){
                               $steepclass = $category."-to";
                               $style ='';
                     	    } else{
                     	       $steepclass = $clean_cat;
                     	       $style = 'style="color:#'.$cols[$count].'; border-color:#'.$cols[$count].';"';
                     	    }
                           echo "<li><a href='#' id='$clean_cat' class='tab $steepclass' $style>$category</a></li>";
                           $count++;
                       } unset($count); unset($style); ?>
    		       </ul>
    		</div>
            <div class="grid_2">
                <div class="counters">
                    <!-- <a href="index.php?do=card&event=<?php echo $event->id?>" class="button blue large">+ add driver</a> -->
            <div class="counter">section votes <span id="section_votes" class="curr_count black">0</span><span class='muted'>/</span>3</div><div class="counter">total votes <span id="total_votes" class="curr_count black">0</span><span class='muted'>/</span>12</span></div>

                </div>
            </div>
	    </div>
</div>
<div class="container_4">
	    <div class="grid-wrap clearfix">
    		<div class="grid_4">
    		    <div class="panel">
    		       <?php if (count($event_cards)){?>
    		       <ul id="vote-cloud">
                      <?php
                      $date_order_cards = array_reverse($event_cards);
                      $style ='';
                      $count=0;
                        foreach ( $collection['categories'] as $cat_id=>$category){
                            if ($collection['name']!='steep' ){
                                $style = 'style="color:#'.$cols[$count].';"';
                            }
                            foreach ($date_order_cards as $card) {
                                $top = in_array($card->id,$top50)?"top50":"";
                                $hide = in_array($card->id,$top50)?"":"style='display:none;'";
                            	$card_cat_id = (int)$card->category_tag_id;
                            	if ($card_cat_id == $cat_id){
                            	    $clean_cat = dirify($category);
                            	    echo("<li class='$top $clean_cat' $hide><a href='' class='card' id='$card->id' alt='$card->name' $style>$card->name</a></li>");
                            	}
                            }
                         $count++;
                        } unset($count); unset($style);?>
    		       </ul>
    		       <?php } else { echo('<h3 class="content no-cap push-down">This event has no drivers yet. <a href="index.php?do=card&event='.$event->id.'">+ add your driver here</a>.</h3>');}?>
    		     </div>
                <div class="instructions">
                 <?php if($data['event']->id==61){echo("Cliquez sur les onglets ci-dessus pour voir plus de moteurs dans chaque cat&eacute;gorie.");}
                 else{echo('<p>Please note that you don’t need to be registered to participate in this survey or to place votes for all available categories. </p>
<p>There are 4 categories to choose from, please click on the links above to vote on the drivers under each of a category. </p>
<p>You can choose up to <b>three</b> drivers in each category, with up to <b>12 votes</b> in total. Once you have selected drivers for those categories that are relevant to you click on <b>‘results’</b>.</p>');}?>
                 </div>
    		</div>
	    </div>
</div>
<br /><br />
<!-- Load the poshytip script -->
<script src="assets/js/poshytip-1.1/src/jquery.poshytip.min.js" type="text/javascript"></script>
<!--	Load the poshytip stylesheet. -->
<link rel="stylesheet" href="assets/js/poshytip-1.1/src/tip-twitter/tip-twitter.css" type="text/css" media="screen" />
<?php foreach($collection['categories'] as $cat_id=>$category){
      $clean_cats[$cat_id] = dirify($category);}?>
<script type="text/javascript">
$(document).ready(function() {
	var event_id=<?php echo $event->id;?>;
	var owner=<?php echo $_SESSION['user']->id;?>;
    var currsection;
    var sections = ['<?php echo implode("','",$clean_cats); ?>'];
    var sectionvotes = [];

    for (var i = 0; i < sections.length; i++) {
        sectionvotes[sections[i]]=0;
    }

    var totalvotes=0;

    var result_link = $("#results").attr("href");
    $("#results").attr("href", "#");
    $("#results").addClass('disabled');

	//navigation
	$('#category-nav li a').poshytip({
        content: 'click tab to see more drivers',
        className: 'tip-twitter',
        alignTo: 'target',
    	alignX: 'center',
    	alignY: 'bottom',
    	timeOnScreen:3000,
    	allowTipHover: false,
    	offsetY: 8,
        slide: false
    });
    $('#top50').poshytip('disable');
	$('#category-nav li a').click(function(){
        if(!$(this).hasClass('active')) {
            $('#category-nav li a').removeClass('active');
            $('#category-nav li a').poshytip('enable');
            $(this).addClass('active');
            $(this).poshytip('disable');
            $('#vote-cloud li').hide();
            currsection = $(this).attr('id');
            $("#section_votes").text(sectionvotes[currsection]);
            $('#vote-cloud li.'+currsection).show();
            $(".card").poshytip('hide');
        }
    });
    //tooltip
    $('.card').poshytip({
        content: 'click title to vote',
        className: 'tip-twitter',
        alignTo: 'target',
    	alignX: 'center',
    	alignY: 'bottom',
    	allowTipHover: false,
    	offsetY: 8,
        slide: false
    });
    $(".card").click(function(){
        //voting stuff
        var currcard = $(this);
        if(!currcard.hasClass('voted')&&sectionvotes[currsection]<3&&totalvotes<12) {
        	//vote
        	var query_url = "includes/callAPI.php?action=vote/post&event_id="+event_id+"&owner="+owner+"&card_id="+$(this).attr('id');
            currcard.poshytip('update', 'sending...');
            $.ajax({
	            url: query_url,
	            success: function(data){/*... it worked*/
                    sectionvotes[currsection]= sectionvotes[currsection]+1;
                    $("#section_votes").text(sectionvotes[currsection]);
                    totalvotes = totalvotes +1;
                    if (totalvotes==1){
                        $("#results").attr("href", result_link);
                        $("#results").removeClass('disabled');
                    }
                    $("#total_votes").text(totalvotes);
                    if (sectionvotes[currsection]==3){
                        $("."+currsection+" .card").poshytip('update', 'section complete');
                        $("."+currsection+" .card.voted").poshytip('update', 'click title to cancel');
                    }
	                currcard.addClass('voted');
	                currcard.poshytip('update', 'click title to cancel');
	            },
	            error: function(data){/*... it didn't: reverse tip*/
	                currcard.poshytip('update', 'click to vote');
	                currcard.poshytip('update', 'there was an error sending vote, please try again later',true);
	            }
	        });
        } else if(currcard.hasClass('voted')){
            //unvote
            var query_url = "includes/callAPI.php?action=vote/delete&event_id="+event_id+"&owner="+owner+"&card_id="+$(this).attr('id');
            currcard.poshytip('update', 'removing...');
        	$.ajax({
                url: query_url,
                success: function(data){/*... it worked*/
                       sectionvotes[currsection]=sectionvotes[currsection]-1;
                       $("#section_votes").text(sectionvotes[currsection]);
                       totalvotes = totalvotes -1;
                       $("#total_votes").text(totalvotes);
                       $("."+currsection+" .card").poshytip('update', 'click to vote');
                       $("."+currsection+" .card.voted").poshytip('update', 'click title to cancel');
                       currcard.removeClass('voted');
                       currcard.poshytip('update', 'click to vote');
                    },
                error: function(data){/*... it didn't*/
                    currcard.poshytip('update', 'click to cancel');
                       currcard.poshytip('update', 'there was an error removing vote, please try again later',true);
                }
            });
        }
    });
    if (event_id==64){
        var btn=$('#category-nav li #schools');
        btn.addClass('active');
        btn.poshytip('disable');
        $('#vote-cloud li').hide();
        currsection = 'schools';
        $('#vote-cloud li.'+'schools').show();
    }
});
</script>