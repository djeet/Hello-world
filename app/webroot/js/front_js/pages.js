// Generated by CoffeeScript 1.4.0
(function() {

  $(function() {
    var clicked;
    $('div#steps div.step').click(function() {
      $('div#steps div.step.active').removeClass('active');
      $(this).addClass('active');
      $('div#steps-content div.show').removeClass('show').addClass('hide');
      return $('div#steps-content div.' + $(this).attr('rel')).removeClass('hide').addClass('show');
    });
    $('div.venue').live('hover', function() {
      return $(this).toggleClass('hover');
    });
    clicked = false;
    $("input#mc-comp-submit").click(function(e) {
      if ($('input#tandcs').is(':checked')) {
        if (!clicked) {
          clicked = true;
          $("input#mc-comp-submit").val("Sending...");
          e.preventDefault();
          if ($("input#mc-comp-email").val() !== "") {
            return $.post(domain + 'api/add_subscription', {
              email: $("input#mc-comp-email").val(),
              name: '',
              data: '',
              source: '',
              group: 'Venues in Summer #6',
              success_msg: 'Thank you for joining the competition - all the best!'
            }, function(data) {
              clicked = false;
              $("input#mc-comp-submit").val("Submit");
              if (data.success) {
                return flashalert('success', data.result, 'inline', $("input#mc-comp-email"), 20);
              } else {
                return flashalert('error', data.result, 'inline', $("input#mc-comp-email"), 20);
              }
            }, 'json');
          } else {
            clicked = false;
            flashalert('error', "Please enter an email address", 'inline', $("input#mc-comp-email"), 20);
            return $("input#mc-comp-submit").val("Submit");
          }
        }
      } else {
        return flashalert('error', "Please accept terms and conditions first", 'inline', $("input#mc-comp-email"), 20);
      }
    });
    clicked = false;
    $("input#mc-easter-submit").click(function(e) {
      if (!clicked) {
        clicked = true;
        $("input#mc-easter-submit").val("Sending...");
        e.preventDefault();
        if ($("input#mc-easter-email").val() !== "") {
          return $.post(domain + 'api/add_subscription', {
            email: $("input#mc-easter-email").val(),
            name: $("input#mc-easter-name").val(),
            data: '',
            source: '',
            group: 'Easter Hunt',
            success_msg: 'Thank you! The winner of the $150 voucher will be announced on the 3rd of April'
          }, function(data) {
            clicked = false;
            $("input#mc-easter-submit").val("Submit");
            if (data.success) {
              return flashalert('success', data.result, 'inline', $("#submit-message"), 3000);
            } else {
              return flashalert('error', data.result, 'inline', $("#submit-message"), 3000);
            }
          }, 'json');
        } else {
          clicked = false;
          flashalert('error', "Please enter an email address", 'inline', $("#submit-message"), 3000);
          return $("input#mc-easter-submit").val("Submit");
        }
      }
    });
    $("input#mc-b2b-submit").click(function(e) {
      if (!clicked) {
        clicked = true;
        $("input#mc-b2b-submit").val("Sending...");
        e.preventDefault();
        if ($("input#mc-b2b-email").val() !== "") {
          return $.post(domain + 'api/add_b2b', {
            email: $("input#mc-b2b-email").val(),
            name: $("input#mc-b2b-name").val(),
            venue: $("input#mc-b2b-venue").val(),
            phone: $("input#mc-b2b-phone").val(),
            state: $("select#mc-b2b-state").val(),
            referrer: $("input#mc-b2b-referrer").val(),
            source: 'list-your-venue',
            comments: $("textarea#mc-b2b-comments").val(),
            success_msg: 'Thank you for submitting your interest - we\'ll be in touch soon!'
          }, function(data) {
            clicked = false;
            $("input#mc-b2b-submit").val("Submit");
            if (data.success) {
              return flashalert('success', data.result, 'inline', $("input#mc-b2b-submit"), 20);
            } else {
              return flashalert('error', data.result, 'inline', $("input#mc-b2b-submit"), 20);
            }
          }, 'json');
        } else {
          clicked = false;
          $("input#mc-b2b-submit").val("Register Interest");
          return flashalert('error', "Please enter an email address", 'inline', $("input#mc-b2b-submit"), 20);
        }
      }
    });
    $("#mc-21st-submit").click(function(e) {
      if (!clicked) {
        clicked = true;
        $("#mc-21st-submit").html("Processing...");
        e.preventDefault();
        if ($("input#mc-21st-email").val() !== "") {
          return $.post(domain + 'api/add_subscription', {
            email: $("input#mc-21st-email").val(),
            name: $("input#mc-21st-name").val(),
            data: 'dob|' + $('#mc-21st-dob-month').val() + '/' + $('#mc-21st-dob-day').val() + '/' + $('#mc-21st-dob-year').val(),
            source: $("input#mc-21st-source").val(),
            group: '21st Venues In Melbourne',
            success_msg: 'Thanks!'
          }, function(data) {
            clicked = false;
            return window.location = domain + '21st-birthday-venues-in-melbourne';
          }, 'json');
        } else {
          clicked = false;
          flashalert('error', "Please enter an email address", 'inline', $("#mc-21st-submit"), 20);
          return $("#mc-21st-submit").html('View Venues <i class="icon-chevron-right"></i>');
        }
      }
    });
    $("#mc-xmas-submit").click(function(e) {
      if (!clicked) {
        clicked = true;
        $("#mc-xmas-submit").html("Processing...");
        e.preventDefault();
        if ($("#mc-xmas-email").val() !== "") {
          return $.post(domain + 'api/add_subscription', {
            email: $("#mc-xmas-email").val(),
            name: $("#mc-xmas-name").val(),
            data: 'company|' + $('#mc-xmas-company').val(),
            source: $("#mc-xmas-source").val(),
            group: 'Christmas Venues in Melbourne',
            success_msg: 'Thanks!'
          }, function(data) {
            clicked = false;
            if ($('#mc-xmas-type').val() === "1") {
              return window.location = domain + 'collection/christmas-venues-in-melbourne-meals';
            } else {
              return window.location = domain + 'collection/christmas-venues-in-melbourne-cocktail';
            }
          }, 'json');
        } else {
          clicked = false;
          flashalert('error', "Please enter an email address", 'inline', $("#mc-xmas-submit"), 20);
          return $("#mc-xmas-submit").html('View Venues <i class="icon-chevron-right"></i>');
        }
      }
    });
    return $("a#mc-sydney-submit").click(function(e) {
      if (!clicked) {
        clicked = true;
        $('#mc-sydney-submit').html('Submitting...');
        e.preventDefault();
        if ($("input#mc-sydney-email").val() !== "") {
          return $.post(domain + 'api/add_subscription', {
            email: $("input#mc-sydney-email").val(),
            name: '',
            data: '',
            source: '',
            group: 'Sydney Landing Page',
            success_msg: 'Thank you for signing up!'
          }, function(data) {
            clicked = false;
            $('#mc-sydney-submit').html('Sign Up');
            if (data.success) {
              return flashalert('success', data.result, 'inline', $('#mc-sydney-submit'), 2000, 'after');
            } else {
              return flashalert('error', data.result, 'inline', $('#mc-sydney-submit'), 2000, 'after');
            }
          }, 'json');
        } else {
          clicked = false;
          flashalert('error', "Please enter an email address", 'inline', $("#mc-sydney-submit"), 2000, 'after');
          return $('#mc-sydney-submit').html('Sign Up');
        }
      }
    });
  });

}).call(this);
