<?php
	/* Control de flujo para distribuir Chats equitativamente */
	session_start();
	
	if(!isset($_SESSION['mapiOlarkUser'])) :
		$mapiRandom = rand(0,2);
		$mapiOlarkGroups = array("fa877e0fce7c0ab847e20938e478df5b", "e69b6e798098b3a2ae909116555828fb", "eae526c5b13534c7a3a63c62ccfc1ea3");
		$mapiOlarkGroup = $mapiOlarkGroups[$mapiRandom];
		session_regenerate_id();
		$_SESSION['mapiOlarkUser'] = $mapiOlarkGroup;
	else :
		$mapiOlarkGroup = $_SESSION['mapiOlarkUser'];
	endif;
	$ogroup = $mapiOlarkGroup;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Machupicchu Travel Chat</title>
</head>
<frameset cols="0,*" frameborder="no" border="0" framespacing="0">
  <frame src="about:blank" name="blank" scrolling="no" noresize="noresize" id="blank" />
  <frame src="http://media.perunoticias.net/html/communication/chat.php?ogroup=<?php print $ogroup; ?>" name="chatFrame" scrolling="No" noresize="noresize" id="chatFrame" />
</frameset><noframes></noframes>
</html>
