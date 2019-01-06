var Loading_Html5 = '<svg id="ewewo-loading" viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">'
          + '<g id="circle" class="g-circles g-circles--v1">'
          + '<circle id="12" transform="translate(35, 16.698730) rotate(-30) translate(-35, -16.698730) " cx="35" cy="16.6987298" r="10"></circle>'
          + '<circle id="11" transform="translate(16.698730, 35) rotate(-60) translate(-16.698730, -35) " cx="16.6987298" cy="35" r="10"></circle>'
          + '<circle id="10" transform="translate(10, 60) rotate(-90) translate(-10, -60) " cx="10" cy="60" r="10"></circle>'
          + '<circle id="9" transform="translate(16.698730, 85) rotate(-120) translate(-16.698730, -85) " cx="16.6987298" cy="85" r="10"></circle>'
          + '<circle id="8" transform="translate(35, 103.301270) rotate(-150) translate(-35, -103.301270) " cx="35" cy="103.30127" r="10"></circle>'
          + '<circle id="7" cx="60" cy="110" r="10"></circle>'
          + '<circle id="6" transform="translate(85, 103.301270) rotate(-30) translate(-85, -103.301270) " cx="85" cy="103.30127" r="10"></circle>'
          + '<circle id="5" transform="translate(103.301270, 85) rotate(-60) translate(-103.301270, -85) " cx="103.30127" cy="85" r="10"></circle>'
          + '<circle id="4" transform="translate(110, 60) rotate(-90) translate(-110, -60) " cx="110" cy="60" r="10"></circle>'
          + '<circle id="3" transform="translate(103.301270, 35) rotate(-120) translate(-103.301270, -35) " cx="103.30127" cy="35" r="10"></circle>'
          + '<circle id="2" transform="translate(85, 16.698730) rotate(-150) translate(-85, -16.698730) " cx="85" cy="16.6987298" r="10"></circle>'
          + '<circle id="1" cx="60" cy="10" r="10"></circle>'
          + '</g>'
          + '<use xlink:href="#circle" class="use"/>'
          + '</svg>';
var audioBD = new Audio();
var Ewewo = {
    Tips_Success: function (c, callback) {
        if ($('#ewewo_tip_window').length > 0) {
            return;
        }

        $('body').append('<div id="ewewo_tip_window" class="savets">' + c + '</div>');
        $('#ewewo_tip_window').show().fadeOut(2000, function () {
            $(this).remove();
            (callback && typeof (callback) === "function") && callback();
        });
    },

    Tips: function (c, callback) {
        if ($('#ewewo_tip_window').length > 0) {
            $('#ewewo_tip_window').remove();
            //return; //如果上次一提示框没有消失的话,在调用这个方法就不会提示出来
        }

        $('body').append('<div id="ewewo_tip_window" class="savets2">' + c + '</div>');
        $('#ewewo_tip_window').show().fadeOut(2000, function () {
            $(this).remove();
            (callback && typeof (callback) === "function") && callback();
        });
    },

    Tips_Error: function (c, callback) {
        if ($('#ewewo_tip_window').length > 0) {
            return;
        }

        $('body').append('<div id="ewewo_tip_window" class="savets3">' + c + '</div>');
        $('#ewewo_tip_window').show().fadeOut(2000, function () {
            $(this).remove();
            (callback && typeof (callback) === "function") && callback();
        });
    },

    Shadow: function (callback) {
        var will_height = $(document).height() > $(window).height() ? $(document).height() : $(window).height();
        $('body').append('<div id="ewewo_shadow" style="width:100%;height:' + will_height + 'px;z-index:9999;position:fixed;top:0px;left:0px;background:#000;opacity:0.5;"></div>');
        $('#ewewo_shadow').click(function () {
            $(this).remove();
            (callback && typeof (callback) === "function") && callback();
        });
    },
    RemoveShadow: function () {
        $('#ewewo_shadow').remove();
    },
    Loading: function () {
        $('body').append(Loading_Html5);
    },
    RemoveLoading: function () {
        $('#ewewo-loading').remove();
    },
    GetCookie: function (name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null) return unescape(arr[2]); return null;
    },
    SetCookie: function (name, value) {
        var Days = 0.5;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    },
    IsMobile: function () {
        return {
            Android: function () {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function () {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function () {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function () {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function () {
                return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
            },
            any: function () {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };
    },
    IsWeixin: function () {
        var ua = navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == "micromessenger") {
            return true;
        } else {
            return false;
        }
    },
    StringFormat: function () {
        if (arguments.length == 0)
            return null;
        var str = arguments[0];
        for (var i = 1; i < arguments.length; i++) {
            var re = new RegExp('\\{' + (i - 1) + '\\}', 'gm');
            str = str.replace(re, arguments[i]);
        }
        return str;
    },
    PadLeft: function (str, num, tail) {
        str = str + '';
        while (str.length < num) {
            str = tail + str;
        }
        return str;
    },
    IsMobileNo: function (s) {
        var patrn = /^(1[0-9]{8,10})$/;
        if (!patrn.exec(s)) return false
        return true
    },
    IsMobileOrCarNo: function (s) {
        var rt = 0;
        //判断是车牌号还是手机号还是顾客姓名.0为姓名.1.为手机号.2为车牌号
        var reg = new RegExp("[\\u4E00-\\u9FFF]+", "g");
        var patrn = /^(1[0-9]{8,10})$/;
        if (patrn.exec(s)) {
            rt = 1;
        } else if (s.match(reg) != null) {
            var ar = s.match(reg);
            if (ar.length == 1) {
                if (ar[0].length == 1) {
                    rt = 2;
                } else {
                    rt = 0;
                }
            } else {
                rt = 0;
            }
        }
        return rt;

    },

    WXBack: function (reurl) {
        if (reurl != null && reurl.length > 0) {
            document.location.href = reurl;
        }
        else if (document.referrer != null
                    && document.referrer.length > 0
                    && document.location.href != document.referrer) {
            history.back();
        }
        else if (Ewewo.IsWeixin()) {
            WeixinJSBridge.call('closeWindow');

        }

    },
    History: function () {
        self.location = document.referrer;
    },
    BackTo: function (reurl, deurl) {

        if (reurl != null && reurl.length > 0) {
            document.location.href = reurl;
        }
        else if (deurl != null && deurl.length > 0) {
            document.location.href = deurl;
        }
        else {
            history.back(-1);
        }
    },
    playBDAudio: function (text, token, storeid) {
        var src = '//tts.baidu.com/text2audio?ie=UTF-8&lan=zh&&ctp=1&spd=3&pit=&vol=15&per=0';
        src += '&tok=' + token;
        src += '&tex=' + text;
        src += '&cuid=' + storeid;
        audioBD.src = src;
        audioBD.load();
        audioBD.currentTime = 0;
        audioBD.play();
    },
    iOSplayBDAudio: function (text, token, storeid) {
        var src = '//tts.baidu.com/text2audio?ie=UTF-8&lan=zh&&ctp=1&spd=3&pit=&vol=15&per=0';
        src += '&tok=' + token;
        src += '&tex=' + text;
        src += '&cuid=' + storeid;
        $("#bg-music").attr("src", src);
        autoPlayMusic();


    }
};

/*用户 cookies 处理*/
$.cookie = function (name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

Array.prototype.clear = function () {
    this.length = 0;
}
Array.prototype.insertAt = function (index, obj) {
    this.splice(index, 0, obj);
}
Array.prototype.removeAt = function (index) {
    this.splice(index, 1);
}
Array.prototype.remove = function (obj) {
    var index = this.indexOf(obj);
    if (index >= 0) {
        this.removeAt(index);
    }
}

String.format = function () {
    if (arguments.length == 0)
        return null;
    var str = arguments[0];
    for (var i = 1; i < arguments.length; i++) {
        var re = new RegExp('\\{' + (i - 1) + '\\}', 'gm');
        str = str.replace(re, arguments[i]);
    }
    return str;
};
String.prototype.ToString = function (format) {
    var dateTime = new Date(parseInt(this.substring(6, this.length - 2)));
    format = format.replace("yyyy", dateTime.getFullYear());
    format = format.replace("yy", dateTime.getFullYear().toString().substr(2));
    format = format.replace("MM", dateTime.getMonth() + 1)
    format = format.replace("dd", dateTime.getDate());
    format = format.replace("hh", dateTime.getHours());
    format = format.replace("mm", dateTime.getMinutes());
    format = format.replace("ss", dateTime.getSeconds());
    format = format.replace("ms", dateTime.getMilliseconds())
    return format;
};

function connecturl(url, qs) {
    if (qs == null || qs.length == 0 || qs.indexOf("=") < 0) {
        return url;
    }

    if (url == null || url.length == 0) return url;

    var ret = ""
    if (qs.indexOf("?") == 0) qs = qs.substring(1);

    if (url.indexOf("?") > 0 && url.indexOf("=") > 0) {
        ret = url + "&" + qs;
    }
    else if (url.indexOf("?") == url.length - 1) {
        ret = url + qs;
    }
    else {
        ret = url + "?" + qs;
    }
    return ret;
}

$.urlParam = function (name, url) {
    if (!url) {
        url = window.location.href;
    }
    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url);
    if (!results) {
        return undefined;
    }
    return results[1] || undefined;
}

$.urlParamSet = function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
        return uri + separator + key + "=" + value;
    }
}

function masklayer(type, text) {
    if (type == 1) {
        $(".mask_box").hide();
        $(".saveing").text(text).hide();
    }
    else {
        $(".mask_box").show();
        $(".saveing").text(text).show();
    }
}



// 音乐播放
function autoPlayMusic() {
    if (/i(Phone|P(o|a)d)/.test(navigator.userAgent)) {
        // 自动播放音乐效果，解决浏览器或者APP自动播放问题
        function musicInBrowserHandler() {
            musicPlay(true);
            document.body.removeEventListener('touchstart', musicInBrowserHandler);
        }
        document.body.addEventListener('touchstart', musicInBrowserHandler);
    }
    else {
        // 自动播放音乐效果，解决微信自动播放问题
        function musicInWeixinHandler() {
            musicPlay(true);
            document.addEventListener("WeixinJSBridgeReady", function () {
                musicPlay(true);
            }, false);
            document.removeEventListener('DOMContentLoaded', musicInWeixinHandler);
        }
        document.addEventListener('DOMContentLoaded', musicInWeixinHandler);
    }
}
function musicPlay(isPlay) {
    var media = document.querySelector('#bg-music');
    if (isPlay && media.paused) {
        media.play();
    }
    if (!isPlay && !media.paused) {
        media.pause();
    }
}