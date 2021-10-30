<?php
  function getDriveId($url) {
    // 判斷 $url 輸入陣列 $match
    preg_match('/(?:https?:\/\/)?(?:[\w\-]+\.)*(?:drive|docs)\.google\.com\/(?:(?:folderview|open|uc)\?(?:[\w\-\%]+=[\w\-\%]*&)*id=|(?:folder|file|document|presentation)\/d\/|spreadsheet\/ccc\?(?:[\w\-\%]+=[\w\-\%]*&)*key=)([\w\-]{28,})/i', $url , $match);
  
    // 如果陣列 $match[1] 存在,回傳陣列 $match[1] 的值,否則回傳 error
    if(isset($match[1])) {
      return $match[1];
      }else{
      return "error";
    }
  }