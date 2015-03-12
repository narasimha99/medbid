<div class="header">
<?php 
$current_user = wp_get_current_user();
 
?>
        <table cellpadding="0" cellspacing="0" width="100%"><tr><td>
        <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#">
 	  	<img   src="<?php echo esc_url( home_url( '/app_images/no-image.png' ) ); ?>" />  		
 		</a></h1></td>
                
                <td style="clear:both; vertical-align: bottom !important; text-align: right; padding-right:8px;">
                    
          <?php
		  $redirectURL ="books/dashboard";
		 $k=1;
 		if ( $k==1)  {
	?> 
                    
        <div style='margin-bottom:5px' class="<?php  echo "UserRole"; ?>">
            <div class="<?php echo "roled";?>">
                <div id="tooltip_top">
                    <ul>
                        <li class="has-sub "><a href="#"><span>Hi, Client <?php echo ucfirst($current_user->data->display_name) ?></span></a>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ).$redirectURL; ?>"><span>Dashboard</span></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-login.php?action=logout"><span>Logout</span></a></li>
                        </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                    <br/>
     <?php }else{ ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-login.php?action=register"><u>Register</u></a> | 
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-login.php"><u>Login</u></a>
    <?php } ?>
                </td></tr></table>
  </div>

