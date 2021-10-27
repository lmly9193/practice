/* by Ethan */
document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady() {
  fcm.initialize();
  badge.initialize();
}

var fcm = {
  initialize: function () {
    FCMPlugin.onTokenRefresh(
      function (token) {
        console.log('onTokenRefresh:' + token);
      }
    );
    FCMPlugin.onNotification(
      function (data) {
        if (data.wasTapped) {
          //Notification was received on device tray and tapped by the user.
          alert(JSON.stringify(data));
        } else {
          //Notification was received in foreground. Maybe the user needs to be notified.
          alert(JSON.stringify(data));
        }
      },
      function (msg) {
        // successCallback
        console.log('onNotification successCallback:' + msg);
      },
      function (err) {
        // errorCallback
        console.log('onNotification errorCallback:' + err);
      }
    );
  },
  GetToken: function () {
    FCMPlugin.getToken(
      function (token) {
        // successCallback
        console.log('getToken successCallback:' + token);
        document.querySelector('#msg').innerHTML = token;
      },
      function (err) {
        // errorCallback
        console.log('getToken errorCallback:' + err);
      }
    );
  },
  Subscribe: function () {
    //All devices are subscribed automatically to 'all' and 'ios' or 'android' topic respectively.
    //Must match the following regular expression: "[a-zA-Z0-9-_.~%]{1,900}".
    FCMPlugin.subscribeToTopic(
      'topicExample',
      function (msg) {
        // successCallback
        console.log('subscribeToTopic successCallback:' + msg);
        alert('已訂閱');
      },
      function (err) {
        // errorCallback
        console.log('subscribeToTopic errorCallback:' + err);
        alert('錯誤');
      }
    );
  },
  Unsubscribe: function () {
    FCMPlugin.unsubscribeFromTopic(
      'topicExample',
      function (msg) {
        // successCallback
        console.log('unsubscribeFromTopic successCallback:' + msg);
        alert('已解除');
      },
      function (err) {
        // errorCallback
        console.log('unsubscribeFromTopic errorCallback:' + err);
        alert('錯誤');
      }
    );
  }
}

var badge = {
  object: Object,
  initialize: function () {
    this.object = cordova.plugins.notification.badge;
    this.object.configure({
      autoClear: true
    });
  },
  set: function (num) {
    this.object.set(num);
  },
  increase: function (num) {
    this.object.increase(
      num,
      function (badge) {
        alert("新增: " + num + "\n目前: " + badge);
      }
    )
  },
  decrease: function (num) {
    this.object.decrease(
      num,
      function (badge) {
        alert("減少: " + num + "\n目前: " + badge);
      }
    )
  },
  clear: function () {
    this.object.clear();
  },
  get: function () {
    this.object.get(function (badge) {
      alert(badge);
    });
  },
  requestPermission: function () {
    this.object.requestPermission(function (granted) {
          alert(granted);
    });
  },
  hasPermission: function () {
    this.object.hasPermission(function (granted) {
          alert(granted);
    });
  },
}
