<div class="rightpanel">
    <ul class="breadcrumbs">
        <li><a href="index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
        <li>variable</li>
        <li class="right">
            <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
            <ul class="dropdown-menu pull-right skin-color">
                <li><a href="default">Default</a></li>
                <li><a href="navyblue">Navy Blue</a></li>
                <li><a href="palegreen">Pale Green</a></li>
                <li><a href="red">Red</a></li>
                <li><a href="green">Green</a></li>
                <li><a href="brown">Brown</a></li>
            </ul>
        </li>
    </ul>
        
    <div class="pageheader">
        <form action="results.html" method="post" class="searchbar">
            <input type="text" name="keyword" placeholder="Buscar..." />
        </form>
        <div class=""><span class="" ><img src="images/cashuba_logo.jpg" width="279" height="99"> </span></div>
        <div class="pagetitle">
        </div>
    </div><!--pageheader-->
    <div class="maincontent">
        <div class="maincontentinner">
            <!--row-->
            <?php
			 include ('/dll/motor.php');
            ?>
            <?php
                include ('comunes/footer.php');
            ?><!--footer-->      
        </div><!--maincontentinner-->
    </div><!--maincontent-->
</div>
<!-- no veo el fin del html y es escrito eso de abajo-->
</body>

</html>