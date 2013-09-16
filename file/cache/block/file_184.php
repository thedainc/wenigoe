<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'block_id' => '184',
  'type_id' => '1',
  'ordering' => '12',
  'm_connection' => 'core.index-member',
  'component' => NULL,
  'location' => '12',
  'disallow_access' => 'a:2:{i:0;s:1:"3";i:1;s:1:"5";}',
  'can_move' => '0',
  'module_id' => 'user',
  'source_parsed' => '<link href="http://www.wenigoe.com/tooltip/themes/1/tooltip.css" rel="stylesheet" type="text/css" />
<link href="/theme/frontend/default/template/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/theme/frontend/default/template/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/theme/frontend/default/style/default/css/layout.css" rel="stylesheet" media="screen">
<html>
<head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load(\'visualization\', \'1.0\', {\'packages\':[\'corechart\']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn(\'string\', \'Topping\');
        data.addColumn(\'number\', \'Votes\');
        data.addRows([
          [\'Good\', 3],
          [\'Bad\', 1],
          [\'Tired\', 1],
          [\'Sleepy\', 1],
          [\'Bored\', 2]
        ]);

        // Set chart options
        var options = {\'title\':\'How I Feel Today (MENTALLY)\',
                       \'width\':400,
                       \'height\':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById(\'chart_div\'));
        chart.draw(data, options);
      }
    </script>
 <!--Load the AJAX API 2nd CHART-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load(\'visualization\', \'1.0\', {\'packages\':[\'corechart\']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn(\'string\', \'Topping\');
        data.addColumn(\'number\', \'Votes\');
        data.addRows([
          [\'Good\', 31],
          [\'Bad\', 12],
          [\'Average\', 17],
        ]);

        // Set chart options
        var options = {\'title\':\'How I Feel Today (PHYSICALLY)\',
                       \'width\':400,
                       \'height\':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById(\'chart_div2\'));
        chart.draw(data, options);
      }
    </script>
  </head>
</html>
<?php

		$wService = Phpfox::getService(\'wenigoe\');
		$birthday = $wService->getDob(Phpfox::getUserId());
                $bday = $birthday[0];
                $iDob = $bday[\'birthday\'];
                $iAge = $wService->calcAge($iDob);
                $wenigoeData = $wService->getWenigoeUserData(Phpfox::getUserId());
				$ethnicity = $wenigoeData[\'ethnicity\'];
				$blood_type = $wenigoeData[\'blood_type\'];
				$religion = $wenigoeData[\'religion\'];
				$children = $wenigoeData[\'children\'];
				$grandchildren = $wenigoeData[\'childrens_children\'];
				$armedService = $wenigoeData[\'armed_service\'];
				$time_served = $wenigoeData[\'time_served\'];
				$annuity_provider = $wenigoeData[\'annuity_provider\'];
				$insurance = $wenigoeData[\'insurance\'];
				$education = $wenigoeData[\'education\'];
				$elementary = $wenigoeData[\'elementary\'];
				$highschool = $wenigoeData[\'highschool\'];
				$college = $wenigoeData[\'college\'];
				$trade = $wenigoeData[\'trade\'];
//print_r($wenigoeData);
?>

<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                my personal portal <a href="index.php?do=/wenigoe/hoodform"><i class="icon-circle-arrow-down"></i></a>
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse">
            <div class="accordion-inner">
                <div>
                    <table id="hoodTable" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th colspan="2" >under the hood</th>
                               
                            </tr>
                        </thead>
                       <tbody>
                            <tr><td style="width: 30%;">Age:</td>
                                <td style="width: 70%"><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php echo $iAge?></td></tr>
                            <tr><td>D.O.B.:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php echo $iDob;?></td></tr>
                            <tr><td>Race:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php echo $ethnicity; ?></td></tr>
                            <tr><td>Blood Type:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php echo $blood_type; ?></td></tr>
                            <tr><td>Religion:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $rel = ($religion !== \'\') ? $rel = $religion : $rel = "Not Specified"; echo $rel; ?></td></tr>
                            <tr><td>Children:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php echo $children; ?></td></tr>
                            <tr><td>Grand Children:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php echo $grandchildren; ?></td></tr>
                            <tr><td>Insurance:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $ins = ($insurance !== \'\') ? $ins = $insurance : $ins = "Not Specified"; echo $ins; ?> </td></tr>
                            <tr><td>Annuity Provider:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $ap = ($annuity_provider !== \'\') ? $ap = $annuity_provider : $ap = "Not Specified"; echo $ap;?></td></tr>
                            <tr><td>SSN:(Last 4 Only):</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      XXXX</td></tr>
                            <tr><td>U.S. Service:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $as = ($armedService != \'\') ? $as = $armedService : $as = "No"; echo $as; ?></td></tr>
                            <tr><td>Years of Service:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $ts = ($time_served != \'\') ? $ts = $time_served : $ts = "N/A"; echo $ts; ?></td></tr>
                            <tr><td>Education:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $edu = ($education !== \'\') ? $edu = $education : $edu = "Not Specified"; echo $edu; ?></td></tr>
                            <tr><td>Elementary:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $elm = ($elementary !== \'\') ? $elm = $elementary: $elm = "Not Specified"; echo $elm; ?></td></tr>
                            <tr><td>Highschool:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $hs = ($highschool !== \'\') ? $hs = $highschool: $hs = "Not Specified"; echo $hs; ?></td></tr>
                            <tr><td>College:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $col = ($college !== \'\') ? $col = $college: $col = "Not Specified"; echo $col; ?> </td></tr>
                            <tr><td>Trade:</td><td><a href="index.php?do=/wenigoe/hoodform"><i class="icon-edit"></i></a>      <?php $tra = ($trade !== \'\') ? $tra = $trade: $tra = "Not Specified"; echo $tra; ?></td></tr>
                        </tbody>
                    </table>
                    <table id="hoodTable2" class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>behind the scenes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Mentally I am: <select class="span2">
<option>Good</option>
<option>Bad</option>
<option>Tired</option>
<option>Sleepy</option>
<option>Bored</option>
</select><body>
    <!--Div that will hold the pie chart-->
                                  <div id="chart_div"></div>
                                </body></td></tr>
                            <tr>
                              <td>Physically I am: <select class="span2">
<option>Good</option>
<option>Bad</option>
<option>Tired</option>
</select>
                                <body>
    <!--Div that will hold the pie chart-->
                                  <div id="chart_div2"></div>
                                </body>
                             </td>
                            </tr>
                            <tr><td>What are you thinking right now? <br>
                                  <input type="text" placeholder="Don\'t think just type here..."><button type="submit" class="btn" style="vertical-align: top;">Submit</button></td></tr>
                            <tr><td>Something good about you at this very moment!<br>
                                  <input type="text" placeholder="Keep it short and concise..."><button type="submit" class="btn" style="vertical-align: top;">Submit</button></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-group title">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                my personal memorial <a href="index.php?do=/wenigoe/hoodform"><i class="icon-circle-arrow-down"></i></a>
            </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner" style="padding-bottom:20px";>
                <p>This is where I go to see my loved ones who have passed away. A snapshot of images that make you who you are today.</p><br>
                <div class="inlineImages">
<h3>My Loving Family</h3>
                    <img src="http://www.wenigoe.com/theme/frontend/default/style/default/image/noimage/female_profile_100.png">
                    <img src="http://www.wenigoe.com/theme/frontend/default/style/default/image/noimage/female_profile_100.png">
                    <img src="http://www.wenigoe.com/theme/frontend/default/style/default/image/noimage/female_profile_100.png"><br>
<hr>
<hr>
<h3>My Loving Friends</h3>
                       <img src="http://www.wenigoe.com/file/pic/photo/2013/07/cf55a968d78822073b880280d5a2ad9b_1024.jpg?t=51f8d4ddee243" height="100px" width="100px">
                       <p>Michael Jackson</p>
                       <p>"The King of Pop"</p>
                 
<br>
<hr>
<hr>
<h3>My Loving Pets</h3>
                    <div style="width:100px; height:100px;">
                       <img src="http://wenigoe.com/2013/my_images/german_sheppard.jpg" width="100px" heigth="100px">
                       <p>Bullet</p>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>

<!--<?php
$request = Phpfox::getLib(\'request\');
$req1 = $request->get(\'req1\');
$username = $req1;
if(!empty($username)) {
    $user_id = Phpfox::getService(\'wenigoe\')->getUserIdByUsername($username);
    $inUrl = true;
} elseif (empty($username)) {
    $user_id = Phpfox::getUserId();
    $inUrl = false;
}
if (empty($user_id)) {
    $user = Phpfox::getService(\'user\')->getUserFields(true);
    $user_id = $user[\'user_id\'];
}
$bucketlist = Phpfox::getService(\'wenigoecoremodule\')->getBucketlist($user_id);

if (!empty($bucketlist) && !empty($user_id)) {
	
	echo \'<div class="content_bl">\';
	echo \'<ul>\';
?>


<?php if (($bucketlist[\'item1\'])) 
		echo     \'<li>\'.$bucketlist[\'item1\'].\'</li>\'; ?>
<?php if (!empty($bucketlist[\'item2\']))
		echo     \'<li>\'.$bucketlist[\'item2\'].\'</li>\'; ?>
<?php if (!empty($bucketlist[\'item3\']))
		echo     \'<li>\'.$bucketlist[\'item3\'].\'</li>\'; ?>


<?php

echo \'</ul>\';

        if (!$inUrl) {
            echo \'<div class="update_btn"><a href="index.php?do=/wenigoe">update</a></div>\';
        }
	echo \'</div>\';
	
} elseif (empty($user_id) && empty($bucketlist)) {
	echo \'<div class="block">\';
		echo \'<div class="title">Bucketlist</div>\';
		echo \'<div class="content">\';
			echo \'Build Your Bucketlist!\';
		echo \'</div>\';
	echo \'</div>\';

} elseif (!empty($user_id)) {
    echo \'<div class="block">\';
        echo \'<div class="title">Bucketlist</div>\';
            echo \'<div class="content">\';
                echo \'<a href="index.php?do=/wenigoe"><strong>Update</strong></a>\';
        echo \'</div>\';
    echo \'</div>\';
} else {

}

?>-->

<script src="/theme/frontend/default/template/js/jquery.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap.min.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-transition.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-alert.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-modal.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-dropdown.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-scrollspy.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-tab.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-tooltip.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-popover.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-button.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-collapse.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-carousel.js"></script>
    <script src="/theme/frontend/default/template/js/bootstrap-typeahead.js"></script>
    <script src="/theme/frontend/default/template/js/jquery.iphone.toggle.js"></script>
    <script src="http://www.wenigoe.com/tooltip/themes/1/tooltip.js" type="text/javascript"></script>',
); ?>