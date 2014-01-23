/* Global JavaScript File for working with jQuery library */

/* **** **********  Username Exists starts  *******/

$(document).ready(function() {

  /* USERNAME VALIDATION */
  // use element id=username 
  // bind our function to the element's onblur event
  $('#username').blur(function() {

    // get the value from the username field                              
    var username = $('#username').val();
    
    // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
    // post the username field's value
    $.post('ajax/username_taken',
      { 'username':username },

      // when the Web server responds to the request
      function(result) {
        // clear any message that may have already been written
        $('#bad_username').replaceWith('');
        
        // if the result is TRUE write a message to the page
        if (result) {
          $('#username').after('<div id="bad_username" style="color:red;">' +
            '<p>(That Username is already taken. Please choose another.)</p></div>');
        }
		else {
		$('#username').after('<span id="bad_username" style="color:red; ">' +
            '<p>(Username Available)</p></span>');
		}
      }
    );
  });  
  

  

});
/* **********  Username Exists Ends *******/



/* **** **********  Ajax filter starts  *******/

	function load_data_ajax(type){
	  var controller = 'ajax';
		$.ajax({
			'url' : controller + '/product',
			'type' : 'POST', //the way you want to send data to your URL
			'data' : {'type1' : type},
			'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
				var container = $('#container1'); //jquery selector (get element by id)
				if(data){
					container.html(data);
				}
			}
		});
	}
/* **********  Ajax filter Ends    **********  */

