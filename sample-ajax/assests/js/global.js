/* Global JavaScript File for working with jQuery library */


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
  
  $('#my-div a').click(function() {

    // get the value from the username field                              
    var txt = $(e.target).text();
    
    // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
    // post the username field's value
    $.post('ajax/product',
      { 'brand_name':txt },

      // when the Web server responds to the request
      function(result) {
        // clear any message that may have already been written
        $('#bad_username').replaceWith('');
        
        // if the result is TRUE write a message to the page
        if (result) {
          $('#my-div').after('<div id="bad_username" style="color:red;">' 
            + '<p>( results)</p></span></div>');
        }
		else {
		$('#my-div').after('<span id="bad_username" style="color:red; ">' +
            '<p>(sorry no results)</p></span>');
		}
      }
    );
  });  
  

});

$(window).load(function(){
$("#userTabs li").click(function(e){
  e.preventDefault();
  $("#userTabs li").removeClass('selected');
  $(this).addClass('selected');
  var href = $(this).find('a').attr('href');
  alert(href);
  
  

});
});//]]> 

