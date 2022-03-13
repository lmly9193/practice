// 這個檔案需要放置在網域根目錄
importScripts('https://www.gstatic.com/firebasejs/7.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.5.2/firebase-messaging.js');
importScripts('firebase-init.js');

const messaging = firebase.messaging();

// 如果預設收到的推播沒有帶 notification 由此處理
messaging.setBackgroundMessageHandler(function (payload) {

  console.log('[firebase-messaging-sw.js] 收到背景訊息 ', payload);
  // 瀏覽器方法： 推播
  // const notificationTitle = 'Background Message Title';
  // const notificationOptions = {
  //   body: 'Background Message body.',
  //   icon: 'firebase-logo.png'
  // };
  // return self.registration.showNotification(notificationTitle, notificationOptions);
});