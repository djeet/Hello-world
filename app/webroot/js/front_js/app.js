// Generated by CoffeeScript 1.4.0
(function() {
  
if (!Array.prototype.filter)
{
  Array.prototype.filter = function(fun /*, thisp */)
  {
    "use strict";
 
    if (this == null)
      throw new TypeError();
 
    var t = Object(this);
    var len = t.length >>> 0;
    if (typeof fun != "function")
      throw new TypeError();
 
    var res = [];
    var thisp = arguments[1];
    for (var i = 0; i < len; i++)
    {
      if (i in t)
      {
        var val = t[i]; // in case fun mutates this
        if (fun.call(thisp, val, i, t))
          res.push(val);
      }
    }
 
    return res;
  };
}
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function (searchElement /*, fromIndex */ ) {
        "use strict";
        if (this == null) {
            throw new TypeError();
        }
        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0) {
            return -1;
        }
        var n = 0;
        if (arguments.length > 1) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
        for (; k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
    }
}
;

  
if(!Modernizr.input.placeholder) {
  $('[placeholder]').focus(function() {
    var input = $(this);
    if(input.val() == input.attr('placeholder')) {
      input.val('');
      input.removeClass('placeholder');
    }
  }).blur(function() {
    var input = $(this);
    if(input.val() == '' || input.val() == input.attr('placeholder')) {
      input.addClass('placeholder');
      input.val(input.attr('placeholder'));
    }
  }).blur();
  $('[placeholder]').parents('form').submit(function() {
    $(this).find('[placeholder]').each(function() {
      var input = $(this);
      if(input.val() == input.attr('placeholder')) {
        input.val('');
      }
    })
  });
}
;

  var alertify, clean;

  clean = function(search) {
    return $.trim(search).replace(/&/g, "and").toLowerCase().replace(/'/g, "").replace(/,/g, "").replace(/"/g, "").replace(/;/g, "").replace(/\./g, "").replace(/\s{2,}/g, "-").replace(/\s/g, "-");
  };

  $("div.location > a").click(function() {});

  $('select.top-search').append(options).select2({
    placeholder: 'Search for a venue...',
    allowClear: true
  }).change(function() {
    return window.location.href = $(this).val();
  });

  $("input#mc-footer-submit").click(function(e) {
    e.preventDefault();
    if ($("input#mc-footer-email").val() !== "") {
      return $.post(domain + 'api/add_subscription', {
        email: $("input#mc-footer-email").val(),
        name: $("input#mc-footer-name").val(),
        data: '',
        source: '',
        group: 'Footer',
        success_msg: 'You have successfully signed up to our newsletter'
      }, function(data) {
        if (data.success) {
          return flashalert('success', data.result, 'inline', $('form#mc-footer-form'));
        } else {
          return flashalert('error', data.result, 'inline', $('form#mc-footer-form'));
        }
      }, 'json');
    }
  });

  if (window.alertify) {
    window.flashalert(window.alertify.type, window.alertify.message, 'top', null, window.alertify.duration);
    alertify = void 0;
  }

  $('div.location a').click(function() {
    return $('div#change_location').reveal();
  });

  $('span#alert-change').click(function() {
    return $('div#change_location').reveal();
  });

}).call(this);
