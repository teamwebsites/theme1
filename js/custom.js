function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

jQuery(document).ready(function($){
    
    
	    $(".menu-item-has-children").append("<div id='open-menu-link15' class='open-menu-link15 open5'></div>");
	
	
	    $('.open-menu-link15').click(function(e){
	        var childMenu =  e.currentTarget.parentNode.children[1];
	        if($(childMenu).hasClass('visible3')){
	            $(childMenu).removeClass("visible3");
	
	            $(e.currentTarget.parentNode.children[3]).removeClass("visible3");
	            $(e.currentTarget.parentNode.children[2]).removeClass("abc");
	            $(e.currentTarget.parentNode.children[3]).removeClass("abc");
	            $(e.currentTarget.parentNode.children[2]).addClass("visible3");
	        } else {
	            $(childMenu).addClass("visible3");
	
	            $(e.currentTarget.parentNode.children[2]).removeClass("visible3");
	            $(e.currentTarget.parentNode.children[2]).addClass("abc");
	            $(e.currentTarget.parentNode.children[3]).addClass("abc");
	            $(e.currentTarget.parentNode.children[3]).addClass("visible3");
	        }
	    });
	});
	
	jQuery(function($){
    	     $( '.menu-btn' ).click(function(){
    	     $('.responsive-menu').toggleClass('expand')
    	     })
        })