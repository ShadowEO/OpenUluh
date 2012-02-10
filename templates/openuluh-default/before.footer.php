<?php
	/*
	 * OpenUluh
	 * Copyright (c) 2012-* ShadowEO / Toxus Communications Systems <dreamcaster23@gmail.com>
	 * GPG Key ID: AC5EEA2B
	 *
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
 	 * the Free Software Foundation, either version 3 of the License, or
 	 * (at your option) any later version.
 	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 * 
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 */
?>
	   <hr class="noscreen" />
        </div> <!-- /content -->
	<hr class="noscreen"/>
        <!-- Aside -->
       <div id="aside">

            <div id="aside-top"></div>
            
                   <!-- Categories -->
		<div class="padding">
                <h4 class="nom"><a href="javascript:;" onmouseover="if(document.getElementById('mydiv').style.display == 'none'){ document.getElementById('mydiv').style.display = 'block'; }else{ document.getElementById('mydiv').style.display = 'none'; }">Navigation</a></h4>
            	</div> <!-- /padding -->
	<ul class="nav" id="mydiv">

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
            <div class="padding">
<!--		
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
		<!-- </form> -->

            </div> <!-- /padding -->
       <hr class="noscreen" />          
     </div> <!-- /aside -->
        
        <div id="aside-bottom"></div>
    
    </div> <!-- /cols -->

