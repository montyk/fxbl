<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <h3>DATA:</h3>
    <p>
        <?php echo '<pre>'; print_r($data); echo '</pre>'; ?>
    </p>
    <br/>
    <hr/>
    <form action="" method="POST" >
        <textarea rows="10" cols="50" name="content">Магазин России в базу данных</textarea>
        <input type="submit" value="Submit"/>
    </form>
</body>