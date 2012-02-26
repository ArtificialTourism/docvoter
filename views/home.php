<?php //var_dump($events);?>
<!-- BEGIN PAGE BREADCRUMBS/TITLE -->
<div id="header">
<div class="container_4">
	<div class="grid-wrap clearfix">
	        <h1 class="grid_2">
		            <span class="org">vote</span>
			        Drivers of Change Events
		    </h1>
    		<div class="grid_2 align_right">
    				
    		</div>
    </div>
</div>
</div>
<div class="grey">
<div class="container_4">
	<div id="page-heading" class="clearfix">
	    <div class="grid-wrap">
    		<div class="grid_4">
    		       <ul id="event-gallery">
    		           <?php foreach ($events as $event){?>
    		          <li><a href="<?php echo (BASE_URL.'index.php?event='.$event->id);?>"> 
    		              <p class="drivers">
    		                  
    		                  <?php if($event->end!=0 && $event->end < time()) { ?>
    		                  <span class="social">viral/bacterial pandemic</span> <span class="technological">full scale nuclear war</span> <span class="environmental">rapid rise in life expentancy</span> <span class="economic">gulf stream shuts down</span> <span class="political">lifelong working</span>
    		                  <?php }else {?>
    		                      <span class="">Have your say!</span>
    		                  <?php }?>
    		                  </p>
    		              <p class="footer"><span class="event"><?php echo($event->name);?></span>
    		              <span class="org">by org here</span> <span class="votes">NN votes</span></p>
    		              </a>
    		          </li>
    		          <?php }?>
    		       </ul>
    		</div>
	    </div>
    </div>
</div>
</div>