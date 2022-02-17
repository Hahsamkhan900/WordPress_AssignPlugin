<?php

/**
 * Plugin Name: Ders Atama
   //Plugin URI: http://theleadsmatrix.com
   Version: 3.38.1 
   Description: A Wordpress Plugin For Course Selection.
   Author: Lead Matrix
   Author URI: http://theleadsmatrix.com
   License: GPLv2 or later
   Text Domain: form
 */


//register hook

///////////////// database # 1

register_activation_hook(__FILE__,"DersAtama_activate");
  
    
	function DersAtama_activate(){
		global $wpdb;
		
		///////////////// database # 1 (wp_stm_lms_user_courses)
		
		$DBP_query="CREATE TABLE wp_stm_lms_user_courses(
		user_course_id int UNSIGNED NOT NULL AUTO_INCREMENT,
		user_id int UNSIGNED NOT NULL,
		course_id int UNSIGNED DEFAULT '878',
		current_lesson_id varchar (10) DEFAULT '5391',
		progress_percent varchar (10) DEFAULT '0',
		status varchar (100) DEFAULT 'enrolled',
		lng_code varchar (100) DEFAULT 'tr_TR',
		subscription_id varchar (10) DEFAULT '0',
		enterprise_id varchar (10) DEFAULT '0',
		instructor_id varchar (10) DEFAULT '0',
		bundle_id varchar (10) DEFAULT '0',
		start_time TIMESTAMP,
		end_time varchar (10) DEFAULT '0',
		PRIMARY KEY (user_course_id)
		)";			
			
		require_once(ABSPATH ."wp-admin/includes/upgrade.php"); 
		dbDelta($DBP_query);
		
	}


///////////////// Menu

add_action('admin_menu', 'DersAtama_menu');

function DersAtama_menu(){
	add_menu_page('Kullanicilar', 'Kullanicilar',8 ,'__FILE__','DersAtama_list');
}

///////////////// form

function DersAtama_list(){
	include('DersAtama_list.php');
}














