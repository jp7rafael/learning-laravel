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

$(document).on('ajax:success', '[data-remote]', function(e, data, status, xhr){
    loadFlirckImage();
});
