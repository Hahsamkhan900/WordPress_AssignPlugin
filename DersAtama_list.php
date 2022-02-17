<?php

error_reporting(0);
    $server = 'localhost';	
    $user = 'root';	             //Enter your database username
    $pass = '';	                 //Enter your database user password
    $db = 'i7456386_wp44';	     //Enter your database name

    $connect = mysqli_connect($server,$user,$pass,$db);
		
    // sirket_ulke 
    $query = "SELECT DISTINCT meta_value FROM `wp_usermeta` WHERE meta_key = 'sirket_ulke'";
	$result = mysqli_query($connect, $query);
    
     // bolge 
    $query1 = "SELECT DISTINCT meta_value FROM `wp_usermeta` WHERE meta_key = 'bolge'";
	$resultt = mysqli_query($connect, $query1);

    // departman 
    $query2 = "SELECT DISTINCT meta_value FROM `wp_usermeta` WHERE meta_key = 'departman'";
	$resulttt = mysqli_query($connect, $query2);
 
    // pozisyon 
    $query3 = "SELECT DISTINCT meta_value FROM `wp_usermeta` WHERE meta_key = 'pozisyon'";
	$resultttt = mysqli_query($connect, $query3);

    // unvan 
    $query4 = "SELECT DISTINCT meta_value FROM `wp_usermeta` WHERE meta_key = 'unvan'";
	$resulttttt = mysqli_query($connect, $query4);

    // post 
	$queryy = "SELECT post_title FROM `wp_posts` WHERE post_type = 'stm-courses'";  
	$result1 = mysqli_query($connect, $queryy);

	

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Kullanicilar </title>
	
	<style>
	<?php include 'dist/css/bootstrap.min.css'; ?>
	</style>
</head>

<body>
	
<!-----------------------------	Left and Right side bar ----------------------------->
	
<div class="container" >
  <div class="row">

	  
	 <!-------------------------  right side bar start ------------------------->
	  
    <div class="col-sm-12 four">
		
	  <h2 class="three">
		 Kullanicilar
	  </h2>
		
   <!--	search-->
	<div>
	  <div class="five">

		  <input type="text" class="six required11" name="keyword" autocomplete="off">
		  <button class="btn btn-primary btn-sm MyCustom">Search</button>

		  
		  <script>
				<?php include 'dist/js/jquery.js'; ?>		
			</script>
		 
			<script>
				 $(document).on('change keyup', '.required11', function(e){
			   let Disabled = true;
				$(".required11").each(function() {
				  let value = this.value
				  if ((value)&&(value.trim() !=''))
					  {
						Disabled = false
					  }else{
						Disabled = true
						return false
					  }
				});

			   if(Disabled){
					$('.toggle-disabled11').prop("disabled", true);
				  }else{
					$('.toggle-disabled11').prop("disabled", false);
				  }
			 })

			</script>
		  
	  </div>
	</div><br><br>
		
    <!------------------------- 5 Course Name ------------------------->
	  <div>
		  
		  
	 	<form method="post" autocomplete="off">

			<!------------------------- Sirket ------------------------->
			
		  <label>Sirket ulke:</label>
		  <select name="sirket_ulke" class="required">
			  <option selected disabled>Select</option>
			  <?php 
			    if(mysqli_num_rows($result) > 0)
				{
					foreach($result as $row)
					{
					?>
			           <option value="<?=$row['meta_value']; ?>"><?=$row['meta_value']; ?></option>
			        <?php	
					}
				}
			    else{
					?>
			          <option value="">No Record</option>
			        <?php
				}
			  ?>
		  </select>
			
			<!------------------------- Bolge ------------------------->
			
			<label>Bolge:</label>
		  <select name="bolge" class="required">
			  <option selected disabled>Select</option>
			  <?php 
			    if(mysqli_num_rows($resultt) > 0)
				{
					foreach($resultt as $row)
					{
					?>
			           <option value="<?=$row['meta_value']; ?>"><?=$row['meta_value']; ?></option>
			        <?php	
					}
				}
			    else{
					?>
			          <option value="">No Record</option>
			        <?php
				}
			  ?>
		  </select>
			
			<!------------------------- Departman------------------------->
			
			<label>Departman:</label>
		  <select name="departman" class="required">
			  <option selected disabled>Select</option>
			  <?php 
			    if(mysqli_num_rows($resulttt) > 0)
				{
					foreach($resulttt as $row)
					{
					?>
			           <option value="<?=$row['meta_value']; ?>"><?=$row['meta_value']; ?></option>
			        <?php	
					}
				}
			    else{
					?>
			          <option value="">No Record</option>
			        <?php
				}
			  ?>
		  </select>
			
			<!------------------------- Pozisyon ------------------------->
			
			<label>Pozisyon:</label>
		  <select name="pozisyon" class="required">
			   <option selected disabled>Select</option>
			  <?php 
			    if(mysqli_num_rows($resultttt) > 0)
				{
					foreach($resultttt as $row)
					{
					?>
			           <option value="<?=$row['meta_value']; ?>"><?=$row['meta_value']; ?></option>
			        <?php	
					}
				}
			    else{
					?>
			          <option value="">No Record</option>
			        <?php
				}
			  ?>
		  </select>
			
			<!------------------------- Unvan ------------------------->
			
			<label>Unvan:</label>
		  <select name="unvan" class="required">
			   <option selected disabled>Select</option>
			  <?php 
			    if(mysqli_num_rows($resulttttt) > 0)
				{
					foreach($resulttttt as $row)
					{
					?>
			           <option name="unvan" value="<?=$row['meta_value']; ?>"><?=$row['meta_value']; ?></option>
			        <?php	
					}
				}
			    else{
					?>
			          <option value="">No Record</option>
			        <?php
				}
			  ?>
		  </select>
         	
		  <button type="submit" disabled class="btn btn-primary btn-sm toggle-disabled" name="filter">Filter</button>
			
			<script>
				<?php include 'dist/js/jquery.js'; ?>		
			</script>
		 
			<script>
				 $(document).on('change keyup', '.required', function(e){
			   let Disabled = true;
				$(".required").each(function() {
				  let value = this.value
				  if ((value)&&(value.trim() !=''))
					  {
						Disabled = false
					  }else{
						Disabled = true
						return false
					  }
				});

			   if(Disabled){
					$('.toggle-disabled').prop("disabled", true);
				  }else{
					$('.toggle-disabled').prop("disabled", false);
				  }
			 })

			</script>
			 
			</form>
			
		
	  </div>
		
      <!------------------------- table ------------------------->
	<div class="ten">	
	
	<!------------------------- Filter Form------------------------->
	
	<form method="post" id="myform">
		<pre id="view-rows"><pre>
	  <table id="MyTable" class="table table-hover">   
	   <thead>
		<tr class="tab1">
		  <th scope="col"><input type="checkbox" checked></th>
		  <th scope="col">Kullanici adi</th>
		  <th scope="col">ISIM</th>
		  <th scope="col">E-Posta</th>
		</tr>
	  </thead>
	  <tbody class="tab2" scope="row">
		  
	    <!------------------------- Filter ------------------------->
		
			<?php

		if(isset($_POST['filter']))
		 {

			$n = $_POST['sirket_ulke'];
			$n1 = $_POST['bolge'];
			$n2 = $_POST['departman'];
			$n3 = $_POST['pozisyon'];
			$n4 = $_POST['unvan'];
			
			$queryyjoin = "select DISTINCT ID,user_login,display_name,user_email from wp_users inner join wp_usermeta on wp_users.ID = wp_usermeta.user_id where meta_value='".$n."' or meta_value='".$n1."' or meta_value='".$n2."' or meta_value='".$n3."' or meta_value='".$n4."'";
				$result1join = mysqli_query($connect, $queryyjoin);
		
 
//			$Number = 1;
			if(mysqli_num_rows($result1join) > 0)
				{
					foreach($result1join as $row)
					{
						
					?>
					
				   	<input class="SetID<?php echo $row['ID']; ?>" type="text" name="newid<?php echo $row['ID']; ?>" style="display:none;" value="" >
		       <tr style="box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg) !important;">
               <th scope="row"><input type="checkbox" class="SelectBox" name="chkk[]" GEt-ID="<?php echo $row['ID']; ?>" ></th>
				   
					<td><p><?php echo $row['user_login']; ?></p></td>
					<td><p><?php echo $row['display_name']; ?></p></td>
					<td><p><?php echo $row['user_email']; ?></p></td>
			   </tr>
		            
					<td style="display: none;"><input class="inputt1" type="text" value="<?php echo $row['user_login']; ?>" ></td>
					<td style="display: none;"><input class="inputt1" type="text" value="<?php echo $row['display_name']; ?>"></td>
					<td style="display: none;"><input class="inputt1" type="text" value="<?php echo $row['user_email']; ?>"></td>
			        <?php	
//						$Number = $Number + 1;
					}
				}
	    ?>
			
		<?php		
		}
		?>
		  
	  </tbody>
	</table>
	
  </div>
	  	  
		  <script>
			  
			  $('.SelectBox').click(function() {
				
				var GetID = $(this).attr('GEt-ID');
				$('.SetID' + GetID).text(GetID);
				$('.SetID' + GetID).attr('value',GetID);
				  
				  
				  
			});

		  </script>
		
	  <!------------------------- Course ------------------------->
		
	  <div>
	 	
		  <label>Ders:</label>
		  <select id="myselect" name="course_id" disabled class="requiredd">
			  <option selected disabled value="">Select</option>
			  <?php 
			    if(mysqli_num_rows($result1) > 0)
				{
					foreach($result1 as $row)
					{
					?>
			           <option value="<?=$row['post_title']; ?>"><?=$row['post_title']; ?></option>
			        <?php	
					}
				}
			    else{
					?>
			          <option value="">No Record</option>
			        <?php
				}
			  ?>
			  
		  </select>
	  
	  </div>
		
		<script>
			<?php include 'dist/js/jquery.js'; ?>		
		</script>
		
		
		
       <!------------------------- Assign  ------------------------->
		
		<script>
				<?php include 'dist/js/jquery.js'; ?>		
		</script>
		 
			<script>
				 $(document).on('change keyup', '.requiredd', function(e){
			   let Disabled = true;
				$(".requiredd").each(function() {
				  let value = this.value
				  if ((value)&&(value.trim() !=''))
					  {
						Disabled = false
					  }else{
						Disabled = true
						return false
					  }
				});

			   if(Disabled){
					$('.toggle-disabledd').prop("disabled", true);
				  }else{
					$('.toggle-disabledd').prop("disabled", false);
				  }
			 })

			</script>
	  
	  <div class="nine">
		  
          <!-- user id start -->
 
		  <!-- user id end -->
		  
			<button type="submit" class="btn btn-primary btn-sm toggle-disabledd" name="assign" id="aign" disabled>Assign</button>
		</form>
	  </div> 
		
 	<?php
		
		if(isset($_POST['assign']))
		{  
			$codes = $_POST['chkk'];
			
		    for($Number = 1; $Number < 50; $Number++) 
			{
					$ABC = $_POST['newid'.$Number.''];
					if($ABC != '')
					{
						$resultin=mysqli_query($connect,"insert into `wp_stm_lms_user_courses`(`user_id`) values ('$ABC')");
					}
					
									
			}
			
			if($resultin==1)  
				   {  
					  echo '<script type="text/javascript">'
							. '$( document ).ready(function() {'
							. '$("#myModal").modal("show");'
							. '});'
							. '</script>';
				   }  
				else  
				   {  
					  echo '<script type="text/javascript">'
							. '$( document ).ready(function() {'
							. '$("#myModali").modal("show");'
							. '});'
							. '</script>'; 
				   }
			
		}
		
	 ?>
		
<!--		modal up-->
		
		<script>
				<?php include 'dist/js/jquery.js'; ?>		
		</script>
		
   <!-------------------------  modal popup ------------------------->
		
    <!-- inserted -->
		
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Kullanicilar</h3>
						</div>
						<div class="modal-body">
						<h4>Inserted Successfully</h4>
						</div>
						<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				</div>
			</div>

		</div>
	</div>
		
   <!-- Failed-->
		
	<div id="myModali" class="modal fade" role="dialog">
		<div class="modal-dialog">

		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Kullanicilar</h3>
						</div>
						<div class="modal-body">
						<h4>Inserted Failed</h4>
						</div>
						<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				</div>
			</div>

		</div>
	</div>
	  
	
	<!-------------------------  right side bar end ------------------------->

	</div>
  </div>
</div>
	
<style>
	
	.radio1{
		display:none;
	}
	dis
	
.inputt1{
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg) !important;
    border: none !important;
	}
	
.btn-primary {
    padding: 5px 30px 5px 30px !important;
}

.three{
	font-size: 23px;
    font-weight: 400;
    margin: 10px 20px 0 2px;
    padding: 9px 0 4px 0;
    line-height: 1.3;
}

.four{
  margin-left: -1.5rem;
}


.subsubsub{
	display: flex;
    list-style: none;
    margin: 8px 0 0;
    padding: 0;
    font-size: 13px;
    float: left;
    color: #646970;
}

.five{
	float: right;
}

.six{
	padding: 0 8px;
	width: 11rem;
}

.seve{
	padding: 2px 8px;
}

select {
	height: 5vh;
    word-wrap: normal;
    width: 8rem;
    font-size: 14px !important;
    line-height: 2 !important;
    color: #2c3338;
    border-color: #8c8f94;
    box-shadow: none;
    border-radius: 3px;
    padding: 0 24px 0 8px;
}

label {
    padding: 0.1em;
}

.filt{
	width: 5.9rem;
    font-size: 17px;
	padding: 0 8px;
}

.les{
	width: 20rem;
}

.eig{
	float: right;
	font-size: 12px;
}

.nine{
	padding: 2% 0px 0px 0px;
}

.ten{
	padding: 2% 0px 2% 0px;
}

.tab1{
	border: 1px solid grey;
	display: table-row !important;
}

.tab2{
	border-right: 1px solid grey;
    border-left: 1px solid grey;
}

.tab3{
	border: 1px solid grey;
}

</style>
	
	<script>
	<?php include 'dist/js/bootstrap.bundle.min.js'; ?>
	<?php include 'dist/js/jquery.js'; ?>		
	</script>
	<script>
		$(".MyCustom").click(function() {
			var value = $('.six').val().toLowerCase();
			$("#MyTable tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
  		});
		
	
			
	  $('.SelectBox').click(function () {
		if($(this).is(':checked'))
		   {
		   		$('#myselect').removeAttr('disabled');
		   }
	  else
		  {
			  	$('#myselect').attr('disabled', '');
		  }
		  
	  });

	</script>
</body>
</html>