<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Application &gt; <?php echo $this->title(); ?></title>
	<?php echo $this->html->style(array('debug', 'lithium')); ?>
	<?php echo $this->scripts(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
    <style type="text/css">
        #menu {
            float:left;
            width: 200px;
        }
        #menu ul {
            list-style-type: none;
        }
        #menu ul li {
            border: 1px solid #eeeeee;
            margin: 5px;
        }
        #right_content {
            float: right;
            width: 800px;
        }
    </style>
</head>
<body class="app">
	<div id="container">
		<div id="header">
            <h1><?php if(isset($title)) { echo $title;} ?></h1></br>
		</div>
		<div id="content">
            <div id="menu">
                <ul>
                    <li><a href="/users">Users</a></li>
                    <li><a href="/posts">Posts</a></li>
                    <li><a href="/servers">Servers</a></li>
                </ul>
            </div>
            <div id="right_content">
			    <?php echo $this->content(); ?>
            </div>
		</div>
	</div>
</body>
</html>