<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Úvod</title>


    <SCRIPT language="javascript">

        function select(id)
        {
            document.getElementById(id).style.border="4px solid brown";
        }

        function deselect(id)
        {
            document.getElementById(id).style.border = "4px solid transparent";
        }
    </SCRIPT>

</head>
<body style="background-color:wheat">
<center>
    <H1 style = "margin-bottom: 10px;" >Kto systém používa?</H1>
    <a href="verejny_search.php"><img onmouseover='select(id);' onmouseout='deselect(id);' id="search" src="obrazky/reader_icon.png" style = "margin-right: 10px;border:4px solid transparent;" title = "Vyhľadávanie" width="250" height="250"></a>
        <a href="login.php"><img onmouseover='select(id);' onmouseout='deselect(id);' id="login" src="obrazky/login_icon.png" style = "margin-left: 10px;border:4px solid transparent;" title = "Prihlásenie" width="250" height="250"></a>
</center>
</body>
</html>
