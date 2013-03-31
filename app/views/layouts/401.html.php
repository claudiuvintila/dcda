<!doctype html>
<html>
<head>
    <?php echo $this->html->charset(); ?>
    <title>Unhandled exception</title>
    <?php echo $this->html->style(array('debug', 'lithium')); ?>
    <?php echo $this->scripts(); ?>
    <?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="app">
<div id="container">
    <div id="header">
        <h1>401 Access Denied</h1>
    </div>

    <div id="content">
        <?php /* echo $this->content(); */ ?>
    </div>
</div>
</body>
</html>