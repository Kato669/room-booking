<script type="text/javascript">

	document.addEventListener("DOMContentLoaded", function(){

		document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

			element.addEventListener('click', function (e) {

				let nextEl = element.nextElementSibling;
				let parentEl  = element.parentElement;	

				if(nextEl) {
					e.preventDefault();	
					let mycollapse = new bootstrap.Collapse(nextEl);

			  		if(nextEl.classList.contains('show')){
			  			mycollapse.hide();
			  		} else {
			  			mycollapse.show();
			  			// find other submenus with class=show
			  			var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
			  			// if it exists, then close all of them
						if(opened_submenu){
							new bootstrap.Collapse(opened_submenu);
						}

			  		}
		  		}

			});
		})

	}); 
	// DOMContentLoaded  end
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 leftbar">
            <!-- ============= COMPONENT ============== -->
            <nav class="sidebar card py-2 mb-4">
                <ul class="nav flex-column" id="nav_accordion">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php"> dashboard <i class="bi bi-house"></i> </a>
                    </li>
                    <li class="nav-item has-submenu">
                        <a class="nav-link" href=""> rooms <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link" href="<?php echo SITEURL; ?>create_room.php">create room </a></li>
                            <li><a class="nav-link" href="<?php echo SITEURL; ?>manage_room.php">manage room </a></li>
                            <!-- <li><a class="nav-link" href="#">Submenu item 3 </a> </li> -->
                        </ul>
                    </li>
                    <li class="nav-item has-submenu">
                        <a class="nav-link" href="#"> facilities <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link" href="">add facility </a></li>
                            <li><a class="nav-link" href="">manage facility </a></li>
                            <!-- <li><a class="nav-link" href="./add_combination.php">Add subject combination </a></li>
                            <li><a class="nav-link" href="./manage_combination.php">Manage subject combination</a></li> -->
                        </ul>
                    </li>

<!--                     
                    <li class="nav-item has-submenu">
                        <a class="nav-link" href="#"> results <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link" href="./create_mid.php">create mid-term results </a></li>
                            <li><a class="nav-link" href="./create_result.php">create final-term results </a></li>
                        </ul>
                    </li> -->

                    <!-- <li class="nav-item has-submenu">
                        <a class="nav-link" href="#"> Admission Center <i class="bi small bi-caret-down-fill"></i> </a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link" href="./form.php">student Info </a></li>
                            <li><a class="nav-link" href="./organize_admission.php">Manage info </a></li>
                        </ul>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href=""> booking </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./manage_admin.php"> Add Admin </a>
                    </li> -->
                </ul>
            </nav>
<!-- ============= COMPONENT END// ============== -->	
        </div>