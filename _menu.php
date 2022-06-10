<?php
              
              if($_SESSION['userdata']['user_type'] == 'admin'){
                include('_menu-admin.php');
              }else  if($_SESSION['userdata']['user_type'] == 'patient'){
                include('_menu-patient.php');
              }else  if($_SESSION['userdata']['user_type'] == 'physician'){
                include('_menu-physician.php');
              }
            
              ?>