<?php
// https://firebase.google.com/docs/cloud-messaging/http-server-ref
foreach ($_POST as $key => $value) {
  $$key = trim($value);
}

function fcm_push($postfild)
{
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($postfild, JSON_UNESCAPED_UNICODE),
    CURLOPT_HTTPHEADER => array(
      "authorization: key=AAAAhqhcGro:APA91bEzUtOm4cSMINdvrjXMcfF3QFvhfxWQdkhA5g1bH8IhkGmBQe1SRTIIsGHTBilfe-iciLin091-ljCgRmDW6sxxcFw4jEbBWCIKk4ns77UdHCoid0Av1NozY2VMQ9ijgln7DuUO",
      "content-type: application/json"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    return "推播失敗\ncURL Error #:" . $err;
  } else {
    return $response;
  }
}


if ($_POST) {
  $notification = [
    // 單人 "token" OR "/topics/all" OR "/topics/ios" OR "/topics/android" OR "/topics/web" OR "/topics/{CustomTopic}"
    "to" => "$to",
    // 多人token
    // "registration_ids" => [
    //   "$to1",
    //   "$to2",
    //   "$to3"
    // ],
    // 多人token
    // "condition" => "'Symulti' in topics || 'SymultiLite' in topics",  // 匹配Symulti OR SymultiLite的設備 (最多三個topic) (符號: && 或 ||)
    "collapse_key" => "Updates Available",
    "priority" => "high", //high , normal
    "restricted_package_name" => "com.geektic.ethan", //Android only
    "data" => [
      "param1" => "value1",
      "param2" => "value2"
    ],
    // Web
    // "notification" => [
    //   "title" => "$title",
    //   "body" => "$body",
    //   "icon" => "firebase-logo.png",
    //   "click_action" => ""
    // ]
    // Android
    "notification" => [
      "title" => "$title",
      "body" => "$body",
      "icon" => "fcm_push_icon",
      "sound" => "default",  // "default" or the filename in /res/raw/. 
      "tag" => "", // If specified and a notification with the same tag is already being shown, the new notification replaces the existing one in the notification drawer.
      "color" => "#000000",
      "click_action" => "FCM_PLUGIN_ACTIVITY"
    ]
  ];
  echo fcm_push($notification);
}
?>
<!doctype html>
<html lang="zh-tw">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div style="height:15vw">
      <a href="https://firebase.google.com/docs/cloud-messaging/http-server-ref">由此前往說明文件</a>
    </div>
    <form action="" method="post">
      <div class="form-group row">
        <label class="col-2 col-form-label">推給</label>
        <div class="col-10">
          <input class="form-control" name="to" placeholder="Token">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">推播標題</label>
        <div class="col-10">
          <input class=" form-control" name="title" placeholder="文字內容">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-2 col-form-label">推播內容</label>
        <div class="col-10">
          <textarea class="form-control" name="body" rows="3"></textarea>
        </div>
      </div>
      <button class="form-control" type="submit">送出</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>