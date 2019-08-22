
// Toggle side menu Function

function openSlide(){
    document.getElementById('wrapper').classList.toggle('toggled');

}

//User Drop-Down

const userDrop=document.querySelector('.popup-user');
const adminIcon=document.querySelector('.drop-user');
adminIcon.addEventListener('click',function(){
    userDrop.classList.toggle('active');
});
//hide it when clicking anywhere, except the popup and the userIcon(userName)
$(document).on('click touch', function(event) {
    if (!$(event.target).parents().addBack().is('.popup-user') && !$(event.target).parents().addBack().is('.drop-user')) {
        userDrop.classList.remove('active');
    }
  });
//End - User Drop-Down


'use strict';

;( function ( document, window, index )
{

    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });
}( document, window, 0 ));
