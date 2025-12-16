<?php

function getFF ($path) {

    //CONFIGURA AQUI VIADO

  $endereco = 'https://quadriciclocuritiba.com.br/';
  $frequencia = 'monthly';
  $priority = '0.8';
  $lastmod = '2022-02-17T14:05:24+01:00';

    $files = glob("$path*");
    $folders = glob("$path*", GLOB_ONLYDIR);
	$files = array_unique($files);
    sort($files);
    foreach ($files as $file) {
     $file = str_replace($path, '', $file);
      $url = substr($path, -3) . $file;

      if(stripos($file, '.html') !== false){

        echo '&lt;url&gt;<br>
        &lt;loc&gt;'.$endereco.$url.'&lt;/loc&gt;<br>
        &lt;changefreq&gt;'.$frequencia.'&lt;/changefreq&gt;<br>
        &lt;priority&gt;'.$priority.'&lt;/priority&gt;<br>
            &lt;lastmod&gt;'.$lastmod.'&lt;/lastmod&gt;<br>
        &lt;/url&gt;<br>';
      }
    }
  
    if (count($folders)!=0) {
      foreach ($folders as $f) {
        getFF($f . DIRECTORY_SEPARATOR);
      }
    }
  }
  getFF(__DIR__ . DIRECTORY_SEPARATOR);