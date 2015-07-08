function appendImage(img_url, title, container)
{
  $("<img title='" + title + "' alt='" + title + "'>")
    .attr('src', img_url)
    .appendTo(container);
}

function loadFlirckImage()
{
  $('[data-remote-picture]').each(function() {
    var container = this;
    var title = $(container).data('remote-picture');
    var urlFlickrApi = 'http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?';

    $.getJSON(urlFlickrApi, {
      tags: title,  
      tagmode: 'any',
      format: 'json'
    })
    .done(function(data) {
        appendImage(data.items[0].media.m, title, container);
    });
  });
}
