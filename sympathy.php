<?php
/*
Plugin Name: Sympathy for the Devil
Plugin URI: http://wordpress.org/#
Description: This is not just a plugin, it is practically a sacrilege. In Matt Mullenweg's original Hello Dolly plugin, I've replaced the "Hello, Dolly" lyrics with those of "Sympathy for the Devil" by the Rolling Stones ... because I sometimes prefer dark, brooding, snarling words atop my blog admin. How about you? I'm shocked, shocked I tell you, that no one has done this before. When activated you will randomly see a lyric from <cite>Sympathy for the Devil</cite> in the upper right of your admin screen on every page.
Author: Jeff Schult (a hack of Matt Mullenweg's lovely little standard plugin)
Version: 1.0
Author URI: http://www.jeffschult.com/blog/
*/

// These are the lyrics to Sympathy for the Devil
$lyrics = "Please allow me to introduce myself
I'm a man of wealth and taste
I've been around for long, long years
Stole many a man's soul and faith
And I was 'round when Jesus Christ ...
Had his moment of doubt and pain
Made damn sure that Pilate ...
Washed his hands and sealed his fate
Pleased to meet you, hope you guess my name
But what's puzzling you is the nature of my game
I stuck around St. Petersburg
When I saw it was a time for a change
Killed the Czar and his ministers
Anastasia screamed in vain
I rode a tank, held a general's rank
When the blitzkrieg raged and the bodies stank 
Pleased to meet you
Hope you guess my name, oh yeah
Ah, what's puzzling you
Is the nature of my game, oh yeah
(woo woo, woo woo)
I watched with glee while your kings and queens
Fought for ten decades for the gods they made
(woo woo, woo woo)
I shouted out, Who killed the Kennedys?
When after all, it was you and me
Just as every cop is a criminal
And all the sinners saints
As heads is tails, just call me Lucifer
Cause I'm in need of some restraint
So if you meet me, have some courtesy
Have some sympathy, and some taste
Use all your well-learned politesse
Or I'll lay your soul to waste";

// Here we split it into lines
$lyrics = explode("\n", $lyrics);
// And then randomly choose a line
$chosen = wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );

// This just echoes the chosen line, we'll position it later
function sympathy() {
	global $chosen;
	echo "<p id='devil'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'sympathy');

// We need some CSS to position the paragraph
function devil_css() {
	echo "
	<style type='text/css'>
	#devil {
		position: absolute;
		top: 2.3em;
		margin: 0;
		padding: 0;
		right: 10px;
		font-size: 16px;
		color: #d54e21;
	}
	</style>
	";
}

add_action('admin_head', 'devil_css');

?>