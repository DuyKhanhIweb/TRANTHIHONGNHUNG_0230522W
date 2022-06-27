<?php 



	// $popup = $d->get_fetch_array("select link, photo_$lang as photo from #_photo where com='popup'");

    

 ?>

<style>

.home-popup__background {

    width: 100%;

    height: 100%;

    top: 0px;

    left: 0px;

    position: fixed;

    background-color: rgba(0, 0, 0, 0.4);

    display: flex;

    -webkit-box-align: center;

    align-items: center;

    place-content: center;

    -webkit-box-pack: center;

    z-index: 9000;

}

.home-popup__content {

    -webkit-box-flex: 0;

    flex: 0 1 auto;

    position: relative;

    width: 80%;

    max-width: 438px;

    max-height: 100%;

}

.simple-banner {

    width: 100%;

    height: 100%;

    overflow: hidden;

    position: relative;

}

.banner-image {

    display: block;

    width: 100%;

    overflow: hidden;

}

.click-sections-wrapper {

    display: flex;

    position: absolute;

    width: 100%;

    height: 100%;

    top: 0px;

    left: 0px;

}

.home-popup__close-area {

    position: absolute;

    display: block;

    top: 0px;

    right: 0px;

    width: 15%;

    height: 19%;

    cursor: pointer;

}

.popup__close-btn {

    cursor: pointer;

    user-select: none;

    line-height: 40px;

    height: 30px;

    width: 30px;

    display: flex;

    -webkit-box-align: center;

    align-items: center;

    -webkit-box-pack: center;

    justify-content: center;

    position: absolute;

    box-sizing: border-box;

    background: rgb(239, 239, 239);

    top: -10px;

    right: -10px;

    border-radius: 20px;

    border: 3px solid rgb(239, 239, 239);

}

.home-popup__close-button {

    height: 16px;

    width: 16px;

    stroke: rgba(0, 0, 0, 0.5);

    stroke-width: 2px;

}

</style>


<?php if($_SESSION['popup']<3){?>
<div class="home--popup">

 	<div class="home-popup__background">

 		<div class="home-popup__content">

 			<div class="simple-banner">

 				<img class="banner-image" src="<?=_upload_hinhanh_l.$popup['photo_'.$lang]?>" alt="popup">

 				<div class="click-sections-wrapper">

 					<a class="click-section" target="_self" href="<?=$popup['link']?>" style="flex-grow: 100;"></a>

 				</div>

 			</div>

 			<div class="home-popup__close-area">

	          <div class="popup__close-btn">

	            <svg viewBox="0 0 16 16" stroke="#EE4D2D" class="home-popup__close-button">

	              <path stroke-linecap="round" d="M1.1,1.1L15.2,15.2"></path>

	              <path stroke-linecap="round" d="M15,1L0.9,15.1"></path>

	            </svg>

	          </div>

	        </div>

 		</div>

 	</div>

</div>
<?php  $_SESSION['popup']=$_SESSION['popup']+1;}  ?>