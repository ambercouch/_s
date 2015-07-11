/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

  console.log('navigation');

	container = document.getElementById( 'main-navigation' );
	if ( ! container ) {
		return;
	}

  console.log(container);
	button = container.getElementsByClassName( 'navigation--main__toggle' )[0];

  console.log(button);

	if ( 'undefined' === typeof button ) {
		button = container.querySelectorAll('.navigation--main__toggle')[0]
	}
  if ( 'undefined' === typeof button ) {
    return;
  }

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}


	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'is-toggled' ) ) {
			container.className = container.className.replace( ' is-toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' is-toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )();
