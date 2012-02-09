	<?php 
		ini_set("display_errors","on");
	?>
	<hr class="noscreen" />
        <div id="content-right">
        </div> <!-- /content-right -->
        <hr class="noscreen" />
        </div> <!-- /content -->

        <!-- Aside -->
       <div id="aside">

            <div id="aside-top"></div>
            
            <!-- Categories -->
	<div class="padding">
		<div class="box">
                <h4 class="nom"><a href="javascript:;" onmouseover="if(document.getElementById('mydiv').style.display == 'none'){ document.getElementById('mydiv').style.display = 'block'; }else{ document.getElementById('mydiv').style.display = 'none'; }">Navigation</a></h4>
		</div>
            </div> <!-- /padding -->
            
        <ul class="nav" id="mydiv" style="display:block">
		<?php
			if($page == 'index')
			{
				?>				
				<li id="nav-active"><a href="index.php">Home</a> <!-- Active --></li>
				<?php
			} else {
				?>
				<li><a href="">Home</a></li>
				<?php
			}
			if($page == 'shows')
			{			
				?>
	        		<li id="nav-active"><a href="index.php?p=shows">Shows Listing</a></li>
				<?php
			} else {
				?>
				<li><a href="index.php?p=shows">Shows Listing</a></li>
				<?php
			}
			?>
            </ul>
                
            <!-- RSS feeds -->
            <!-- <div class="padding">

                <h4 class="margin">RSS feeds:</h4>
                
                <p class="nom">
                    <a href="#" class="rss">Articles</a><br />
                    <a href="#" class="rss">Comments</a>
                </p>
                
                <h4 class="margin">Search:</h4>

                <form action="#" method="get">
                    <div id="search" class="box">
                        <input type="text" size="20" id="search-input" /><input type="submit" id="search-submit" value="Search" />
                    </div> <!-- /search -->
               <!-- </form>

            </div> <!-- /padding -->
            
       <hr class="noscreen" />          
     </div> <!-- /aside -->
        
        <div id="aside-bottom"></div>
    
    </div> <!-- /cols -->

