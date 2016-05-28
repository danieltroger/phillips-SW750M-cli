<?php
define("ip","192.168.178.30");
function getvalue($key)
{
  $jr = simplexml_load_string(file_get_contents("http://" . ip ."/fsapi/GET/{$key}?pin=1234"));
  if($jr->status != "FS_OK") die(print_r($jr,1));
  return $jr->value->u8;
}
function setvalue($key,$value)
{
  $jr = simplexml_load_string(file_get_contents("http://" . ip ."/fsapi/SET/{$key}?pin=1234&value={$value}"));
  if($jr->status != "FS_OK") return false;
  return true;
}
function getvol()
{
  $vol = (int) getvalue("netRemote.sys.audio.volume");
  return $vol;
}
