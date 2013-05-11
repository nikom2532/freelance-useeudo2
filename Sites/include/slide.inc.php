<?
if( $_SERVER['HTTP_HOST'] == 'localhost' )
	{
		$server_name = "http://localhost/baanwebsite/customer/useeudo";
	}
	else
	{
		$server_name =  "http://www.useeudo.com";
	}


?>
			 <div id="wowslider-container1">
                                    <div class="ws_images">
                                            <a href="#">
                                                <img src="<?=$server_name?>/images/slide1.png" alt="useeudo" title="" id="wows0"/>
                                            </a>
                                            <a href="#">
                                                <img src="<?=$server_name?>/images/slide2.png" alt="useeudo" title="" id="wows1"/>
                                            </a>
                                            <a href="#">
                                                <img src="<?=$server_name?>/images/slide3.png" alt="useeudo" title="" id="wows2"/>
                                            </a>
                                            <a href="#">
                                                <img src="<?=$server_name?>/images/slide4.png" alt="useeudo" title=" " id="wows3"/>
                                            </a>
                                    </div><!--ws_images-->
                                    <div class="ws_bullets">
                                    <div>
                                            <a href="#" title="useeudo">1</a>
                                            <a href="#" title="useeudo">2</a>
                                            <a href="#" title="useeudo">3</a>
                                            <a href="#" title="useeudo">4</a>
                                    </div>
                                    </div><!--ws_bullets-->
                
                    </div><!--wowslider-container1-->
        <script type="text/javascript" src="<?=$server_name?>/slide/engine1/script.js"></script>