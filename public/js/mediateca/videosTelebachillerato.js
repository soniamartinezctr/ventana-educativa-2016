		//		*****	*****		El siguiente fragmento de codigo es para el uso de Facebook en la aplicación		*****	*****
		window.fbAsyncInit = function () {
            FB.init({
                appId: '1408909052733113',
                xfbml: true,
                version: 'v2.6'
            });
        };
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

		//		*****	*****	sdk twitter		*****
		
        window.twttr = (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
                if (d.getElementById(id))
            return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function (f) {
            t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));

		//		*****	*****	sdk twitter		*****
