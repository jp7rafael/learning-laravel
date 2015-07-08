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
