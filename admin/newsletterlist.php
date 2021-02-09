<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/newsletter.php';  ?>
<?php
    // gọi class newsletter
    $newletter = new newsletter();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'newsletterlist.php' </script>";
        
    }else {
        $id = $_GET['delid'];
        $delnewsletter = $newletter -> del_newletter($id); 
    }
 ?> 

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách email đăng ký</h2>
                <div class="block">  
               
           <table class="data display datatable" id="example">
					<thead>
					<?php 
                    if(isset($delnewsletter))
										{
                        echo $delnewsletter;
                    }
                 ?>      
						<tr>
							<th>No.</th>
							<th>Email</th>
							<th>Ngày đăng ký</th>
							<th>Xử lý</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_newsletter = $newletter -> show_newsletter();
							if($show_newsletter){
								$i = 0;
								while($result = $show_newsletter -> fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['newsletter_email']; ?></td>
							<td><?php echo $result['newsletter_date']; ?></td>
							<td><a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
						</tr>
						<?php 
							}
						}
						 ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

