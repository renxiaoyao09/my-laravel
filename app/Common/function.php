<?php


// 写完执行命令：composer dump-auto
// function_exists检测函数是否存在
  if (!function_exists('love')) {
    function love()
    {
      echo 'wow';
    }
  }
  
  