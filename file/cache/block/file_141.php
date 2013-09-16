<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'block_id' => '141',
  'type_id' => '1',
  'ordering' => '18',
  'm_connection' => 'core.index-member',
  'component' => NULL,
  'location' => '3',
  'disallow_access' => 'a:1:{i:0;s:1:"5";}',
  'can_move' => '0',
  'module_id' => 'wenigoecoremodule',
  'source_parsed' => '<div class="block">
    <div class="title">my bucketlist</div>
    <div class="content">
        <?php
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
            	/*echo \'<div class="block">\';*/
            	echo \'<div class="content_bl">\';
            	echo \'<ul>\';
        ?>

        <table class="table table-condensed">
            <tbody>
                <tr style="background-color:#fff87f;">
                    <td>1</td>
                    <td style="color:gray; font-weight:bold; font-size:14px;">
                        <span class="tooltip" onmouseover="tooltip.pop(this, \'<h3>January (Yellow item)</h3>This is where you add a      youthful item or any item of a rebirth or cleansing nature.\')">Popup</span>
                        <?php if (($bucketlist[\'item1\'])) 
                          echo     \'<li>\'.$bucketlist[\'item1\'].\'</li>\'; ?>
                    </td>
                </tr>
                <tr style="background-color:#baa591;">
                  <td>2</td>
                    <td style="color:white; font-weight:bold; font-size:14px;">
                     <span class="tooltip" onmouseover="tooltip.pop(this, \'<h3>February (Brown item)</h3>This is where you add an earthy item (camping, climbing, touring).\')">Popup</span>
                        <?php if (!empty($bucketlist[\'item2\']))
                          echo     \'<li>\'.$bucketlist[\'item2\'].\'</li>\'; ?>
                    </td>
                </tr>
                <tr style="background-color:#8cbd97;">
                    <td>3</td>
                    <td style="color:white; font-weight:bold; font-size:14px;">
                        <span class="tooltip" onmouseover="tooltip.pop(this, \'<h3>March (Green item)</h3>This is where you add a health item. This is pre-spring, green is the color of positive growth.\')">Popup</span>
                            <?php if (!empty($bucketlist[\'item3\']))
                             echo     \'<li>\'.$bucketlist[\'item3\'].\'</li>\'; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
echo \'</ul>\';

        if (!$inUrl) {
            echo \'<div class="update_btn"><a href="index.php?do=/wenigoe">update</a></div>\';
        }
	echo \'</div>\';
	/*echo \'</div>\';*/
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
?>

<!--START PHP CODE -->
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
	echo \'<div class="block">\';
	echo \'<div class="content">\';
	echo \'<ul>\';

?>

<table class="table table-condensed">
    <tbody>
        <tr style="background-color:#fff87f;">
            <td>1</td>
            <td>
                <?php
    	           if (($bucketlist[\'item1\'])) 
    		          echo     \'<li>\'.$bucketlist[\'item1\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>2</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item2\']))
                		echo     \'<li>->\'.$bucketlist[\'item2\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>3</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item3\']))
                		echo     \'<li>->\'.$bucketlist[\'item3\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>4</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item4\']))
                		echo     \'<li>->\'.$bucketlist[\'item4\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>5</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item5\']))
                		echo     \'<li>->\'.$bucketlist[\'item5\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>6</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item6\']))
                		echo     \'<li>->\'.$bucketlist[\'item6\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>7</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item7\']))
                		echo     \'<li>->\'.$bucketlist[\'item7\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>8</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item8\']))
                		echo     \'<li>->\'.$bucketlist[\'item8\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>9</td>
            <td>
                <?php
                	if (!empty($bucketlist[\'item9\']))
                		echo     \'<li>->\'.$bucketlist[\'item9\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>10</td>
            <td>
                <?php
                    if (!empty($bucketlist[\'item10\']))
                    		echo     \'<li>->\'.$bucketlist[\'item10\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>11</td>
            <td>
                <?php
                    if (!empty($bucketlist[\'item11\']))
                    		echo     \'<li>->\'.$bucketlist[\'item11\'].\'</li>\'; ?>
            </td>
        </tr>
        <tr style="background-color:#fff87f;">
            <td>12</td>
            <td>
                <?php
                    if (!empty($bucketlist[\'item12\']))
                    		echo     \'<li>->\'.$bucketlist[\'item12\'].\'</li>\'; ?>
            </td>
        </tr>
    </tbody>
</table>-->

<!--<?php
	echo \'</ul>\';
        if (!$inUrl) {
            echo \'<a href="index.php?do=/wenigoe"><strong>Update</strong></a>\';
        }
	echo \'</div>\';
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

<!--END PHP CODE -->',
); ?>