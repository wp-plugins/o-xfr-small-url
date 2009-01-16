<?php
/*
Plugin Name: o-x Badge
Plugin URI: http://o-x.fr
Description: Help your readers to reduce your posts links sizes. It's like TinyUrl with stats. Simply clic on Activate!
Version: 0.8.1
Author: o-x
Remake by: o-x.fr
Author URI: http://o-x.fr

Copyright 2009  o-x.fr  (email : infos@o-x.fr)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA



*/


class o_x_badge{

  function o_x_badge(){
     
	 add_filter( 'the_excerpt', array( &$this, 'o_x_badge_do' ) );
	 add_filter( 'the_content', array( &$this, 'o_x_badge_do' ) );
	 
  }


  function o_x_badge_do( $content ){
  // where is the plugin?
	$o_x_plugin_place = get_bloginfo('url').'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__));
	
	$permalink = urlencode( get_permalink() );
	 
	if ( !is_feed() ){
	 
	$badge = '<div class="o-x-badge">
	<a href="http://o-x.fr/create.php?link='.$permalink.'" target="_blank" title="o-x.fr"><img src="'.$o_x_plugin_place.'/add.gif" alt="o-x.fr" /></a>
	</div>';
	
	 }
	 
     return $content . $badge;
  }
  
}

$o_x_badge &= new o_x_badge();

?>