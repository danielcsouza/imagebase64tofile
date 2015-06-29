<?php

if ($_SERVER["REQUEST_METHOD"]== "POST")
{
    if (isset($_POST["imagem"]))
    {
		$imagem =$_POST["imagem"];
    }

	
	if ($imagem != null && $imagem !="undefined")
	{
		if ($_POST["tipoImagem"]=="exibir")
		{
			ob_start();
				header('Content-Length: ' . strlen($imagem));
				header('Content-Type: image/jpeg');
				print(base64_decode($imagem));

			ob_end_flush();
		}
		else
		{
			$data = base64_decode($imagem);
			$file = "img/" . uniqid() . '.jpg';
			$success = file_put_contents($file, $data);
			echo "Arquivo criado <a href='".$file."'>aqui</a>";
		}
	}

}	
?>


