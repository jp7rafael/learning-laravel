function toList(messages)
{
  if( typeof someVar === 'string' ) {
    return messages;
  }

  var converted = '';
  $.each(messages, function(key, value)
  {
    converted += '<li>' + value + '</li>';
  });
  return converted;
}

function validateTarget(target)
{
  return target || '.alert';
}

function showFlash(type, title, messages, fadeOut, target)
{
  var target = validateTarget(target);

  $(target)
      .removeClass('alert-notice')
      .removeClass('alert-success')
      .removeClass('alert-danger')
      .addClass('alert-' + type)
      .show()
      .find('b')
      .html(title)
      .next('ul')
      .html(toList(messages));

  if (fadeOut) {
    notice.delay(10000).fadeOut();
  }
}

function hideFlash(target)
{
  var target = validateTarget(target);
  $(target).hide();
}

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

$(document).on('ajax:success', '[data-target]', function(e, data, status, xhr){
  var target = $(this).data('target');
  $(target)
    .html(data)
    .find('[data-remote]:not([data-target])')
    .attr('data-target', target)
    .attr('data-type', 'html');
});

$(function() {
  $('[data-remote]:not([data-target]')
    .attr('data-target', '#content')
    .attr('data-type', 'html');
});

$(document).on('ajax:error', '[data-remote]', function(e, data, status, xhr){
  showFlash('danger', 'Ops... Something going wrong!', $.parseJSON(data.responseText));
});

$(document).on('ajax:success', '[data-remote]', function(e, data, status, xhr){
    hideFlash();
    loadFlirckImage();
});

//# sourceMappingURL=app.js.map