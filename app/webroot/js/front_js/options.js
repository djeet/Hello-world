
      var domain = 'http://unlimitedpractice.com/';
      var city = 'Melbourne';
      if(window.location.href.split('/browse/').length >= 2 && window.location.href.split('/browse/')[1].split('/')[0] != "") {
        city = window.location.href.split('/browse/')[1].split('/')[0];
      }
      var options = '<optgroup label="Venues"></optgroup><optgroup label="Melbourne"><option value="#">Docklands</option><option value="#">Melbourne CBD</option><option value="http://venuemob.com.au/melbourne/southbank">Southbank</option><option value="http://venuemob.com.au/melbourne/abbotsford">Abbotsford</option><option value="http://venuemob.com.au/melbourne/collingwood">Collingwood</option><option value="http://venuemob.com.au/melbourne/east-melbourne">East Melbourne</option><option value="http://venuemob.com.au/melbourne/richmond">Richmond</option><option value="http://venuemob.com.au/melbourne/carlton">Carlton</option><option value="http://venuemob.com.au/melbourne/fitzroy">Fitzroy</option><option value="http://venuemob.com.au/melbourne/north-melbourne">North Melbourne</option><option value="http://venuemob.com.au/melbourne/balaclava">Balaclava</option><option value="http://venuemob.com.au/melbourne/prahran">Prahran</option><option value="http://venuemob.com.au/melbourne/south-melbourne">South Melbourne</option><option value="http://venuemob.com.au/melbourne/south-yarra">South Yarra</option><option value="http://venuemob.com.au/melbourne/st-kilda">St Kilda</option><option value="http://venuemob.com.au/melbourne/toorak">Toorak</option><option value="http://venuemob.com.au/melbourne/windsor">Windsor</option><option value="http://venuemob.com.au/melbourne/west-melbourne">West Melbourne</option><option value="http://venuemob.com.au/melbourne/blackburn">Blackburn</option><option value="http://venuemob.com.au/melbourne/hawthorn">Hawthorn</option><option value="http://venuemob.com.au/melbourne/brunswick">Brunswick</option><option value="http://venuemob.com.au/melbourne/brunswick-east">Brunswick East</option><option value="http://venuemob.com.au/melbourne/taylors-lakes">Taylors Lakes</option><option value="http://venuemob.com.au/melbourne/williamstown">Williamstown</option><option value="http://venuemob.com.au/melbourne/albert-park">Albert Park</option><option value="http://venuemob.com.au/melbourne/altona-north">Altona North</option><option value="http://venuemob.com.au/melbourne/armadale">Armadale</option><option value="http://venuemob.com.au/melbourne/bentleigh">Bentleigh</option><option value="http://venuemob.com.au/melbourne/brighton">Brighton</option><option value="http://venuemob.com.au/melbourne/camberwell">Camberwell</option><option value="http://venuemob.com.au/melbourne/carlton-north">Carlton North</option><option value="http://venuemob.com.au/melbourne/clayton">Clayton</option><option value="http://venuemob.com.au/melbourne/clifton-hill">Clifton Hill</option><option value="http://venuemob.com.au/melbourne/elsternwick">Elsternwick</option><option value="http://venuemob.com.au/melbourne/elwood">Elwood</option><option value="http://venuemob.com.au/melbourne/fitzroy-north">Fitzroy North</option><option value="http://venuemob.com.au/melbourne/northcote">Northcote</option><option value="http://venuemob.com.au/melbourne/port-melbourne">Port Melbourne</option><option value="http://venuemob.com.au/melbourne/templestowe">Templestowe</option><option value="http://venuemob.com.au/melbourne/yarraville">Yarraville</option></optgroup><optgroup label="Sydney"><option value="http://venuemob.com.au/sydney/darlinghurst">Darlinghurst</option><option value="http://venuemob.com.au/sydney/pyrmont">Pyrmont</option><option value="http://venuemob.com.au/sydney/pyrmont">Pyrmont</option><option value="http://venuemob.com.au/sydney/sydney-cbd">Sydney CBD</option><option value="http://venuemob.com.au/sydney/coogee">Coogee</option><option value="http://venuemob.com.au/sydney/crows-nest">Crows Nest</option><option value="http://venuemob.com.au/sydney/hunters-hill">Hunters Hill</option><option value="http://venuemob.com.au/sydney/lane-cove">Lane Cove</option><option value="http://venuemob.com.au/sydney/abbotsford">Abbotsford</option><option value="http://venuemob.com.au/sydney/balmain">Balmain</option><option value="http://venuemob.com.au/sydney/leichhardt">Leichhardt</option></optgroup><optgroup label="Events"><option value="http://venuemob.com.au/browse/melbourne/birthday-party">Birthday Party</option><option value="http://venuemob.com.au/browse/melbourne/corporate-function">Corporate Function</option><option value="http://venuemob.com.au/browse/melbourne/reception">Reception</option><option value="http://venuemob.com.au/browse/melbourne/after-work-drinks">After Work Drinks</option><option value="http://venuemob.com.au/browse/melbourne/product-launch">Product Launch</option><option value="http://venuemob.com.au/browse/melbourne/christmas-function">Christmas Function</option><option value="http://venuemob.com.au/browse/melbourne/engagement-party">Engagement Party</option><option value="http://venuemob.com.au/browse/melbourne/hens-night">Hens Night</option><option value="http://venuemob.com.au/browse/melbourne/bucks-night">Bucks Night</option><option value="http://venuemob.com.au/browse/melbourne/meetup-event">Meetup Event</option><option value="http://venuemob.com.au/browse/melbourne/charity-event">Charity Event</option></optgroup>';
      var alertify = false; 