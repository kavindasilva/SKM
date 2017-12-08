
  console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
  console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

  $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    container: 'body'
  });
  $('[data-toggle=confirmation-singleton]').confirmation({
    rootSelector: '[data-toggle=confirmation-singleton]',
    container: 'body',
	onConfirm: function() {
      deleteorder();
    }  
  });
  $('[data-toggle=confirmation-popout]').confirmation({
    rootSelector: '[data-toggle=confirmation-popout]',
    container: 'body',
	  onConfirm: function() {
      deletestock();
    }  
  });

  $('#confirmation-delegate').confirmation({
    selector: 'button'
  });

  